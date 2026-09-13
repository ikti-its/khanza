<?php
/**
 * Timeline Permintaan Barang — partial khusus modul Inventori Non-Medis.
 *
 * Merender struktur BARU dari get_permintaan_tracking(): tiap langkah punya
 * `status` utama (warna dot) + `rows` (daftar sub-baris: text, date, tone).
 *
 * Dibuat terpisah dari components/tracking/timeline.php (yang tetap dipakai
 * get_penerimaan_tracking() dengan struktur lama; get_pengajuan_tracking() kini
 * punya partial sejenis sendiri, lihat _timeline_pengajuan.php) supaya
 * perubahan struktur ini tidak menyentuh komponen shared.
 *
 * @var array $tracking — output get_permintaan_tracking()
 */

$steps = $tracking['steps'] ?? [];
if (empty($steps)) {
    return;
}

$dot_color = static fn(string $s): string => match ($s) {
    'done'   => '#10b981',
    'active' => '#3b82f6',
    'failed' => '#ef4444',
    default  => '#d1d5db',
};

$tone_color = static fn(?string $t): string => match ($t) {
    'done'   => '#065f46',
    'active' => '#1e40af',
    'failed' => '#991b1b',
    default  => '#6b7280',
};

$icon_html = static fn(string $s): string => match ($s) {
    'done'   => '<svg style="width:14px;height:14px;" fill="white" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>',
    'failed' => '<svg style="width:14px;height:14px;" fill="white" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>',
    'active' => '<span style="width:8px;height:8px;background:white;border-radius:50%;display:block;"></span>',
    default  => '<span style="width:8px;height:8px;background:white;border-radius:50%;display:block;opacity:0.5;"></span>',
};
?>

<div class="mt-6 mb-2" style="background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:20px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
    <div style="display:flex; align-items:center; gap:8px; border-bottom:1px solid #e5e7eb; padding-bottom:12px; margin-bottom:20px;">
        <svg style="width:16px; height:16px; color:#0d9488;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
        </svg>
        <span style="font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">Progress Permintaan</span>
    </div>

    <div style="display:flex; align-items:flex-start; justify-content:space-between; gap:8px;">
        <?php foreach ($steps as $i => $step): ?>
            <?php
            $status = (string) ($step['status'] ?? 'waiting');
            $rows   = $step['rows'] ?? [];
            $link   = $step['link'] ?? null;

            $connector = '#e5e7eb';
            if ($i > 0) {
                $prev = (string) ($steps[$i - 1]['status'] ?? 'waiting');
                $connector = match ($prev) {
                    'done'   => '#10b981',
                    'failed' => '#fca5a5',
                    default  => '#e5e7eb',
                };
            }
            ?>
            <div style="flex:1 1 0; min-width:0; display:flex; flex-direction:column; align-items:center; text-align:center; position:relative; padding:0 4px;">
                <?php if ($i > 0): ?>
                    <div style="position:absolute; top:16px; right:50%; width:100%; height:2px; background:<?= $connector ?>; z-index:0;"></div>
                <?php endif; ?>

                <div style="position:relative; z-index:1; width:32px; height:32px; border-radius:50%; background:<?= $dot_color($status) ?>; display:flex; align-items:center; justify-content:center; box-shadow:0 1px 3px rgba(0,0,0,0.1);<?= $status === 'active' ? ' animation:permintaan-pulse 2s infinite;' : '' ?>">
                    <?= $icon_html($status) ?>
                </div>

                <?php $label = (string) ($step['label'] ?? ''); ?>
                <?php if ($link): ?>
                    <a href="<?= base_url((string) $link) ?>" style="margin-top:8px; font-size:12px; font-weight:700; color:#1f2937; line-height:1.2; text-decoration:underline; text-underline-offset:2px;"><?= esc($label) ?></a>
                <?php else: ?>
                    <p style="margin-top:8px; font-size:12px; font-weight:700; color:<?= $status === 'waiting' ? '#9ca3af' : '#1f2937' ?>; line-height:1.2;"><?= esc($label) ?></p>
                <?php endif; ?>

                <?php foreach ($rows as $row): ?>
                    <?php
                    $text = (string) ($row['text'] ?? '');
                    $date = $row['date'] ?? null;
                    $tone = isset($row['tone']) ? (string) $row['tone'] : null;
                    ?>
                    <div style="margin-top:4px; max-width:150px;">
                        <p style="font-size:11px; font-weight:500; color:<?= $tone_color($tone) ?>; line-height:1.3; overflow-wrap:break-word; word-break:break-word;"><?= esc($text) ?></p>
                        <?php if (!empty($date)): ?>
                            <p style="margin-top:1px; font-size:10px; color:#9ca3af;"><?= date('d M Y, H:i', strtotime((string) $date)) ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
@keyframes permintaan-pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}
</style>

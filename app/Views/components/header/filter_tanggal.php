<?php
/**
 * Filter periode (?dari=&sampai=, format Y-m-d) di baris yang sama dengan kotak pencarian.
 * Gaya inline karena sebagian kelas utilitas tidak tersedia di style.css hasil build.
 *
 * @var string $dari
 * @var string $sampai
 */
$lain  = array_diff_key(service('request')->getGet() ?? [], ['dari' => null, 'sampai' => null, 'page' => null]);
$aktif = $dari !== '' || $sampai !== '';
$input = 'border:0; outline:none; background:transparent; padding:0; font-size:14px; color:#1f2937; width:8.5rem;';
?>
<form method="get" action="" class="py-4" style="display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
    <?php foreach ($lain as $k => $v): ?>
        <?php if (is_string($v)): ?>
            <input type="hidden" name="<?= esc((string) $k, 'attr') ?>" value="<?= esc($v, 'attr') ?>">
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="dark:bg-slate-900 dark:border-gray-700"
        style="display:flex; align-items:center; gap:10px; height:38px; padding:0 12px; border:1px solid <?= $aktif ? '#0A2D27' : '#e5e7eb' ?>; border-radius:8px; background:#fff;">
        <svg style="width:16px; height:16px; color:#6b7280; flex-shrink:0;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
        </svg>
        <span style="font-size:13px; color:#6b7280;">Periode</span>
        <input type="date" name="dari" value="<?= esc($dari, 'attr') ?>" aria-label="Dari tanggal" style="<?= $input ?>">
        <span style="color:#9ca3af;">–</span>
        <input type="date" name="sampai" value="<?= esc($sampai, 'attr') ?>" aria-label="Sampai tanggal" style="<?= $input ?>">
    </div>

    <button type="submit" class="bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E]"
        style="height:38px; padding:0 16px; border-radius:8px; font-size:14px; font-weight:600;">
        Terapkan
    </button>
    <?php if ($aktif): ?>
        <a href="?<?= esc(http_build_query($lain), 'attr') ?>" style="font-size:14px; color:#6b7280; text-decoration:underline; text-underline-offset:2px;">Reset</a>
    <?php endif; ?>
</form>

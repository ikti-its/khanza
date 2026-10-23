<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('admin/inventorinonmedis/_gaya_tabel') ?>

<?php
helper('tracking');
$header       = $alur['header'] ?? [];
$langkah      = $alur['langkah'] ?? [];
$peringatan   = $alur['peringatan'] ?? [];
$pengembalian = $alur['pengembalian'] ?? [];
$is_permintaan = $jenis === 'permintaan';
$no_dokumen    = (string) ($is_permintaan ? ($header['no_permintaan'] ?? '-') : ($header['no_pengajuan'] ?? '-'));

$warna_titik = static fn(string $s): string => match ($s) {
    'done'   => '#10b981',
    'active' => '#3b82f6',
    'failed' => '#ef4444',
    default  => '#d1d5db',
};
$label_status = static fn(string $s): array => match ($s) {
    'done'   => ['Selesai', 'green'],
    'active' => ['Sedang Berjalan', 'blue'],
    'failed' => ['Tidak Dilanjutkan', 'red'],
    default  => ['Belum Dimulai', 'gray'],
};
?>

<div class="max-w-[85rem] py-6 lg:py-3 px-8 mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-7 dark:bg-slate-900 dark:border-gray-800">

        <?= view('components/form/judul', ['judul' => $judul]) ?>

        <!-- Ringkasan alur -->
        <div class="space-y-1">
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4 flex-shrink-0">No. Dokumen Awal</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($no_dokumen) ?></span>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Jenis Alur</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= $is_permintaan ? 'Permintaan Unit' : 'Pengajuan Gudang' ?></span>
                </div>
            </div>
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4 flex-shrink-0">Status</span>
                <div class="w-full lg:w-1/4">
                    <?= get_progress_badge_html((string) ($alur['status'] ?? '-'), (string) ($alur['warna'] ?? 'gray')) ?>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Tahap Saat Ini</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc((string) ($alur['tahap'] ?? '-')) ?></span>
                    <span class="block text-xs text-gray-500"><?= esc((string) ($alur['progres'] ?? '')) ?></span>
                </div>
            </div>
        </div>

        <?php foreach ($peringatan as $p): ?>
            <div class="mt-4" style="background:#FEF3C7; border:1px solid #FDE68A; border-radius:8px; padding:10px 14px; font-size:13px; color:#92400E;">
                <?= esc($p['label']) ?>.
                <a href="<?= base_url($p['url']) ?>" style="font-weight:600; text-decoration:underline;">Buka</a>
            </div>
        <?php endforeach; ?>

        <!-- Tahapan -->
        <div class="mt-6" style="border:1px solid #e5e7eb; border-radius:12px; padding:20px;">
            <div style="display:flex; align-items:center; gap:8px; border-bottom:1px solid #e5e7eb; padding-bottom:12px; margin-bottom:16px;">
                <svg style="width:16px; height:16px; color:#0d9488;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                </svg>
                <span style="font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">Tahapan Transaksi</span>
            </div>

            <?php foreach ($langkah as $i => $l): ?>
                <?php
                $status          = (string) $l['status'];
                [$teks, $warna]  = $label_status($status);
                $terakhir        = $i === count($langkah) - 1;
                $redup           = $status === 'waiting';
                ?>
                <div style="display:flex; gap:14px;">
                    <!-- titik + garis -->
                    <div style="display:flex; flex-direction:column; align-items:center; flex-shrink:0;">
                        <div style="width:28px; height:28px; border-radius:50%; background:<?= $warna_titik($status) ?>; color:#fff; font-size:12px; font-weight:700; display:flex; align-items:center; justify-content:center;">
                            <?= $i + 1 ?>
                        </div>
                        <?php if (!$terakhir): ?>
                            <div style="flex:1; width:2px; min-height:16px; background:<?= $status === 'done' ? '#10b981' : '#e5e7eb' ?>;"></div>
                        <?php endif; ?>
                    </div>

                    <!-- isi tahap -->
                    <div style="flex:1; min-width:0; padding-bottom:<?= $terakhir ? '0' : '20px' ?>;">
                        <div style="display:flex; flex-wrap:wrap; align-items:center; gap:8px; min-height:28px;">
                            <span style="font-size:14px; font-weight:700; color:<?= $redup ? '#9ca3af' : '#1f2937' ?>;"><?= esc($l['judul']) ?></span>
                            <?= get_progress_badge_html($teks, $warna) ?>
                        </div>

                        <?php if ($l['tahap'] !== '' && $status === 'active'): ?>
                            <p style="margin-top:2px; font-size:12px; color:#1e40af;"><?= esc($l['tahap']) ?></p>
                        <?php endif; ?>

                        <?php if ($l['info'] !== []): ?>
                            <table style="margin-top:6px; font-size:13px;">
                                <?php foreach ($l['info'] as [$label, $nilai]): ?>
                                    <tr>
                                        <td class="text-left" style="padding:2px 16px 2px 0; color:#6b7280; white-space:nowrap; vertical-align:top;"><?= esc($label) ?></td>
                                        <td class="text-left" style="padding:2px 0; color:#111827; font-weight:500;"><?= esc($nilai) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>

                        <?php if ($l['dokumen'] !== [] || $l['aksi'] !== []): ?>
                            <div style="margin-top:10px; display:flex; flex-wrap:wrap; align-items:center; gap:8px;">
                                <?php foreach ($l['dokumen'] as $d): ?>
                                    <!-- tombol garis: buka dokumen; tombol gelap di sebelahnya: aksi lanjutan -->
                                    <a href="<?= base_url($d['url']) ?>"
                                        style="padding:6px 12px;" class="inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                                        <svg style="width:14px; height:14px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                        <?= esc($d['label']) ?>
                                    </a>
                                <?php endforeach; ?>
                                <?php foreach ($l['aksi'] as $a): ?>
                                    <a href="<?= base_url($a['url']) ?>"
                                        style="padding:6px 12px;" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent shadow-sm bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E]">
                                        <svg style="width:14px; height:14px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                        </svg>
                                        <?= esc($a['label']) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ($pengembalian !== []): ?>
            <!-- Pengembalian dari unit -->
            <div class="mt-6" style="border:1px solid #e5e7eb; border-radius:12px; padding:20px;">
                <div style="border-bottom:1px solid #e5e7eb; padding-bottom:12px; margin-bottom:8px;">
                    <span style="font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">Pengembalian Barang</span>
                </div>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-slate-500 dark:text-slate-400">
                            <th class="text-left py-2 font-medium">No. Pengembalian</th>
                            <th class="text-center py-2 font-medium">Tanggal</th>
                            <th class="text-right py-2 font-medium">Qty Diajukan</th>
                            <th class="text-right py-2 font-medium">Qty Disetujui</th>
                            <th class="text-center py-2 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-700 dark:text-slate-300">
                        <?php foreach ($pengembalian as $pg): ?>
                            <?php $status_pg = (string) ($pg['nama_status_pengembalian_barang'] ?? '-'); ?>
                            <tr class="border-t border-slate-100 dark:border-slate-700/50">
                                <td class="text-left py-2">
                                    <a href="/inventori-non-medis/pengembalian-barang/<?= (int) $pg['id_pengembalian'] ?>" class="font-semibold text-blue-600 hover:underline"><?= esc($pg['no_pengembalian'] ?? '-') ?></a>
                                </td>
                                <td class="text-center py-2"><?= !empty($pg['tanggal']) ? date('d/m/Y, H:i', strtotime((string) $pg['tanggal'])) : '-' ?></td>
                                <td class="text-right py-2"><?= (int) $pg['total_qty_diajukan'] ?></td>
                                <td class="text-right py-2"><?= (int) ($pg['id_status_pengembalian_barang'] ?? 0) === 3 ? (int) $pg['total_qty_diverifikasi'] : '-' ?></td>
                                <td class="text-center py-2"><?= get_progress_badge_html($status_pg, _status_component_color($status_pg)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <!-- Tombol Aksi -->
        <div class="mt-5 pt-5 border-t border-gray-200 dark:border-gray-800 flex justify-end">
            <a href="<?= $modul_path ?>/data" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                Kembali
            </a>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>

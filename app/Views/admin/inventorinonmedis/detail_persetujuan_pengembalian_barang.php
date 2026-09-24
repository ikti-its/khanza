<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<?php
helper('tracking');
$detail_items    = $detail_items ?? [];
$status_label    = (string) ($baris['nama_status_pengembalian_barang'] ?? '-');
$status_id       = (int) ($baris['id_status_pengembalian_barang'] ?? 0);
$is_pending      = $status_id === 2;
$is_selesai      = $status_id === 3;
$tanggal_putusan = !empty($baris['tanggal_verifikasi']) ? date('d/m/Y, H:i', strtotime((string) $baris['tanggal_verifikasi'])) : '-';
?>

<div class="max-w-[85rem] py-6 lg:py-3 px-8 mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-7 dark:bg-slate-900 dark:border-gray-800">

        <?= view('components/form/judul', ['judul' => $judul]) ?>

        <div class="space-y-1">

            <!-- No. Pengembalian + Tanggal -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">No. Pengembalian</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['no_pengembalian'] ?? '-') ?></span>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Tanggal Pengembalian</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= !empty($baris['tanggal']) ? date('d/m/Y, H:i', strtotime($baris['tanggal'])) : '-' ?></span>
                </div>
            </div>

            <!-- Pemohon + Ruangan -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Pemohon</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['nama'] ?? '-') ?></span>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Ruangan</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['nama_ruangan'] ?? '-') ?></span>
                </div>
            </div>

            <!-- Status + Staf Gudang -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Status</span>
                <div class="w-full lg:w-1/4">
                    <?= get_progress_badge_html($status_label, _status_component_color($status_label)) ?>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Staf Gudang</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['petugas_gudang_nama'] ?? '-') ?></span>
                </div>
            </div>

            <!-- Permintaan Asal -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Permintaan Asal</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['no_permintaan'] ?? '-') ?></span>
                </div>
            </div>

            <!-- Alasan -->
            <div class="sm:block md:flex items-start py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Alasan Pengembalian</span>
                <div class="w-full">
                    <span class="text-sm text-gray-900 dark:text-white" style="white-space:pre-line;"><?= esc($baris['alasan'] ?? '-') ?></span>
                </div>
            </div>
        </div>

        <?php if (!$is_pending): ?>
            <!-- Riwayat Persetujuan — permanen, warna netral karena bukan kartu aksi. -->
            <div class="mt-6 bg-slate-50 border border-slate-200 rounded-xl p-5 dark:bg-slate-800 dark:border-slate-700 shadow-sm">
                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3 dark:text-slate-400">Riwayat Persetujuan</h4>
                <span class="inline-flex items-center py-1 px-2.5 rounded-full text-xs font-semibold"
                    style="<?= $is_selesai ? 'background-color:#D1FAE5; color:#065F46;' : 'background-color:#FEE2E2; color:#991B1B;' ?>">
                    <?= esc(($is_selesai ? 'Disetujui pada ' : 'Ditolak pada ') . $tanggal_putusan) ?>
                </span>
                <dl class="mt-3 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                    <div><dt class="inline font-medium text-gray-500 dark:text-gray-400"><?= $is_selesai ? 'Catatan:' : 'Alasan Penolakan:' ?></dt> <dd class="inline"><?= esc($baris['catatan_verifikasi'] ?? '-') ?></dd></div>
                    <div><dt class="inline font-medium text-gray-500 dark:text-gray-400">Diputuskan oleh:</dt> <dd class="inline"><?= esc($baris['petugas_gudang_nama'] ?? '-') ?></dd></div>
                    <div><dt class="inline font-medium text-gray-500 dark:text-gray-400">Tanggal Keputusan:</dt> <dd class="inline"><?= esc($tanggal_putusan) ?></dd></div>
                    <?php if (!empty($transaksi)): ?>
                        <div><dt class="inline font-medium text-gray-500 dark:text-gray-400">Transaksi Stok:</dt>
                            <dd class="inline"><a href="/inventori-non-medis/transaksi-stok/<?= (int) $transaksi['id_transaksi'] ?>" class="text-blue-600 hover:underline">Lihat transaksi masuk pengembalian</a></dd></div>
                    <?php endif; ?>
                </dl>
            </div>
        <?php endif; ?>

        <!-- Detail Barang -->
        <div class="mt-6 bg-slate-50 border border-slate-200 rounded-xl p-5 dark:bg-slate-800 dark:border-slate-700 shadow-sm">
            <div class="flex items-center gap-x-2 mb-3 border-b border-slate-200 pb-2 dark:border-slate-700">
                <svg class="w-4 h-4 text-teal-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider dark:text-slate-400">Detail Barang</h4>
            </div>

            <?php if (!empty($detail_items)): ?>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-slate-500 dark:text-slate-400">
                            <th class="text-left py-2 font-medium">Kode</th>
                            <th class="text-left py-2 font-medium">Nama Barang</th>
                            <th class="text-center py-2 font-medium">Satuan</th>
                            <th class="text-center py-2 font-medium">Qty Diajukan</th>
                            <th class="text-center py-2 font-medium">Qty Disetujui</th>
                            <th class="text-left py-2 font-medium" style="padding-left:1rem;">Catatan Unit</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-700 dark:text-slate-300">
                        <?php foreach ($detail_items as $item): ?>
                            <tr class="border-t border-slate-100 dark:border-slate-700/50">
                                <td class="py-2 font-mono text-sm"><?= esc($item['kode_barang'] ?? '-') ?></td>
                                <td class="py-2 font-semibold"><?= esc($item['nama_barang'] ?? '-') ?></td>
                                <td class="py-2 text-center"><?= esc($item['nama_satuan'] ?? '-') ?></td>
                                <td class="py-2 text-center font-semibold"><?= (int) $item['qty_diajukan'] ?></td>
                                <td class="py-2 text-center font-semibold"><?= $is_selesai ? (int) ($item['qty_diverifikasi'] ?? 0) : '-' ?></td>
                                <td class="py-2" style="padding-left:1rem;"><?= esc($item['catatan'] ?? '-') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-sm text-slate-400 italic text-center py-4">Tidak ada detail barang.</p>
            <?php endif; ?>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-5 pt-5 border-t border-gray-200 dark:border-gray-800 flex justify-end">
            <a href="javascript:history.back()" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                Kembali
            </a>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>

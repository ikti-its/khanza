<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<?php
helper('tracking');
$detail_items = $detail_items ?? [];
$kuota        = $kuota ?? [];
$is_draf      = $is_draf ?? false;
$status_label = (string) ($baris['nama_status_pengembalian_barang'] ?? '-');
$status_id    = (int) ($baris['id_status_pengembalian_barang'] ?? 0);
// Qty Diverifikasi hanya bermakna setelah pengembalian selesai diverifikasi (3)
$show_qty_diverifikasi = $status_id === 3;
$show_verifikasi       = !empty($baris['tanggal_verifikasi']) || !empty($baris['petugas_gudang']);
$id_pengembalian       = (int) ($baris['id_pengembalian'] ?? 0);
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

            <!-- Permintaan Asal + Ruangan -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Permintaan Asal</span>
                <div class="w-full lg:w-1/4">
                    <?php if (!empty($baris['id_permintaan'])): ?>
                        <a href="/inventori-non-medis/permintaan-barang/<?= (int) $baris['id_permintaan'] ?>"
                            class="text-sm font-semibold text-blue-600 hover:underline"><?= esc($baris['no_permintaan'] ?? '-') ?></a>
                    <?php else: ?>
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">-</span>
                    <?php endif; ?>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Ruangan</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['nama_ruangan'] ?? '-') ?></span>
                </div>
            </div>

            <!-- Pemohon + Status -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Pemohon</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['nama'] ?? '-') ?></span>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Status</span>
                <div class="w-full lg:w-1/4">
                    <?= get_progress_badge_html($status_label, _status_component_color($status_label)) ?>
                </div>
            </div>

            <!-- Alasan -->
            <div class="sm:block md:flex items-start py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Alasan</span>
                <div class="w-full lg:w-3/4">
                    <span class="text-sm text-gray-900 dark:text-white whitespace-pre-line"><?= esc($baris['alasan'] ?? '-') ?></span>
                </div>
            </div>
        </div>

        <?php if ($show_verifikasi): ?>
            <!-- Hasil verifikasi gudang (diisi F14, tahap berikutnya) -->
            <div class="mt-6 bg-slate-50 border border-slate-200 rounded-xl p-5 dark:bg-slate-800 dark:border-slate-700 shadow-sm">
                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3 dark:text-slate-400">Verifikasi Gudang</h4>
                <dl class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                    <div><dt class="inline font-medium text-gray-500 dark:text-gray-400">Petugas Gudang:</dt> <dd class="inline"><?= esc($baris['petugas_gudang_nama'] ?? '-') ?></dd></div>
                    <div><dt class="inline font-medium text-gray-500 dark:text-gray-400">Tanggal Verifikasi:</dt> <dd class="inline"><?= !empty($baris['tanggal_verifikasi']) ? date('d/m/Y, H:i', strtotime((string) $baris['tanggal_verifikasi'])) : '-' ?></dd></div>
                    <div><dt class="inline font-medium text-gray-500 dark:text-gray-400">Catatan:</dt> <dd class="inline"><?= esc($baris['catatan_verifikasi'] ?? '-') ?></dd></div>
                </dl>
            </div>
        <?php endif; ?>

        <!-- Detail Barang -->
        <div class="mt-6 bg-slate-50 border border-slate-200 rounded-xl p-5 dark:bg-slate-800 dark:border-slate-700 shadow-sm">
            <div class="flex items-center gap-x-2 mb-3 border-b border-slate-200 pb-2 dark:border-slate-700">
                <svg class="w-4 h-4 text-teal-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider dark:text-slate-400">Barang yang Dikembalikan</h4>
            </div>

            <?php if (!empty($detail_items)): ?>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-slate-500 dark:text-slate-400">
                            <th class="text-left py-2 font-medium">Kode</th>
                            <th class="text-left py-2 font-medium">Nama Barang</th>
                            <th class="text-center py-2 font-medium">Satuan</th>
                            <?php if ($is_draf): ?>
                                <th class="text-center py-2 font-medium">Sisa Saat Ini</th>
                            <?php endif; ?>
                            <th class="text-center py-2 font-medium">Qty Diajukan</th>
                            <th class="text-center py-2 font-medium">Qty Diverifikasi</th>
                            <th class="text-left py-2 font-medium">Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-700 dark:text-slate-300">
                        <?php foreach ($detail_items as $item): ?>
                            <?php
                            $sisa      = (int) ($kuota[(int) $item['id_barang']]['sisa'] ?? 0);
                            $melebihi  = $is_draf && (int) $item['qty_diajukan'] > $sisa;
                            ?>
                            <tr class="border-t border-slate-100 dark:border-slate-700/50">
                                <td class="py-2 font-mono text-sm"><?= esc($item['kode_barang'] ?? '-') ?></td>
                                <td class="py-2 font-semibold"><?= esc($item['nama_barang'] ?? '-') ?></td>
                                <td class="py-2 text-center"><?= esc($item['nama_satuan'] ?? '-') ?></td>
                                <?php if ($is_draf): ?>
                                    <td class="py-2 text-center <?= $melebihi ? 'text-red-600 font-semibold' : '' ?>"><?= $sisa ?></td>
                                <?php endif; ?>
                                <td class="py-2 text-center font-semibold <?= $melebihi ? 'text-red-600' : '' ?>"><?= (int) $item['qty_diajukan'] ?></td>
                                <td class="py-2 text-center font-semibold"><?= $show_qty_diverifikasi ? (int) ($item['qty_diverifikasi'] ?? 0) : '-' ?></td>
                                <td class="py-2"><?= esc($item['catatan'] ?? '-') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-sm text-slate-400 italic text-center py-4">Belum ada barang. Tambahkan lewat tombol Ubah sebelum mengajukan.</p>
            <?php endif; ?>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-5 pt-5 border-t border-gray-200 dark:border-gray-800 flex justify-end gap-x-2">
            <?php if ($is_draf): ?>
                <a href="<?= $modul_path . '/edit/' . $id_pengembalian ?>"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                    Ubah
                </a>
                <form action="<?= $modul_path . '/submitedit/' . $id_pengembalian ?>" method="post" onsubmit="return confirmAjukan(event, this);">
                    <?= csrf_field() ?>
                    <input type="hidden" name="aksi" value="ajukan">
                    <button type="submit" <?= empty($detail_items) ? 'disabled' : '' ?>
                        class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg shadow-sm bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E] disabled:opacity-50 disabled:cursor-not-allowed">
                        Ajukan Pengembalian
                    </button>
                </form>
            <?php endif; ?>
            <a href="<?= $modul_path ?>/data" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                Kembali
            </a>
        </div>

    </div>
</div>

<?php if ($is_draf): ?>
<script>
    function confirmAjukan(event, form) {
        event.preventDefault();

        Swal.fire({
            icon: 'question',
            title: 'Ajukan Pengembalian',
            text: 'Setelah diajukan, data tidak dapat diubah dan menunggu verifikasi petugas gudang. Stok gudang baru bertambah setelah barang diverifikasi.',
            showCancelButton: true,
            confirmButtonText: 'Ajukan',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E] font-medium rounded-lg px-4 py-2',
                cancelButton: 'bg-gray-200 text-gray-800 hover:bg-gray-300 font-medium rounded-lg px-4 py-2',
                actions: 'flex items-center justify-center gap-3'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

        return false;
    }
</script>
<?php endif; ?>

<?= $this->endSection(); ?>

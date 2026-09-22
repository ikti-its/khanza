<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<?php
// Dimuat di sini juga (bukan hanya di bawah) karena pg_bool_is_true() dipakai
// sebelum blok helper('tracking') utama di bawah.
helper('tracking');
?>
<?php if ((int) ($baris['id_status_permintaan_barang'] ?? 0) === 8 || pg_bool_is_true($baris['pengajuan_pembatalan'] ?? null)): ?>
    <?= $this->include('components/modal/modalPetugas') ?>
    <style>
        /* modal-table.php memakai kelas `z-50` yang tidak ada di build CSS saat ini,
           sehingga wrapper modal jatuh ke z-index:auto dan tertindih dot timeline
           Progress Permintaan (position:relative; z-index:1). Angkat modal ini di
           atas semua konten halaman. Scoped ke #modalPetugas saja. Dipakai baik
           untuk Konfirmasi Terima (petugas_penerima) maupun Setujui/Tolak
           Pembatalan (petugas_gudang_pembatalan) — dua kondisi ini tidak pernah
           terjadi bersamaan (status 8 vs pengajuan_pembatalan hanya berlaku di
           status 4/5), jadi satu modal boleh dipakai bergantian. */
        #modalPetugas {
            z-index: 9999;
        }
    </style>
<?php endif; ?>

<div class="max-w-[85rem] py-6 lg:py-3 px-8 mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-7 dark:bg-slate-900 dark:border-gray-800">

        <?= view('components/form/judul', ['judul' => $judul]) ?>

        <?php
        // Dipakai oleh timeline progress di bawah.
        helper('tracking');
        $tracking = get_permintaan_tracking((int) ($baris['id_permintaan'] ?? 0));
        ?>

        <div class="space-y-1">

            <!-- No. Permintaan + Tanggal -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">No. Permintaan</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['no_permintaan'] ?? '-') ?></span>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Tanggal Permintaan</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= !empty($baris['tanggal']) ? date('d/m/Y, H:i', strtotime($baris['tanggal'])) : '-' ?></span>
                </div>
            </div>

            <!-- Pemohon + Ruangan -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Pemohon</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['petugas_nama'] ?? $baris['nama'] ?? '-') ?></span>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Ruangan</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['nama_ruangan'] ?? '-') ?></span>
                </div>
            </div>

            <?php
            $status_id = (int) ($baris['id_status_permintaan_barang'] ?? 0);

            // Qty Disetujui hanya bermakna setelah permintaan melewati tahap
            // persetujuan (status 2/5/6/8). Pada status 1/4 belum diproses, pada
            // 3/7 bisa ditolak/dibatalkan sebelum sempat disetujui — angka 0
            // menyesatkan, tampilkan tanda hubung.
            $show_qty_disetujui = in_array($status_id, [2, 5, 6, 8], true);

            // Penerima & waktu terima hanya tampil setelah dikonfirmasi diterima (6).
            $show_penerima = $status_id === 6
                && trim((string) ($baris['petugas_penerima_nama'] ?? '')) !== ''
                && trim((string) ($baris['tanggal_diterima'] ?? '')) !== '';

            // Gelombang 3: Petugas RS sudah mengajukan pembatalan (dari halaman
            // Permintaan) — di sini Staf Gudang menyetujui/menolaknya.
            // pg_bool_is_true() BUKAN (bool) cast biasa — kolom boolean Postgres
            // balik sebagai string 't'/'f', dan (bool) 'f' salah jadi true.
            $pengajuan_pembatalan = pg_bool_is_true($baris['pengajuan_pembatalan'] ?? null);

            // Kartu Riwayat Pengajuan Pembatalan — independen dari flag
            // pengajuan_pembatalan (yang balik ke false setelah keputusan).
            // Dipicu murni oleh tanggal_pembatalan supaya jejak pengajuan
            // pembatalan tetap tampil permanen walau sudah diputuskan.
            $has_pembatalan_history      = !empty($baris['tanggal_pembatalan']);
            $pembatalan_diputuskan_oleh  = trim((string) ($baris['petugas_gudang_pembatalan_nama'] ?? ''));
            $pembatalan_sudah_diputuskan = !empty($baris['petugas_gudang_pembatalan']);

            // tanggal_diproses adalah tanggal keputusan yang seharusnya selalu
            // terisi begitu petugas_gudang_pembatalan ada (lihat perbaikan di
            // keputusan_pembatalan() di bawah). Fallback ke tanggal_pembatalan
            // HANYA untuk baris lama yang sempat tersimpan sebelum perbaikan
            // itu, supaya tidak pernah tampil "-" selama datanya memang ada.
            $pembatalan_tanggal_diproses = match (true) {
                !empty($baris['tanggal_diproses'])  => date('d/m/Y, H:i', strtotime((string) $baris['tanggal_diproses'])),
                !empty($baris['tanggal_pembatalan']) => date('d/m/Y, H:i', strtotime((string) $baris['tanggal_pembatalan'])),
                default                               => '-',
            };

            if ($pengajuan_pembatalan) {
                $pembatalan_hasil_label = 'Menunggu Persetujuan Pembatalan';
                $pembatalan_hasil_bg    = '#FEF3C7';
                $pembatalan_hasil_text  = '#92400E';
            } elseif ($status_id === 7 && $pembatalan_sudah_diputuskan) {
                $pembatalan_hasil_label = 'Disetujui, Dibatalkan pada ' . $pembatalan_tanggal_diproses;
                $pembatalan_hasil_bg    = '#D1FAE5';
                $pembatalan_hasil_text  = '#065F46';
            } elseif ($status_id !== 7 && $pembatalan_sudah_diputuskan) {
                $pembatalan_hasil_label = 'Ditolak pada ' . $pembatalan_tanggal_diproses;
                $pembatalan_hasil_bg    = '#FEE2E2';
                $pembatalan_hasil_text  = '#991B1B';
            } else {
                // status ditutup 7 lewat cascade otomatis (pengajuan ditolak
                // atasan / pengadaan dibatalkan) sebelum Staf Gudang sempat
                // memutuskan pengajuan pembatalan ini sendiri — lihat
                // get_permintaan_pembatalan_cascade_reason() untuk detail
                // pembedaan penyebabnya.
                $pembatalan_cascade_reason = get_permintaan_pembatalan_cascade_reason((int) ($baris['id_permintaan'] ?? 0));
                $pembatalan_hasil_label    = match ($pembatalan_cascade_reason) {
                    'pengajuan_ditolak'    => 'Permintaan otomatis dibatalkan karena pengajuan ditolak atasan pada ' . $pembatalan_tanggal_diproses,
                    'pengadaan_dibatalkan' => 'Permintaan otomatis dibatalkan karena pengadaan dibatalkan pada ' . $pembatalan_tanggal_diproses,
                    default                => 'Permintaan dibatalkan otomatis karena proses pengadaan tidak dapat dilanjutkan, pada ' . $pembatalan_tanggal_diproses,
                };
                $pembatalan_hasil_bg   = '#F1F1F1';
                $pembatalan_hasil_text = '#374151';
            }
            ?>

            <!-- Status (progress tracking) | Pengelola -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Status</span>
                <div class="w-full lg:w-1/4">
                    <?= get_progress_badge_html($tracking['progress_label'] ?? '-', $tracking['progress_color'] ?? 'gray') ?>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Pengelola</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['nama'] ?? '-') ?></span>
                </div>
            </div>

            <!-- No. Keluar | Metode Pemenuhan -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">No. Keluar</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['no_keluar'] ?? '-') ?></span>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Metode Pemenuhan</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($metode_pemenuhan ?? '-') ?></span>
                </div>
            </div>

            <?php if ($show_penerima): ?>
                <!-- Diterima Oleh | Tanggal Diterima -->
                <div class="sm:block md:flex items-center py-3">
                    <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Diterima Oleh</span>
                    <div class="w-full lg:w-1/4">
                        <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['petugas_penerima_nama']) ?></span>
                    </div>
                    <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Tanggal Diterima</span>
                    <div class="w-full lg:w-1/4">
                        <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= date('d/m/Y, H:i', strtotime((string) $baris['tanggal_diterima'])) ?></span>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        <?php if ($status_id === 8): ?>
            <!-- Konfirmasi Terima: transisi Proses Pengiriman (8) → Selesai (6).
                 Warna pakai inline style — kelas emerald-* tidak ada di build CSS. -->
            <div class="mt-6 rounded-xl p-5 shadow-sm" style="background-color:#ECFDF5; border:1px solid #A7F3D0;">
                <h4 class="text-xs font-bold uppercase tracking-wider mb-3" style="color:#047857;">Konfirmasi Penerimaan Barang</h4>
                <form action="<?= $modul_path . '/submitedit/' . (int) ($baris['id_permintaan'] ?? 0) ?>" method="post" onsubmit="return confirmReceiveRequest(event, this);">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_status_permintaan_barang" value="6">
                    <input type="hidden" name="petugas_penerima" id="petugas_penerima" value="">
                    <div class="sm:block md:flex md:items-center gap-x-3">
                        <label class="block mb-1 md:mb-0 text-sm font-medium text-gray-600 dark:text-gray-400 md:w-1/4">
                            Petugas Penerima<span class="text-red-600">*</span>
                        </label>
                        <div class="w-full lg:w-1/3 flex gap-x-2">
                            <input type="text" id="petugas_penerima_display" readonly placeholder="Klik cari petugas penerima..."
                                onclick="open_modalPetugas()"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full bg-white cursor-pointer dark:border-gray-600 dark:text-white">
                            <button type="button" onclick="open_modalPetugas()"
                                class="inline-flex justify-center items-center p-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 w-10 h-[38px] flex-shrink-0 shadow-sm">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                        <button type="submit"
                            class="mt-3 md:mt-0 py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg shadow-sm bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E]">
                            Konfirmasi Terima
                        </button>
                    </div>
                </form>
            </div>
        <?php endif; ?>

        <?php if ($pengajuan_pembatalan): ?>
            <!-- Gelombang 3: Setujui/Tolak Pengajuan Pembatalan — dua langkah,
                 bukan lagi Batalkan langsung. Satu form, dua tombol submit
                 (dibedakan lewat aksi_pembatalan) supaya picker Staf Gudang
                 tidak perlu diduplikasi. Warna amber — permintaan pembatalan
                 belum jadi keputusan final. -->
            <div class="mt-6 rounded-xl p-5 shadow-sm" style="background-color:#FFFBEB; border:1px solid #FDE68A;">
                <h4 class="text-xs font-bold uppercase tracking-wider mb-3" style="color:#92400E;">Pengajuan Pembatalan</h4>
                <span class="inline-flex items-center py-1 px-2.5 rounded-full text-xs font-semibold" style="background-color: #FEF3C7; color: #92400E;">
                    Menunggu Persetujuan Pembatalan
                </span>
                <p class="mt-3 mb-3 text-sm text-gray-700 dark:text-gray-300">Alasan: <?= esc($baris['alasan_pembatalan'] ?? '-') ?></p>
                <form id="formAksiPembatalan" action="<?= $modul_path . '/submitedit/' . (int) ($baris['id_permintaan'] ?? 0) ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="aksi_pembatalan" id="aksi_pembatalan_input" value="">
                    <input type="hidden" name="petugas_gudang_pembatalan" id="petugas_gudang_pembatalan" value="">
                    <div class="sm:block md:flex md:items-center gap-x-3">
                        <label class="block mb-1 md:mb-0 text-sm font-medium text-gray-600 dark:text-gray-400 md:w-1/4">
                            Staf Gudang<span class="text-red-600">*</span>
                        </label>
                        <div class="w-full lg:w-1/3 flex gap-x-2">
                            <input type="text" id="petugas_gudang_pembatalan_display" readonly placeholder="Klik cari staf gudang..."
                                onclick="open_modalPetugas()"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full bg-white cursor-pointer dark:border-gray-600 dark:text-white">
                            <button type="button" onclick="open_modalPetugas()"
                                class="inline-flex justify-center items-center p-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 w-10 h-[38px] flex-shrink-0 shadow-sm">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex gap-x-2 mt-3 md:mt-0">
                            <button type="button" onclick="submitAksiPembatalan('tolak')"
                                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-red-200 bg-red-50 text-red-700 shadow-sm hover:bg-red-100">
                                Tolak Pembatalan
                            </button>
                            <button type="button" onclick="submitAksiPembatalan('setuju')"
                                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg shadow-sm bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E]">
                                Setujui Pembatalan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>

        <?php if ($has_pembatalan_history): ?>
            <!-- Riwayat Pengajuan Pembatalan — permanen, warna netral (bukan
                 amber) karena bukan kartu aksi. Tampil berdampingan dengan
                 kartu Setujui/Tolak di atas selama masih menunggu keputusan,
                 dan boleh tampil bersamaan dengan kartu Konfirmasi Terima
                 (status 8) — keduanya cerita berbeda. -->
            <div class="mt-6 bg-slate-50 border border-slate-200 rounded-xl p-5 dark:bg-slate-800 dark:border-slate-700 shadow-sm">
                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3 dark:text-slate-400">Riwayat Pengajuan Pembatalan</h4>
                <span class="inline-flex items-center py-1 px-2.5 rounded-full text-xs font-semibold" style="background-color: <?= $pembatalan_hasil_bg ?>; color: <?= $pembatalan_hasil_text ?>;">
                    <?= esc($pembatalan_hasil_label) ?>
                </span>
                <dl class="mt-3 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                    <div><dt class="inline font-medium text-gray-500 dark:text-gray-400">Alasan:</dt> <dd class="inline"><?= esc($baris['alasan_pembatalan'] ?? '-') ?></dd></div>
                    <div><dt class="inline font-medium text-gray-500 dark:text-gray-400">Diajukan pada:</dt> <dd class="inline"><?= !empty($baris['tanggal_pembatalan']) ? date('d/m/Y, H:i', strtotime((string) $baris['tanggal_pembatalan'])) : '-' ?></dd></div>
                    <div><dt class="inline font-medium text-gray-500 dark:text-gray-400">Diputuskan oleh:</dt> <dd class="inline"><?= $pembatalan_diputuskan_oleh !== '' ? esc($pembatalan_diputuskan_oleh) : 'Menunggu Persetujuan' ?></dd></div>
                </dl>
            </div>
        <?php endif; ?>

        <!-- Progress Tracking -->
        <?php if (!empty($tracking['steps'])): ?>
            <?= view('admin/inventorinonmedis/_timeline_permintaan', ['tracking' => $tracking]) ?>
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
                            <th class="text-center py-2 font-medium">Stok Saat Ini</th>
                            <th class="text-center py-2 font-medium">Qty Diminta</th>
                            <th class="text-center py-2 font-medium">Qty Disetujui</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-700 dark:text-slate-300">
                        <?php foreach ($detail_items as $item): ?>
                            <?php $isBaru = empty($item['id_barang']) && !empty($item['nama_barang_baru']); ?>
                            <tr class="border-t border-slate-100 dark:border-slate-700/50">
                                <td class="py-2 font-mono text-sm">
                                    <?php if ($isBaru): ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-700">Baru</span>
                                    <?php else: ?>
                                        <?= esc($item['kode_barang'] ?? '-') ?>
                                    <?php endif; ?>
                                </td>
                                <td class="py-2 font-semibold"><?= esc($isBaru ? $item['nama_barang_baru'] : ($item['nama_barang'] ?? '-')) ?></td>
                                <td class="py-2 text-center"><?= esc($item['nama_satuan'] ?? '-') ?></td>
                                <td class="py-2 text-center"><?= isset($item['stok']) ? esc((string) $item['stok']) : '-' ?></td>
                                <td class="py-2 text-center font-semibold"><?= $item['qty'] ?? 0 ?></td>
                                <td class="py-2 text-center font-semibold"><?= $show_qty_disetujui ? ($item['qty_disetujui'] ?? 0) : '-' ?></td>
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

<script>
    function autofillPetugas(item) {
        // Modal ini dipakai bergantian oleh dua konteks yang tidak pernah aktif
        // bersamaan (Konfirmasi Terima di status 8, Setujui/Tolak Pembatalan
        // saat pengajuan_pembatalan) — isi field mana pun yang ada di DOM.
        const penerima = document.getElementById('petugas_penerima');
        if (penerima) {
            penerima.value = item.id_petugas ?? '';
            document.getElementById('petugas_penerima_display').value = item.nama ?? '';
        }
        const gudangPembatalan = document.getElementById('petugas_gudang_pembatalan');
        if (gudangPembatalan) {
            gudangPembatalan.value = item.id_petugas ?? '';
            document.getElementById('petugas_gudang_pembatalan_display').value = item.nama ?? '';
        }
    }

    function confirmReceiveRequest(event, form) {
        event.preventDefault();

        if (!document.getElementById('petugas_penerima').value) {
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                text: 'Pilih petugas penerima terlebih dahulu.',
                confirmButtonText: 'Tutup',
                customClass: {
                    confirmButton: 'bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E] font-medium rounded-lg px-4 py-2'
                },
                buttonsStyling: false
            });
            return false;
        }

        Swal.fire({
            icon: 'question',
            title: 'Konfirmasi Penerimaan',
            text: 'Konfirmasi bahwa barang sudah diterima? Permintaan akan ditandai Selesai.',
            showCancelButton: true,
            confirmButtonText: 'Ya, Terima',
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

    function submitAksiPembatalan(aksi) {
        if (!document.getElementById('petugas_gudang_pembatalan').value) {
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                text: 'Pilih staf gudang terlebih dahulu.',
                confirmButtonText: 'Tutup',
                customClass: {
                    confirmButton: 'bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E] font-medium rounded-lg px-4 py-2'
                },
                buttonsStyling: false
            });
            return;
        }

        const isSetuju = aksi === 'setuju';
        Swal.fire({
            icon: 'question',
            title: isSetuju ? 'Setujui Pembatalan' : 'Tolak Pembatalan',
            text: isSetuju
                ? 'Setujui pengajuan pembatalan ini? Permintaan akan ditandai Dibatalkan.'
                : 'Tolak pengajuan pembatalan ini? Permintaan akan lanjut seperti semula.',
            showCancelButton: true,
            confirmButtonText: isSetuju ? 'Ya, Setujui' : 'Ya, Tolak',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E] font-medium rounded-lg px-4 py-2',
                cancelButton: 'bg-gray-200 text-gray-800 hover:bg-gray-300 font-medium rounded-lg px-4 py-2',
                actions: 'flex items-center justify-center gap-3'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('aksi_pembatalan_input').value = aksi;
                document.getElementById('formAksiPembatalan').submit();
            }
        });
    }
</script>

<?= $this->endSection(); ?>
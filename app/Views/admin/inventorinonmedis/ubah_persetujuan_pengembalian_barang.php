<?php
$detail_items = $detail_items ?? [];
?>
<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<?= $this->include('components/modal/modalpetugas') ?>
<style>
    /* modal-table.php memakai kelas z-50 yang tidak ada di build CSS — sama seperti
       detail_persetujuan_permintaan_barang.php, angkat modal di atas konten. */
    #modalPetugas {
        z-index: 9999;
    }
</style>

<!-- Struktur form mengikuti ubah_persetujuan_permintaan_barang.php: baris label +
     input readonly, pemilih petugas, tabel bergaris, tombol di bawah. Keputusan
     dikirim lewat aksi=setuju / aksi=tolak (bukan select status). -->
<div class="max-w-[85rem] py-6 lg:py-3 px-8 mx-auto">
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
        <?= view('components/form/judul', ['judul' => $judul]) ?>

        <form action="<?= $modul_path . $form_action ?>" id="myForm" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="aksi" id="aksi_input" value="">
            <input type="hidden" name="petugas_gudang" id="petugas_gudang" value="">

            <!-- No. Pengembalian + Tanggal -->
            <div class="mb-5 sm:block md:flex items-center">
                <label class="block mb-2 md:mb-0 text-sm text-gray-900 dark:text-white md:w-1/4">
                    No. Pengembalian
                </label>
                <input type="text" readonly value="<?= esc($baris['no_pengembalian'] ?? '-') ?>"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white bg-gray-100 cursor-not-allowed">

                <label class="block mt-5 md:my-0 md:ml-10 mb-2 text-sm text-gray-900 dark:text-white w-1/5">
                    Tanggal Pengembalian
                </label>
                <input type="text" readonly value="<?= !empty($baris['tanggal']) ? date('d/m/Y, H:i', strtotime($baris['tanggal'])) : '-' ?>"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white bg-gray-100 cursor-not-allowed">
            </div>

            <!-- Pemohon + Ruangan -->
            <div class="mb-5 sm:block md:flex items-center">
                <label class="block mb-2 md:mb-0 text-sm text-gray-900 dark:text-white md:w-1/4">
                    Pemohon
                </label>
                <input type="text" readonly value="<?= esc($baris['nama'] ?? '-') ?>"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white bg-gray-100 cursor-not-allowed">

                <label class="block mt-5 md:my-0 md:ml-10 mb-2 text-sm text-gray-900 dark:text-white w-1/5">
                    Ruangan
                </label>
                <input type="text" readonly value="<?= esc($baris['nama_ruangan'] ?? '-') ?>"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white bg-gray-100 cursor-not-allowed">
            </div>

            <!-- Permintaan Asal + Status -->
            <div class="mb-5 sm:block md:flex items-center">
                <label class="block mb-2 md:mb-0 text-sm text-gray-900 dark:text-white md:w-1/4">
                    Permintaan Asal
                </label>
                <input type="text" readonly value="<?= esc($baris['no_permintaan'] ?? '-') ?>"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white bg-gray-100 cursor-not-allowed">

                <label class="block mt-5 md:my-0 md:ml-10 mb-2 text-sm text-gray-900 dark:text-white w-1/5">
                    Status
                </label>
                <input type="text" readonly value="<?= esc($baris['nama_status_pengembalian_barang'] ?? '-') ?>"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white bg-gray-100 cursor-not-allowed">
            </div>

            <!-- Alasan dari unit -->
            <div class="mb-5 sm:block md:flex items-start">
                <label class="block mb-2 md:mb-0 text-sm text-gray-900 dark:text-white md:w-1/4">
                    Alasan Pengembalian
                </label>
                <textarea readonly rows="2"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full dark:border-gray-600 dark:text-white bg-gray-100 cursor-not-allowed"><?= esc($baris['alasan'] ?? '-') ?></textarea>
            </div>

            <!-- Staf Gudang -->
            <div class="mb-5 sm:block md:flex items-center">
                <label class="block mb-2 md:mb-0 text-sm text-gray-900 dark:text-white md:w-1/4">
                    Staf Gudang<span class="text-red-600">*</span>
                </label>
                <div class="w-full lg:w-1/4 flex gap-x-2">
                    <input type="text" id="petugas_gudang_display"
                        placeholder="Klik cari staf gudang..."
                        onclick="open_modalPetugas()"
                        onkeydown="return false"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full dark:border-gray-600 dark:text-white cursor-pointer bg-white">
                    <button type="button" onclick="open_modalPetugas()"
                        class="inline-flex justify-center items-center p-2 text-sm font-medium text-white bg-blue-600 rounded-lg border border-transparent hover:bg-blue-700 focus:outline-none transition-all w-10 flex-shrink-0 shadow-sm" style="height:38px;">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Catatan Persetujuan -->
            <div class="mb-5 sm:block md:flex items-start">
                <label for="catatan_verifikasi" class="block mb-2 md:mb-0 text-sm text-gray-900 dark:text-white md:w-1/4">
                    Catatan Persetujuan
                    <span class="block text-xs text-gray-500">Wajib diisi bila menolak</span>
                </label>
                <textarea name="catatan_verifikasi" id="catatan_verifikasi" rows="2"
                    placeholder="Hasil pemeriksaan fisik, atau alasan penolakan..."
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full dark:border-gray-600 dark:text-white dark:bg-slate-800"></textarea>
            </div>

            <!-- Detail Barang -->
            <div class="mb-4 border-t pt-5" style="margin-top:2rem;">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-base font-semibold text-gray-800 dark:text-white">Detail Barang</h3>
                </div>
                <p class="text-xs text-gray-500 mb-3">
                    Isi Qty Disetujui sesuai hasil pemeriksaan fisik (0 sampai Qty Diajukan). Hanya Qty Disetujui yang menambah stok gudang;
                    bila semua 0, pengembalian dicatat sebagai Ditolak.
                </p>

                <div class="border rounded-lg overflow-hidden">
                    <table class="w-full text-sm text-gray-700 dark:text-gray-300">
                        <thead style="background-color: #E6F2EF;">
                            <tr>
                                <th class="p-3 border text-center font-semibold">Kode</th>
                                <th class="p-3 border text-center font-semibold">Nama Barang</th>
                                <th class="p-3 border text-center font-semibold">Satuan</th>
                                <th class="p-3 border text-center font-semibold" style="width:7rem;">Qty Diajukan</th>
                                <th class="p-3 border text-center font-semibold" style="width:8rem;">Qty Disetujui</th>
                                <th class="p-3 border text-center font-semibold">Catatan Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($detail_items)): ?>
                                <?php foreach ($detail_items as $item): ?>
                                    <tr>
                                        <td class="p-3 border text-center"><?= esc($item['kode_barang'] ?? '-') ?></td>
                                        <td class="p-3 border"><?= esc($item['nama_barang'] ?? '-') ?></td>
                                        <td class="p-3 border text-center"><?= esc($item['nama_satuan'] ?? '-') ?></td>
                                        <td class="p-3 border text-center"><?= (int) $item['qty_diajukan'] ?></td>
                                        <td class="p-3 border text-center">
                                            <input type="hidden" name="detail_id_detail[]" value="<?= (int) $item['id_detail'] ?>">
                                            <input type="number" name="detail_qty_diverifikasi[]" value="<?= (int) $item['qty_diajukan'] ?>"
                                                min="0" max="<?= (int) $item['qty_diajukan'] ?>" step="1" required
                                                class="qty-disetujui border border-gray-300 rounded-lg p-1 w-full text-center text-sm">
                                        </td>
                                        <td class="p-3 border"><?= esc($item['catatan'] ?? '-') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-gray-400">Tidak ada detail barang.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tombol: format components/form/submit_button (Kembali | aksi), dengan
                 pasangan Tolak/Setujui menggantikan satu tombol Simpan. -->
            <div class="mt-5 pt-5 border-t flex justify-end gap-x-2">
                <a href="javascript:history.back()" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                    Kembali
                </a>
                <button type="button" onclick="submitKeputusan('tolak')"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-red-200 bg-red-50 text-red-700 shadow-sm hover:bg-red-100">
                    Tolak Pengembalian
                </button>
                <button type="button" onclick="submitKeputusan('setuju')"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E]">
                    Setujui Pengembalian
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Dipanggil components/modal/modalpetugas.php
    function autofillPetugas(item) {
        document.getElementById('petugas_gudang').value = item.id_petugas ?? '';
        document.getElementById('petugas_gudang_display').value = item.nama ?? '';
    }

    function peringatan(text) {
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian',
            text: text,
            confirmButtonText: 'Tutup',
            customClass: {
                confirmButton: 'bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E] font-medium rounded-lg px-4 py-2'
            },
            buttonsStyling: false
        });
    }

    function submitKeputusan(aksi) {
        const form = document.getElementById('myForm');
        if (!document.getElementById('petugas_gudang').value) {
            peringatan('Pilih staf gudang terlebih dahulu.');
            return;
        }

        const catatan = document.getElementById('catatan_verifikasi').value.trim();
        let total = 0;
        document.querySelectorAll('.qty-disetujui').forEach((el) => { total += parseInt(el.value, 10) || 0; });

        let judul, teks, konfirmasi;
        if (aksi === 'tolak') {
            if (!catatan) { peringatan('Isi Catatan Persetujuan sebagai alasan penolakan.'); return; }
            judul = 'Tolak Pengembalian';
            teks = 'Tolak pengembalian ini? Stok gudang tidak berubah dan kuota pengembalian kembali tersedia untuk unit.';
            konfirmasi = 'Ya, Tolak';
        } else {
            // reportValidity() menegakkan 0 <= Qty Disetujui <= Qty Diajukan
            if (!form.reportValidity()) return;
            if (total === 0) {
                if (!catatan) { peringatan('Semua Qty Disetujui 0 berarti pengembalian ditolak. Isi Catatan Persetujuan sebagai alasan penolakan.'); return; }
                judul = 'Semua Qty Disetujui 0';
                teks = 'Tidak ada barang yang diterima gudang, pengembalian akan dicatat sebagai Ditolak.';
                konfirmasi = 'Ya, Lanjutkan';
            } else {
                judul = 'Setujui Pengembalian';
                teks = 'Setujui pengembalian ini? ' + total + ' unit akan ditambahkan ke stok gudang. Keputusan ini tidak dapat diubah.';
                konfirmasi = 'Ya, Setujui';
            }
        }

        Swal.fire({
            icon: 'question',
            title: judul,
            text: teks,
            showCancelButton: true,
            confirmButtonText: konfirmasi,
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E] font-medium rounded-lg px-4 py-2',
                cancelButton: 'bg-gray-200 text-gray-800 hover:bg-gray-300 font-medium rounded-lg px-4 py-2',
                actions: 'flex items-center justify-center gap-3'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('aksi_input').value = aksi;
                form.submit();
            }
        });
    }
</script>

<?= $this->endSection(); ?>

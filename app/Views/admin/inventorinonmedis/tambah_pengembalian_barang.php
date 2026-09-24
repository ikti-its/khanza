<?php
$isEdit       = !empty($baris ?? []);
$baris        = $baris ?? [];
$detail_items = $detail_items ?? [];
$kuota        = $kuota ?? [];
?>
<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<?= $this->include('components/modal/modalPemohon') ?>
<?= $this->include('components/modal/modalPermintaanPengembalian') ?>
<?= $this->include('components/modal/modalBarangPengembalian') ?>

<div class="max-w-[85rem] py-6 lg:py-3 px-8 mx-auto">
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
        <?= view('components/form/judul', ['judul' => $judul]) ?>

        <form action="<?= $modul_path . $form_action ?>" id="myForm" onsubmit="return validateForm()" method="post">
            <?= csrf_field() ?>

            <input type="hidden" name="petugas" id="petugas" value="<?= esc((string) ($baris['petugas'] ?? '')) ?>">
            <input type="hidden" name="id_permintaan" id="id_permintaan" value="<?= esc((string) ($baris['id_permintaan'] ?? '')) ?>">

            <!-- No. Pengembalian (auto) + Tanggal -->
            <div class="mb-5 sm:block md:flex items-center">
                <label class="block mb-2 md:mb-0 text-sm text-gray-900 dark:text-white md:w-1/4">
                    No. Pengembalian
                </label>
                <input type="text" readonly placeholder="Terisi otomatis..." value="<?= esc($baris['no_pengembalian'] ?? '') ?>"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white bg-gray-100 cursor-not-allowed">

                <label class="block mt-5 md:my-0 md:ml-10 mb-2 text-sm text-gray-900 dark:text-white w-1/5">
                    Tanggal Pengembalian<span class="text-red-600">*</span>
                </label>
                <input type="datetime-local" name="tanggal" id="tanggal"
                    value="<?= !empty($baris['tanggal']) ? date('Y-m-d\TH:i', strtotime($baris['tanggal'])) : date('Y-m-d\TH:i') ?>"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white dark:bg-slate-800" required>
            </div>

            <!-- Permintaan Asal + Ruangan (disalin dari permintaan) -->
            <div class="mb-5 sm:block md:flex items-center">
                <label class="block mb-2 md:mb-0 text-sm text-gray-900 dark:text-white md:w-1/4">
                    Permintaan Asal<span class="text-red-600">*</span>
                </label>
                <div class="w-full lg:w-1/4 flex gap-x-2">
                    <input type="text" id="id_permintaan_display"
                        placeholder="Klik cari permintaan..."
                        value="<?= esc($baris['no_permintaan'] ?? '') ?>"
                        onclick="open_modalPermintaanPengembalian()"
                        onkeydown="return false"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full dark:border-gray-600 dark:text-white cursor-pointer bg-white" required>
                    <button type="button" onclick="open_modalPermintaanPengembalian()"
                        class="inline-flex justify-center items-center p-2 text-sm font-medium text-white bg-blue-600 rounded-lg border border-transparent hover:bg-blue-700 focus:outline-none transition-all w-10 h-[38px] flex-shrink-0 shadow-sm">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>

                <label class="block mt-5 md:my-0 md:ml-10 mb-2 text-sm text-gray-900 dark:text-white w-1/5">
                    Ruangan
                </label>
                <input type="text" id="master_ruangan_display" readonly
                    placeholder="Mengikuti permintaan asal"
                    value="<?= esc($baris['nama_ruangan'] ?? '') ?>"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white bg-gray-100 cursor-not-allowed">
            </div>

            <!-- Pemohon + Status -->
            <div class="mb-5 sm:block md:flex items-center">
                <label class="block mb-2 md:mb-0 text-sm text-gray-900 dark:text-white md:w-1/4">
                    Pemohon<span class="text-red-600">*</span>
                </label>
                <div class="w-full lg:w-1/4 flex gap-x-2">
                    <input type="text" id="petugas_display"
                        placeholder="Klik cari pemohon..."
                        value="<?= esc($baris['nama'] ?? '') ?>"
                        onclick="open_modalPemohon()"
                        onkeydown="return false"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full dark:border-gray-600 dark:text-white cursor-pointer bg-white" required>
                    <button type="button" onclick="open_modalPemohon()"
                        class="inline-flex justify-center items-center p-2 text-sm font-medium text-white bg-blue-600 rounded-lg border border-transparent hover:bg-blue-700 focus:outline-none transition-all w-10 h-[38px] flex-shrink-0 shadow-sm">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>

                <label class="block mt-5 md:my-0 md:ml-10 mb-2 text-sm text-gray-900 dark:text-white w-1/5">
                    Status
                </label>
                <input type="text" readonly value="<?= esc($baris['nama_status_pengembalian_barang'] ?? 'Draf') ?>"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white bg-gray-100 cursor-not-allowed">
            </div>

            <!-- Alasan -->
            <div class="mb-5 sm:block md:flex items-start">
                <label class="block mb-2 md:mb-0 md:pt-2 text-sm text-gray-900 dark:text-white md:w-1/4">
                    Alasan Pengembalian<span class="text-red-600">*</span>
                </label>
                <textarea name="alasan" id="alasan" rows="3" required
                    placeholder="Mengapa barang dikembalikan..."
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-3/4 dark:border-gray-600 dark:text-white dark:bg-slate-800"><?= esc($baris['alasan'] ?? '') ?></textarea>
            </div>

            <!-- Detail Barang -->
            <div class="mt-8 mb-4 border-t pt-5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-base font-semibold text-gray-800 dark:text-white">Barang yang Dikembalikan</h3>
                    <button type="button" id="btnPilihBarang" onclick="bukaModalBarang()"
                        class="inline-flex items-center gap-x-1.5 py-2 px-3 text-sm font-semibold rounded-lg border border-transparent bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E] transition-all shadow-sm disabled:opacity-50 disabled:cursor-not-allowed"
                        <?= empty($baris['id_permintaan']) ? 'disabled' : '' ?>>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Pilih Barang
                    </button>
                </div>
                <p class="text-xs text-gray-500 mb-3">
                    Hanya barang yang benar-benar dikeluarkan untuk permintaan asal. Sisa = qty keluar dikurangi pengembalian yang sudah diajukan atau selesai; draf tidak mengurangi sisa.
                </p>

                <div class="border rounded-lg overflow-hidden">
                    <table class="w-full text-sm text-gray-700 dark:text-gray-300">
                        <thead style="background-color: #E6F2EF;">
                            <tr>
                                <th class="p-3 border text-center font-semibold">Kode</th>
                                <th class="p-3 border text-center font-semibold">Nama Barang</th>
                                <th class="p-3 border text-center font-semibold">Satuan</th>
                                <th class="p-3 border text-center font-semibold">Qty Keluar</th>
                                <th class="p-3 border text-center font-semibold">Sudah Dikembalikan</th>
                                <th class="p-3 border text-center font-semibold">Sisa</th>
                                <th class="p-3 border text-center font-semibold w-32">Qty Diajukan</th>
                                <th class="p-3 border text-center font-semibold">Catatan</th>
                                <th class="p-3 border text-center font-semibold w-20">Hapus</th>
                            </tr>
                        </thead>
                        <tbody id="detailTableBody">
                            <?php if ($isEdit && !empty($detail_items)): ?>
                                <?php foreach ($detail_items as $item): ?>
                                    <?php
                                    $k    = $kuota[(int) $item['id_barang']] ?? null;
                                    $sisa = (int) ($k['sisa'] ?? 0);
                                    ?>
                                    <tr data-id="<?= (int) $item['id_barang'] ?>">
                                        <td class="p-3 border text-center">
                                            <?= esc($item['kode_barang'] ?? '-') ?>
                                            <input type="hidden" name="detail_id_barang[]" value="<?= (int) $item['id_barang'] ?>">
                                        </td>
                                        <td class="p-3 border"><?= esc($item['nama_barang'] ?? '-') ?></td>
                                        <td class="p-3 border text-center"><?= esc($item['nama_satuan'] ?? '-') ?></td>
                                        <td class="p-3 border text-center"><?= (int) ($k['qty_keluar'] ?? 0) ?></td>
                                        <td class="p-3 border text-center"><?= (int) ($k['sudah_dikembalikan'] ?? 0) ?></td>
                                        <td class="p-3 border text-center font-semibold"><?= $sisa ?></td>
                                        <td class="p-3 border text-center">
                                            <input type="number" name="detail_qty[]" value="<?= (int) $item['qty_diajukan'] ?>" min="1" max="<?= $sisa ?>"
                                                class="border border-gray-300 rounded-lg p-1 w-full text-center text-sm" required>
                                        </td>
                                        <td class="p-3 border text-center">
                                            <input type="text" name="detail_catatan[]" value="<?= esc($item['catatan'] ?? '') ?>" placeholder="Opsional"
                                                class="border border-gray-300 rounded-lg p-1 w-full text-sm">
                                        </td>
                                        <td class="p-3 border text-center">
                                            <button type="button" onclick="hapusItem(this)" class="text-red-600 hover:underline text-sm">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr id="emptyRow">
                                    <td colspan="9" class="p-4 text-center text-gray-400 italic">Belum ada barang dipilih</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?= view('components/form/submit_button') ?>
        </form>
    </div>
</div>

<script>
    var EMPTY_ROW = '<tr id="emptyRow"><td colspan="9" class="p-4 text-center text-gray-400 italic">Belum ada barang dipilih</td></tr>';

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, function (c) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
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

    function jumlahBaris() {
        return document.querySelectorAll('#detailTableBody tr[data-id]').length;
    }

    // Dipanggil modalPermintaanPengembalian. Ganti permintaan = kosongkan baris,
    // karena kuota barang terikat pada permintaan asal.
    function pilihPermintaanPengembalian(item) {
        var current = document.getElementById('id_permintaan').value;
        var terapkan = function () {
            document.getElementById('id_permintaan').value = item.id_permintaan ?? '';
            document.getElementById('id_permintaan_display').value = item.no_permintaan ?? '';
            document.getElementById('master_ruangan_display').value = item.nama_ruangan ?? '';
            document.getElementById('btnPilihBarang').disabled = !item.id_permintaan;
            if (String(current) !== String(item.id_permintaan)) {
                document.getElementById('detailTableBody').innerHTML = EMPTY_ROW;
            }
        };

        if (current && String(current) !== String(item.id_permintaan) && jumlahBaris() > 0) {
            Swal.fire({
                icon: 'question',
                title: 'Ganti Permintaan Asal?',
                text: 'Daftar barang yang sudah dipilih akan dikosongkan.',
                showCancelButton: true,
                confirmButtonText: 'Ganti',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E] font-medium rounded-lg px-4 py-2',
                    cancelButton: 'bg-gray-200 text-gray-800 hover:bg-gray-300 font-medium rounded-lg px-4 py-2',
                    actions: 'flex items-center justify-center gap-3'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.isConfirmed) terapkan();
            });
            return;
        }
        terapkan();
    }

    function bukaModalBarang() {
        if (!document.getElementById('id_permintaan').value) {
            peringatan('Pilih permintaan asal terlebih dahulu.');
            return;
        }
        open_modalBarangPengembalian();
    }

    // Dipanggil modalBarangPengembalian
    function tambahBarangPengembalian(item) {
        var idBarang = parseInt(item.id_barang, 10);
        if (!idBarang) return;

        if (document.querySelector('#detailTableBody tr[data-id="' + idBarang + '"]')) {
            peringatan('Barang ini sudah ada di daftar.');
            return;
        }

        var emptyRow = document.getElementById('emptyRow');
        if (emptyRow) emptyRow.remove();

        var sisa = parseInt(item.sisa, 10) || 0;
        var tr = document.createElement('tr');
        tr.dataset.id = idBarang;
        tr.innerHTML = `
            <td class="p-3 border text-center">
                ${escapeHtml(item.kode_barang)}
                <input type="hidden" name="detail_id_barang[]" value="${idBarang}">
            </td>
            <td class="p-3 border">${escapeHtml(item.nama_barang)}</td>
            <td class="p-3 border text-center">${escapeHtml(item.nama_satuan)}</td>
            <td class="p-3 border text-center">${parseInt(item.qty_keluar, 10) || 0}</td>
            <td class="p-3 border text-center">${parseInt(item.sudah_dikembalikan, 10) || 0}</td>
            <td class="p-3 border text-center font-semibold">${sisa}</td>
            <td class="p-3 border text-center">
                <input type="number" name="detail_qty[]" value="1" min="1" max="${sisa}"
                       class="border border-gray-300 rounded-lg p-1 w-full text-center text-sm" required>
            </td>
            <td class="p-3 border text-center">
                <input type="text" name="detail_catatan[]" value="" placeholder="Opsional"
                       class="border border-gray-300 rounded-lg p-1 w-full text-sm">
            </td>
            <td class="p-3 border text-center">
                <button type="button" onclick="hapusItem(this)" class="text-red-600 hover:underline text-sm">Hapus</button>
            </td>`;
        document.getElementById('detailTableBody').appendChild(tr);
    }

    function hapusItem(btn) {
        btn.closest('tr').remove();
        if (jumlahBaris() === 0) {
            document.getElementById('detailTableBody').innerHTML = EMPTY_ROW;
        }
    }

    function validateForm() {
        if (!document.getElementById('id_permintaan').value) {
            peringatan('Permintaan asal wajib dipilih.');
            return false;
        }
        if (!document.getElementById('petugas').value) {
            peringatan('Pemohon wajib dipilih.');
            return false;
        }
        // reportValidity() juga menegakkan min/max qty terhadap sisa
        if (!document.getElementById('myForm').reportValidity()) {
            return false;
        }

        var submitButton = document.getElementById('submitButton');
        if (submitButton) {
            submitButton.setAttribute('disabled', true);
            submitButton.innerHTML = 'Menyimpan...';
        }
        return true;
    }
</script>

<?= $this->endSection(); ?>

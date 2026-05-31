<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<?= $this->include('components/modal/modalpasien') ?>

<div class="max-w-[85rem] py-6 lg:py-3 px-8 mx-auto">
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
        <?= view('components/form/judul', ['judul' => $judul]) ?>

        <form action="<?= $modul_path . $form_action ?>" id="myForm" onsubmit="return validateForm()" method="post">
            <?= csrf_field() ?>

            <input type="hidden" name="no_rm" id="no_rm" required>
            
            <div class="mb-5 sm:block md:flex items-center">
                <label class="block mb-2 md:mb-0 text-sm text-gray-900 dark:text-white md:w-1/4">
                    No. Rekam Medis<span class="text-red-600">*</span>
                </label>
                <div class="w-full lg:w-1/2 flex gap-x-2">
                    <input type="text" id="no_rm_display" readonly required
                           placeholder="Klik cari pasien..." onclick="open_modalPasien()"
                           class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full dark:border-gray-600 dark:text-white cursor-pointer bg-slate-50">
                    <button type="button" onclick="open_modalPasien()"
                            class="inline-flex justify-center items-center p-2 text-sm font-medium text-white bg-blue-600 rounded-lg border border-transparent hover:bg-blue-700 focus:outline-none transition-all w-10 h-[38px] flex-shrink-0 shadow-sm">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div id="cardPasien" class="hidden mb-6 bg-slate-50 border border-slate-200 rounded-xl p-5 dark:bg-slate-800 dark:border-slate-700 shadow-sm">
                <div class="flex items-center gap-x-2 mb-3 border-b border-slate-200 pb-2 dark:border-slate-700">
                    <svg class="w-4 h-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider dark:text-slate-400">
                        Profil Pasien Terpilih
                    </h4>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-3 gap-x-6 text-sm text-slate-700 dark:text-slate-300">
                    <div class="flex justify-between border-b border-slate-100 pb-1 dark:border-slate-700/50">
                        <span class="text-slate-400">Nama Pasien:</span>
                        <span id="card_nm_pasien" class="font-semibold text-slate-800 dark:text-white">-</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-100 pb-1 dark:border-slate-700/50">
                        <span class="text-slate-400">Jenis Kelamin:</span>
                        <span id="card_jk" class="font-semibold text-slate-800 dark:text-white">-</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-100 pb-1 dark:border-slate-700/50">
                        <span class="text-slate-400">Tanggal Lahir:</span>
                        <span id="card_tgl_lahir" class="font-semibold text-slate-800 dark:text-white">-</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-100 pb-1 dark:border-slate-700/50">
                        <span class="text-slate-400">Umur:</span>
                        <span id="card_umur" class="font-semibold text-slate-800 dark:text-white">-</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-100 pb-1 dark:border-slate-700/50">
                        <span class="text-slate-400">Gol. Darah:</span>
                        <span id="card_gol_darah" class="px-2 py-0.5 text-xs bg-blue-100 text-blue-800 rounded font-bold dark:bg-blue-900/30 dark:text-blue-400">-</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-100 pb-1 dark:border-slate-700/50">
                        <span class="text-slate-400">Status Nikah:</span>
                        <span id="card_stts_nikah" class="font-semibold text-slate-800 dark:text-white">-</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-100 pb-1 dark:border-slate-700/50">
                        <span class="text-slate-400">Agama:</span>
                        <span id="card_agama" class="font-semibold text-slate-800 dark:text-white">-</span>
                    </div>
                </div>
            </div>

            <?php
            $konfigTanpaRM = array_values(array_filter($konfig, fn($f) => $f[2] !== 'no_rm' && $f[2] !== 'id_skrining'));
            ?>
            <?= view('components/form/isian', ['konfig' => $konfigTanpaRM, 'baris' => $baris]) ?>


            <div class="flex justify-end gap-x-2 mt-8 border-t border-gray-100 pt-4 dark:border-gray-700">
                <?= view('components/form/submit_button') ?>
            </div>
        </form>
    </div>
</div>

<script>
    function autofillFields(item) {
        document.getElementById('no_rm').value        = item.no_rkm_medis;
        document.getElementById('no_rm_display').value = item.no_rkm_medis;

        document.getElementById('card_nm_pasien').innerText  = item.nm_pasien  ?? '-';
        document.getElementById('card_jk').innerText         = item.jk         ?? '-';
        document.getElementById('card_tgl_lahir').innerText  = item.tgl_lahir  ?? '-';
        document.getElementById('card_umur').innerText       = item.umur       ?? '-';
        document.getElementById('card_gol_darah').innerText  = item.gol_darah  ?? '-';
        document.getElementById('card_stts_nikah').innerText = item.stts_nikah ?? '-';
        document.getElementById('card_agama').innerText      = item.agama      ?? '-';

        document.getElementById('cardPasien').classList.remove('hidden');
    }

    function validateForm() {
        const noRm = document.getElementById('no_rm').value;
        if (!noRm) {
            alert('Silakan pilih pasien terlebih dahulu melalui modal pencarian.');
            return false;
        }

        var requiredFields = document.querySelectorAll('select[required], input[required]');
        for (var i = 0; i < requiredFields.length; i++) {
            if (!requiredFields[i].value) {
                alert('Isi semua field yang wajib diisi.');
                return false;
            }
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
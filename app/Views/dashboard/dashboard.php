<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="absolute inset-0">
    <img class="object-cover w-full h-[72%]" src="/img/background.png" alt="Dashboard Background">
</div>
<div class="relative overflow-x-auto mt-5 ml-4 mr-4  bg-white shadow-xl rounded-lg text-gray-900">

    <div class="absolute inset-0">
        <img class="object-cover w-full h-full" src="/img/dashboard.png" alt="Dashboard Background">
    </div>
    <div class="relative max-w-5xl mx-auto px-4 xl:px-4 pt-10 lg:pt-16 pb-8 text-white">
        <div class="font-medium text-m md:text-l">
            <span class="text-black">Selamat Datang, </span>
        </div>
        <h1 class="font-bold text-3xl md:text-4xl">
            <span class="text-black">
                <?php
                    $userData = session()->get('user_specific_data');
    
                    $nama = '';                    
                    if (is_array($userData) && isset($userData['nama']) && !empty(trim($userData['nama']))) {
                        $nama = trim($userData['nama']);
                    } elseif (isset($userData['email'])) {
                        $nama = explode('@', $userData['email'])[0];
                    } else {
                        $nama = 'Admins';
                    }
                    
                    $firstWord = explode(' ', trim($nama))[0];
                    
                    echo $firstWord;
                ?>
            </span>
        </h1>
        <div class="max-w-4xl flex justify-between">

            <div class="group mt-28 pt-10 items-center py-2 px-2 text-lg font-medium text-white">
                <span>Status </span>
                <p class="text-white mt-1 flex items-center">
                    
                    <?php if (session()->has('user_specific_data') && isset(session('user_specific_data')['status']) && session('user_specific_data')['status'] === true) :?>
                        <img src="<?= base_url('svg/layouts/dashboard/presensi/hadir.svg')?>"">
                        &nbsp; Hadir
                    <?php else : ?>
                        <img src="<?= base_url('svg/layouts/dashboard/presensi/absen.svg')?>"">
                        &nbsp; Belum Absen
                    <?php endif; ?>
                </p>
            </div>


            <div class="group mt-28 pt-10 items-center py-2 px-2 text-lg font-medium text-white">
                <span>Shift</span>
                <p>
                    <?php 
                        $userData = session('user_specific_data');
                        echo isset($userData['jam_masuk']) ? $userData['jam_masuk'] : 'N/A';
                        echo ' - ';
                        echo isset($userData['jam_pulang']) ? $userData['jam_pulang'] : 'N/A';
                    ?> 
                </p>
            </div>

        </div>
    </div>

</div>

<?= $this->include('dashboard/card_list'); ?>

<?php if (session()->has('jwt_token')): ?>
<script>
    // Simpan token ke sessionStorage untuk digunakan oleh fetch()
    sessionStorage.setItem("token", "<?= session('jwt_token') ?>");
    console.log("✅ JWT disimpan ke sessionStorage");
</script>
<?php endif; ?>
<?= $this->endSection(); ?>
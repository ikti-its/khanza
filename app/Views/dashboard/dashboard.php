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
        <?= $this->include('dashboard/user') ?>
        <div class="max-w-4xl flex justify-between">
            <?= $this->include('dashboard/presensi') ?>
            <?= $this->include('dashboard/shift') ?>
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
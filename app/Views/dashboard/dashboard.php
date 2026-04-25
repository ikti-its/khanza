<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="absolute inset-0">
    <img class="object-cover w-full h-[72%]" src="/img/fix-background-dashboard-image.png" alt="Dashboard Background">
</div>
<div class="relative overflow-x-auto mt-5 ml-4 mr-4  bg-white shadow-xl rounded-lg text-gray-900">

    <div class="absolute inset-0">
        <img class="object-cover w-full h-full" src="/img/fix-dashboard-image.png" alt="Dashboard Background">
        <div class="absolute inset-0"></div>
    </div>
    <div class="relative max-w-5xl mx-auto px-4 xl:px-4 pt-10 lg:pt-16 pb-8 text-white">
        <div class="font-medium text-m md:text-l">
            <span class="text-black">Selamat Datang, </span>
        </div>
        <h1 class="font-bold text-3xl md:text-4xl">
            <span class="text-black">
                <?php
                    // Retrieve session data
                    $userData = session()->get('user_specific_data');
                    $userData = "akun not found";
    
                    $nama = '';                    
                    // Check if $userData is an array and contains 'nama'
                    if (is_array($userData) && isset($userData['nama']) && !empty(trim($userData['nama']))) {
                        $nama = trim($userData['nama']);
                    } elseif (isset($userData['email'])) {
                        // Extract the first part of the email before '@'
                        $nama = explode('@', $userData['email'])[0];
                    } else {
                        $nama = 'Admins'; // Default fallback if email is also missing
                    }
                    
                    // Extract the first word from the determined name
                    $firstWord = explode(' ', trim($nama))[0];
                    
                    echo $firstWord;
                ?>
            </span>
        </h1>
        <div class="max-w-4xl flex justify-between">

            <div class="group mt-28 pt-10 items-center py-2 px-2 text-lg font-medium text-white">
                <span>Status </span>
                <p class="text-white mt-1 flex items-center">
                    <?php
                    if (session()->has('user_specific_data') && isset(session('user_specific_data')['status']) && session('user_specific_data')['status'] === true) {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none" class="mr-2">
                    <circle cx="4" cy="4" r="4" fill="#30DFC4"/>
                  </svg> Hadir';
                    } else {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none" class="mr-2">
                    <circle cx="4" cy="4" r="4" fill="#EF4444"/>
                  </svg> Belum Absen';
                    }
                    ?>
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

<div class="relative overflow-x-auto">
    <div class="px-4 py-10 sm:px-6 lg:py-10 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="px-5 py-5 flex flex-col justify-center items-start bg-white rounded-t-xl">
                    <img src="<?= base_url('svg/layouts/dashboard/desain_sistem.svg') ?>" alt="Icon">
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-neutral-300 dark:hover:text-white">
                        Desain Sistem
                    </h3>
                    <p class="mt-3 font-medium text-gray-500 dark:text-neutral-500">
                        Temukan pedoman dan elemen desain yang konsisten untuk membangun antarmuka pengguna yang efektif dan intuitif
                    </p>
                </div>
                <div class="p-4 md:p-6">
                    <a href="#" class="group inline-flex items-center py-2 border border-transparent text-base font-medium rounded-md text-[#1D8676] bg-transparent hover:text-gray-200 transition duration-300">
                        Jelajahi Desain Sistem
                        <svg class="ml-3 group-hover:stroke-gray-200 transition duration-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M8.90997 19.9201L15.43 13.4001C16.2 12.6301 16.2 11.3701 15.43 10.6001L8.90997 4.08008" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="px-5 py-5 flex flex-col justify-center items-start bg-white rounded-t-xl">
                    <img src="<?= base_url('svg/layouts/dashboard/tutorial_video.svg') ?>" alt="Icon">
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-neutral-300 dark:hover:text-white">
                        Tutorial Video
                    </h3>
                    <p class="mt-3 font-medium text-gray-500 dark:text-neutral-500">
                        Ikuti langkah-langkah praktis dalam video tutorial kami untuk memaksimalkan penggunaan sistem dan fitur-fiturnya
                    </p>
                </div>
                <div class="p-4 md:p-6">
                    <a href="#" class="group inline-flex items-center py-2 border border-transparent text-base font-medium rounded-md text-[#1D8676] bg-transparent hover:text-gray-200 transition duration-300">
                        Tonton Tutorial
                        <svg class="ml-3 group-hover:stroke-gray-200 transition duration-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M8.90997 19.9201L15.43 13.4001C16.2 12.6301 16.2 11.3701 15.43 10.6001L8.90997 4.08008" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>

            </div>

            <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="px-5 py-5 flex flex-col justify-center items-start bg-white rounded-t-xl">
                    <img src="<?= base_url('svg/layouts/dashboard/faq.svg') ?>" alt="Icon">
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-neutral-300 dark:hover:text-white">
                        FAQ
                    </h3>
                    <p class="mt-3 font-medium text-gray-500 dark:text-neutral-500">
                        Dapatkan jawaban cepat dan solusi untuk pertanyaan dan masalah umum yang mungkin Anda hadapi
                    </p>
                </div>
                <div class="p-4 md:p-6">
                    <a href="#" class="group inline-flex items-center py-2 border border-transparent text-base font-medium rounded-md text-[#1D8676] bg-transparent hover:text-gray-200 transition duration-300">
                        Lihat FAQ
                        <svg class="ml-3 group-hover:stroke-gray-200 transition duration-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M8.90997 19.9201L15.43 13.4001C16.2 12.6301 16.2 11.3701 15.43 10.6001L8.90997 4.08008" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (session()->has('jwt_token')): ?>
<script>
    // Simpan token ke sessionStorage untuk digunakan oleh fetch()
    sessionStorage.setItem("token", "<?= session('jwt_token') ?>");
    console.log("✅ JWT disimpan ke sessionStorage");
</script>
<?php endif; ?>
<?= $this->endSection(); ?>
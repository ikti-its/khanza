<div class="relative overflow-x-auto">
    <div class="px-4 py-10 sm:px-6 lg:py-10 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php 
                echo view('dashboard/card', [
                    'image'       => 'desain_sistem.svg',
                    'title'       => 'Desain Sistem',
                    'description' => 'Temukan pedoman dan elemen desain yang konsisten untuk membangun antarmuka pengguna yang efektif dan intuitif',
                    'action'      => 'Jelajahi Desain Sistem',
                    'url'         => '#'
                ]);

                echo view('dashboard/card', [
                    'image'       => 'tutorial_video.svg',
                    'title'       => 'Tutorial Video',
                    'description' => 'Ikuti langkah-langkah praktis dalam video tutorial kami untuk memaksimalkan penggunaan sistem dan fitur-fiturnya',
                    'action'      => 'Tonton Tutorial',
                    'url'         => '#'
                ]);

                echo view('dashboard/card', [
                    'image'       => 'faq.svg',
                    'title'       => 'FAQ',
                    'description' => 'Dapatkan jawaban cepat dan solusi untuk pertanyaan dan masalah umum yang mungkin Anda hadapi',
                    'action'      => 'Lihat FAQ',
                    'url'         => '#'
                ]);
            ?>
        </div>
    </div>
</div>
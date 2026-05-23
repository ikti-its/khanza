<div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
    <nav class="flex w-full justify-between items-center gap-x-1">
        <?php
            /**
             * @var array{'page':int, 'size':int, 'total':int} $meta_data
             * @var string $modul_path
             */
            $data = [
                'meta_data'  => $meta_data,
                'modul_path' => $modul_path
            ];
            echo view('components/footer/prev', $data);
            echo view('components/footer/page', $data);
            echo view('components/footer/next', $data);
        ?>
    </nav>
</div>

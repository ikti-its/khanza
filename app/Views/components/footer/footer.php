<div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
    <nav class="flex w-full justify-between items-center gap-x-1">
        <?php
            /**
             * @var array{'page':int, 'size':int, 'total':int} $meta_data
             * @var string $modul_path
             */
            // Parameter GET lain (kata kunci pencarian ?q=, filter induk, dll.) ikut terbawa saat
            // pindah halaman; http_build_query meng-encode karakter khusus termasuk tanda kutip.
            $extra = array_diff_key(service('request')->getGet() ?? [], ['page' => null, 'size' => null]);
            $data  = [
                'meta_data'   => $meta_data,
                'modul_path'  => $modul_path,
                'query_extra' => $extra !== [] ? '&' . http_build_query($extra) : '',
            ];
            echo view('components/footer/prev', $data);
            echo view('components/footer/page', $data);
            echo view('components/footer/next', $data);
        ?>
    </nav>
</div>

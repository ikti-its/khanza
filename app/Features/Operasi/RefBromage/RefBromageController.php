<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefBromage;
use App\Core\Controller\ControllerTemplate;

class RefBromageController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefBromageModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Bromage', 'icon' => 'ref_bromage'],
            ],
            judul: 'Referensi Bromage',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Bromage',   'id_bromage',   'indeks', 0],
                [1, 'Nama Skala',   'nama_skala',   'teks',   1],
                [1, 'Tingkat Blok', 'tingkat_blok', 'teks',   1],
                [1, 'Nilai',        'nilai',        'jumlah', 1],
                [1, 'Gambar',       'gambar',       'teks',   0],
            ],
        );
    }
}
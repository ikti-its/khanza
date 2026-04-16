<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteRespirasi;
use App\Core\Controller\ControllerTemplate;

class RefAldretteRespirasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefAldretteRespirasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Aldrette Respirasi', 'icon' => 'ref_aldrette_respirasi'],
            ],
            judul: 'Referensi Aldrette Respirasi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Respirasi', 'id_respirasi', 'indeks', 0],
                [1, 'Nama Skala',   'nama_skala',   'teks',   1],
                [1, 'Nilai',        'nilai',        'jumlah', 1],
            ],
        );
    }
}
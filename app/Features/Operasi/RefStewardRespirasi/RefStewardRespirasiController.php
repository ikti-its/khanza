<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardRespirasi;
use App\Core\Controller\ControllerTemplate;

final class RefStewardRespirasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStewardRespirasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Steward Respirasi', 'icon' => 'ref_steward_respirasi'],
            ],
            judul: 'Referensi Steward Respirasi',
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
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardRespirasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Respirasi', 'id_respirasi', 'indeks', OPTIONAL],
                [SHOW, 'Nama Skala',   'nama_skala',   'teks',   REQUIRED],
                [SHOW, 'Nilai',        'nilai',        'jumlah', REQUIRED],
            ],
        );
    }
}
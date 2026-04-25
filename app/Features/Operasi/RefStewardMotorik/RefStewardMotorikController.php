<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardMotorik;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefStewardMotorikController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStewardMotorikModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Steward Motorik', 'icon' => 'ref_steward_motorik'],
            ],
            judul: 'Referensi Steward Motorik',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Motorik', 'id_motorik', 'indeks', OPTIONAL],
                [SHOW, 'Nama Skala', 'nama_skala', 'teks',   REQUIRED],
                [SHOW, 'Nilai',      'nilai',      'jumlah', REQUIRED],
            ],
        );
    }
}
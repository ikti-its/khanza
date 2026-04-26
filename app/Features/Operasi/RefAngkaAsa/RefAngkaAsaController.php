<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAngkaAsa;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefAngkaAsaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefAngkaAsaModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Angka ASA', 'icon' => 'ref_angka_asa'],
            ],
            judul: 'Referensi Angka ASA',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_asa', 'ID ASA'],
                [SHOW, REQUIRED, I::TEXT, 'nama_asa', 'Nama ASA'],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefObatBebas;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefObatBebasController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefObatBebasModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Obat Bebas', 'icon' => 'ref_obat_bebas'],
            ],
            title: 'Referensi Obat Bebas',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_obat_bebas', 'ID Obat Bebas'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kategori', 'Nama Kategori'],
            ],
        );
    }
}
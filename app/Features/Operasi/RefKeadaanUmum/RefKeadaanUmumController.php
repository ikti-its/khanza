<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKeadaanUmum;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefKeadaanUmumController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKeadaanUmumModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Keadaan Umum', 'icon' => 'ref_keadaan_umum'],
            ],
            title: 'Referensi Keadaan Umum',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_keadaan_umum', 'ID Keadaan Umum'],
                [SHOW, REQUIRED, I::TEXT, 'nama_keadaan', 'Nama Keadaan'],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefIndikasiPindah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefIndikasiPindahController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefIndikasiPindahModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Indikasi Pindah', 'icon' => 'ref_indikasi_pindah'],
            ],
            title: 'Referensi Indikasi Pindah',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_indikasi', 'ID Indikasi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_indikasi', 'Nama Indikasi'],
            ],
        );
    }
}
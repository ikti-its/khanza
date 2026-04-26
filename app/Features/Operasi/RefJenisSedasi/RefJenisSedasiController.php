<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisSedasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefJenisSedasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefJenisSedasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Jenis Sedasi', 'icon' => 'ref_jenis_sedasi'],
            ],
            title: 'Referensi Jenis Sedasi',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_sedasi', 'ID Jenis Sedasi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_sedasi', 'Nama Sedasi'],
            ],
        );
    }
}
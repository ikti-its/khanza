<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefHubunganKeluarga;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefHubunganKeluargaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefHubunganKeluargaModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Hubungan Keluarga', 'icon' => 'ref_hubungan_keluarga'],
            ],
            judul: 'Referensi Hubungan Keluarga',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_hubungan_keluarga', 'ID Hubungan Keluarga'],
                [SHOW, REQUIRED, I::TEXT, 'nama_hubungan', 'Nama Hubungan'],
            ],
        );
    }
}
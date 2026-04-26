<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefStatusPermintaanRad;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefStatusPermintaanRadController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStatusPermintaanRadModel(),
            breadcrumbs: [
                ['title' => 'Radiologi', 'icon' => 'radiologi'],
                ['title' => 'Referensi Status Permintaan Radiologi', 'icon' => 'ref_status_permintaan_rad'],
            ],
            judul: 'Referensi Status Permintaan Radiologi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, OPTIONAL, I::INDEX, 'id_status', 'ID Status'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status', 'Nama Status'],
            ],
        );
    }
}
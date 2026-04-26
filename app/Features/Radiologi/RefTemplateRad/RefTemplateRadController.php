<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefTemplateRad;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefTemplateRadController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefTemplateRadModel(),
            breadcrumbs: [
                ['title' => 'Radiologi', 'icon' => 'radiologi'],
                ['title' => 'Referensi Template Radiologi', 'icon' => 'ref_template_rad'],
            ],
            judul: 'Referensi Template Radiologi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, OPTIONAL, I::INDEX, 'id_template', 'ID Template'],
                [SHOW, REQUIRED, I::TEXT, 'nama_template', 'Nama Template'],
                [SHOW, REQUIRED, I::TEXT, 'isi_teks_ekspertise', 'Isi Teks Ekspertise'],
            ],
        );
    }
}
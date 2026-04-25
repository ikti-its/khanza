<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefTemplateRad;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Template',         'id_template',         'indeks', 0],
                [1, 'Nama Template',       'nama_template',       'teks',   1],
                [1, 'Isi Teks Ekspertise', 'isi_teks_ekspertise', 'teks',   1],
            ],
        );
    }
}
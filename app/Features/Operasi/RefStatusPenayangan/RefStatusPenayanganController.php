<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusPenayangan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefStatusPenayanganController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStatusPenayanganModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Status Penayangan', 'icon' => 'ref_status_penayangan'],
            ],
            judul: 'Referensi Status Penayangan',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Status Penayangan', 'id_status_penayangan', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Status',          'nama_status',          I::TEXT,   REQUIRED],
            ],
        );
    }
}
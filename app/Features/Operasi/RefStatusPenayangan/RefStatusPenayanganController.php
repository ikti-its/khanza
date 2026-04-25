<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusPenayangan;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Status Penayangan', 'id_status_penayangan', 'indeks', 0],
                [1, 'Nama Status',          'nama_status',          'teks',   1],
            ],
        );
    }
}
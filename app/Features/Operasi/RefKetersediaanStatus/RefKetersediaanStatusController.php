<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKetersediaanStatus;
use App\Core\Controller\ControllerTemplate;

class RefKetersediaanStatusController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKetersediaanStatusModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Ketersediaan Status', 'icon' => 'ref_ketersediaan_status'],
            ],
            judul: 'Referensi Ketersediaan Status',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Ketersediaan Status', 'id_ketersediaan_status', 'indeks', 0],
                [1, 'Nama Ketersediaan',      'nama_ketersediaan',      'teks',   1],
            ],
        );
    }
}
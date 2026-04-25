<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusOperasi;
use App\Core\Controller\ControllerTemplate;

final class RefStatusOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStatusOperasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Status Operasi', 'icon' => 'ref_status_operasi'],
            ],
            judul: 'Referensi Status Operasi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Status',   'id_status',   'indeks', 0],
                [1, 'Nama Status', 'nama_status', 'teks',   1],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefStatusPermintaan;
use App\Core\Controller\ControllerTemplate;

final class RefStatusPermintaanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStatusPermintaanModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Referensi Status Permintaan', 'icon' => 'ref_status_permintaan'],
            ],
            judul: 'Referensi Status Permintaan',
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
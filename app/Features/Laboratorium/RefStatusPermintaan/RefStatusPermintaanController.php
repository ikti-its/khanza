<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefStatusPermintaan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Status',   'id_status',   'indeks', OPTIONAL],
                [SHOW, 'Nama Status', 'nama_status', 'teks',   REQUIRED],
            ],
        );
    }
}
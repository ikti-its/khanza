<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPosisiPasien;
use App\Core\Controller\ControllerTemplate;

final class RefPosisiPasienController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefPosisiPasienModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Posisi Pasien', 'icon' => 'ref_posisi_pasien'],
            ],
            judul: 'Referensi Posisi Pasien',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Posisi',   'id_posisi',   'indeks', OPTIONAL],
                [SHOW, 'Nama Posisi', 'nama_posisi', 'teks',   REQUIRED],
            ],
        );
    }
}
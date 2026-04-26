<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPosisiPasien;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, OPTIONAL, I::INDEX, 'id_posisi', 'ID Posisi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_posisi', 'Nama Posisi'],
            ],
        );
    }
}
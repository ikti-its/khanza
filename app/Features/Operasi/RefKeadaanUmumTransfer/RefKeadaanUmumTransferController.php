<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKeadaanUmumTransfer;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefKeadaanUmumTransferController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKeadaanUmumTransferModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Keadaan Umum Transfer', 'icon' => 'ref_keadaan_umum_transfer'],
            ],
            judul: 'Referensi Keadaan Umum Transfer',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Keadaan Umum', 'id_keadaan_umum', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Keadaan',    'nama_keadaan',    I::TEXT,   REQUIRED],
            ],
        );
    }
}
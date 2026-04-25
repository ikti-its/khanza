<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKeadaanUmum;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefKeadaanUmumController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKeadaanUmumModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Keadaan Umum', 'icon' => 'ref_keadaan_umum'],
            ],
            judul: 'Referensi Keadaan Umum',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Keadaan Umum', 'id_keadaan_umum', 'indeks', OPTIONAL],
                [SHOW, 'Nama Keadaan',    'nama_keadaan',    'teks',   REQUIRED],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisPenunjang;
use App\Core\Controller\ControllerTemplate;

final class RefJenisPenunjangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefJenisPenunjangModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Jenis Penunjang', 'icon' => 'ref_jenis_penunjang'],
            ],
            judul: 'Referensi Jenis Penunjang',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Jenis Penunjang', 'id_jenis_penunjang', 'indeks', OPTIONAL],
                [SHOW, 'Nama Jenis',         'nama_jenis',         'teks',   REQUIRED],
            ],
        );
    }
}
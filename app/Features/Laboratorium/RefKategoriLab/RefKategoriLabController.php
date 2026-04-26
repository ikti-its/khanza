<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriLab;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefKategoriLabController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKategoriLabModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Referensi Kategori Lab', 'icon' => 'ref_kategori_lab'],
            ],
            judul: 'Referensi Kategori Lab',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, OPTIONAL, I::INDEX, 'id_kategori', 'ID Kategori'],
                [SHOW, REQUIRED, I::TEXT, 'kode_kategori', 'Kode Kategori'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kategori', 'Nama Kategori'],
            ],
        );
    }
}
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
                [HIDE, 'ID Kategori',   'id_kategori',   I::INDEX, OPTIONAL],
                [SHOW, 'Kode Kategori', 'kode_kategori', I::TEXT,   REQUIRED],
                [SHOW, 'Nama Kategori', 'nama_kategori', I::TEXT,   REQUIRED],
            ],
        );
    }
}
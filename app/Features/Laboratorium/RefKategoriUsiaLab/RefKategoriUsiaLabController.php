<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriUsiaLab;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefKategoriUsiaLabController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKategoriUsiaLabModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Referensi Kategori Usia Lab', 'icon' => 'ref_kategori_usia_lab'],
            ],
            judul: 'Referensi Kategori Usia Lab',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Kategori Usia',   'id_kategori_usia',   'indeks', OPTIONAL],
                [SHOW, 'Nama Kategori Usia', 'nama_kategori_usia', 'teks',   REQUIRED],
            ],
        );
    }
}
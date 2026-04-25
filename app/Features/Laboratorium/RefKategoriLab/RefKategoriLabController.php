<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriLab;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Kategori',   'id_kategori',   'indeks', 0],
                [1, 'Kode Kategori', 'kode_kategori', 'teks',   1],
                [1, 'Nama Kategori', 'nama_kategori', 'teks',   1],
            ],
        );
    }
}
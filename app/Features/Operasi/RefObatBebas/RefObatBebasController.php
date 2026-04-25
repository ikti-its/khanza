<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefObatBebas;
use App\Core\Controller\ControllerTemplate;

final class RefObatBebasController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefObatBebasModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Obat Bebas', 'icon' => 'ref_obat_bebas'],
            ],
            judul: 'Referensi Obat Bebas',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Obat Bebas',  'id_obat_bebas',  'indeks', 0],
                [1, 'Nama Kategori',  'nama_kategori',  'teks',   1],
            ],
        );
    }
}
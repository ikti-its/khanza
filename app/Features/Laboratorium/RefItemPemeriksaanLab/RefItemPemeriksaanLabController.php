<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefItemPemeriksaanLab;
use App\Core\Controller\ControllerTemplate;

class RefItemPemeriksaanLabController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefItemPemeriksaanLabModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Referensi Item Pemeriksaan', 'icon' => 'ref_item_pemeriksaan_lab'],
            ],
            judul: 'Referensi Item Pemeriksaan Lab',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Item Lab',   'id_item_lab',  'indeks', 0],
                [1, 'Kategori',      'id_kategori',  'indeks', 1],
                [1, 'Kode Periksa', 'kode_periksa', 'teks',   1],
                [1, 'Nama Item',    'nama_item',    'teks',   1],
                [1, 'Tarif',        'tarif',        'uang',   1],
            ],
        );
    }
}
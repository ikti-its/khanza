<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefItemPemeriksaanLab;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefItemPemeriksaanLabController extends ControllerTemplate
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
                [HIDE, 'ID Item Lab',   'id_item_lab',  I::INDEX, OPTIONAL],
                [SHOW, 'Kategori',      'id_kategori',  I::INDEX, REQUIRED],
                [SHOW, 'Kode Periksa', 'kode_periksa', I::TEXT,   REQUIRED],
                [SHOW, 'Nama Item',    'nama_item',    I::TEXT,   REQUIRED],
                [SHOW, 'Tarif',        'tarif',        I::MONEY,   REQUIRED],
            ],
        );
    }
}
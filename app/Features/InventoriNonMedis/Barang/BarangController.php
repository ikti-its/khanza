<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Barang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class BarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new BarangModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Barang',              'icon' => 'barang'],
            ],
            judul: 'Barang',
            modul_path: '/inventori-non-medis/barang',
            nama_tabel: 'barang',
            kolom_id: 'id_barang',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [HIDE, 'ID Barang',    'id_barang',       I::INDEX, OPTIONAL],
                [SHOW, 'Kode Barang',  'kode_barang',     I::TEXT,   REQUIRED],
                [SHOW, 'Nama Barang',  'nama_barang',     I::NAME,   REQUIRED],
                [SHOW, 'Jenis Barang', 'id_jenis_barang', I::SELECT, REQUIRED],
                [SHOW, 'Kategori',     'id_kategori',     I::SELECT, REQUIRED],
                [SHOW, 'Supplier',     'id_supplier',     I::SELECT, OPTIONAL],
                [SHOW, 'Unit',         'id_unit',         I::SELECT, REQUIRED],
                [SHOW, 'Lokasi',       'id_lokasi',       I::SELECT, OPTIONAL],
                [SHOW, 'Stok',         'stok',            I::NUMBER, OPTIONAL],
                [SHOW, 'Stok Minimum', 'stok_minimum',    I::NUMBER, OPTIONAL],
                [SHOW, 'Harga Satuan', 'harga_satuan',    I::MONEY,   OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

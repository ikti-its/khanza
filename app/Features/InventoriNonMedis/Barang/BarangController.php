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
                [HIDE, OPTIONAL, I::INDEX, 'id_barang', 'ID Barang'],
                [SHOW, REQUIRED, I::TEXT, 'kode_barang', 'Kode Barang'],
                [SHOW, REQUIRED, I::NAME, 'nama_barang', 'Nama Barang'],
                [SHOW, REQUIRED, I::SELECT, 'id_jenis_barang', 'Jenis Barang'],
                [SHOW, REQUIRED, I::SELECT, 'id_kategori', 'Kategori'],
                [SHOW, OPTIONAL, I::SELECT, 'id_supplier', 'Supplier'],
                [SHOW, REQUIRED, I::SELECT, 'id_unit', 'Unit'],
                [SHOW, OPTIONAL, I::SELECT, 'id_lokasi', 'Lokasi'],
                [SHOW, OPTIONAL, I::NUMBER, 'stok', 'Stok'],
                [SHOW, OPTIONAL, I::NUMBER, 'stok_minimum', 'Stok Minimum'],
                [SHOW, OPTIONAL, I::MONEY, 'harga_satuan', 'Harga Satuan'],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Barang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class BarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new BarangModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Barang',              'barang'],
            ],
            'Barang',
            [
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
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
        );
    }
}

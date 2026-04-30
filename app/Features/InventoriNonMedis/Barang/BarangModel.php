<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Barang;
use App\Core\Model\ModelTemplate;

final class BarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'barang',
            'id_barang',
            [
                'id_barang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kode_barang' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_barang' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_jenis_barang' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_kategori' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_supplier' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_satuan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_lokasi_penyimpanan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'stok' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'stok_minimum' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'harga_satuan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}

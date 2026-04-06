<?php
declare(strict_types=1);

namespace App\Features\Inventori\TransaksiStok;

use App\Core\ModelTemplate;

class TransaksiStokModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori',
            'transaksi_stok',
            'id_transaksi',
            [
                'id_transaksi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'id_barang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'tipe_transaksi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'qty' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
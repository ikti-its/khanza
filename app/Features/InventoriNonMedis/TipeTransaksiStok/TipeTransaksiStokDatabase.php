<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TipeTransaksiStok;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class TipeTransaksiStokDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'tipe_transaksi_stok',
            [
                'id_tipe_transaksi_stok'   => T::ID(10),
                'nama_tipe_transaksi_stok' => T::NAME(50),
            ],
            'id_tipe_transaksi_stok',
            ['nama_tipe_transaksi_stok'],
            [],
            true,
            'tipe_transaksi_stok.csv',
        );
    }
}

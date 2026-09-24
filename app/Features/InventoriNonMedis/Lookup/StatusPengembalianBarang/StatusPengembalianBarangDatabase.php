<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Lookup\StatusPengembalianBarang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusPengembalianBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'status_pengembalian_barang',
            [
                'id_status_pengembalian_barang'   => T::ID(10),
                'nama_status_pengembalian_barang' => T::NAME(50),
            ],
            'id_status_pengembalian_barang',
            ['nama_status_pengembalian_barang'],
            [],
            true,
            'status_pengembalian_barang.csv',
        );
    }
}

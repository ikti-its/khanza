<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StatusPermintaanBarang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusPermintaanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'status_permintaan_barang',
            [
                'id_status_permintaan_barang'   => T::ID(10),
                'nama_status_permintaan_barang' => T::NAME(50),
            ],
            'id_status_permintaan_barang',
            ['nama_status_permintaan_barang'],
            [],
            true,
            'status_permintaan_barang.csv',
        );
    }
}

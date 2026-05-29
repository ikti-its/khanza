<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Lookup\TipePermintaanBarang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class TipePermintaanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'tipe_permintaan_barang',
            [
                'id_tipe_permintaan_barang'   => T::ID(10),
                'nama_tipe_permintaan_barang' => T::NAME(50),
            ],
            'id_tipe_permintaan_barang',
            ['nama_tipe_permintaan_barang'],
            [],
            true,
            'tipe_permintaan_barang.csv',
        );
    }
}

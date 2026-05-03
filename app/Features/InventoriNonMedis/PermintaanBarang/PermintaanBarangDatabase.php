<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PermintaanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'permintaan_barang',
            [
                'id_permintaan' => T::ID32(100_000),
                'unit_pemohon'  => T::TEXT(),
                'tipe'          => T::TEXT(),
                'tanggal'       => T::DATETIME(),
                'status'        => T::TEXT(),
                'catatan'       => T::TEXT()->nullable(),
            ],
            'id_permintaan',
            [],
            [],
            true,
            'permintaan_barang.csv'
        );
    }
}

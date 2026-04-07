<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePermintaanBarangTable extends Template
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'permintaan_barang',
            [
                'id_permintaan' => T::ID32(),
                'unit_pemohon'  => T::TEXT(),
                'tipe'          => T::TEXT(),
                'tanggal'       => T::DATETIME(),
                'status'        => T::TEXT(),
                'catatan'       => T::TEXT()->nullable(),
            ],
            ['id_permintaan'],
            [],
            [],
            [
                ['tanggal'],
                ['status'],
            ],
            true,
            __DIR__ . '/permintaan_barang.csv'
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\LokasiPenyimpanan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateLokasiPenyimpananTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'lokasi_penyimpanan',
            [
                'id_lokasi_penyimpanan'   => T::ID32(),
                'nama_lokasi_penyimpanan' => T::TEXT(),
            ],
            'id_lokasi_penyimpanan',
            [],
            [],
            true,
            __DIR__ . '/lokasi_penyimpanan.csv'
        );
    }
}

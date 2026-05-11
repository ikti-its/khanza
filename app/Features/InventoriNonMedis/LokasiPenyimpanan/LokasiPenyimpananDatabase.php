<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\LokasiPenyimpanan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class LokasiPenyimpananDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'lokasi_penyimpanan',
            [
                'id_lokasi_penyimpanan'   => T::ID(30),
                'nama_lokasi_penyimpanan' => T::NAME(100),
            ],
            'id_lokasi_penyimpanan',
            [],
            [],
            true,
            'lokasi_penyimpanan.csv'
        );
    }
}

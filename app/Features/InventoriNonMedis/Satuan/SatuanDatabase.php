<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Satuan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class SatuanDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'satuan',
            [
                'id_satuan'   => T::ID(30),
                'kode_satuan' => T::CODE(10),
                'nama_satuan' => T::NAME(50),
            ],
            'id_satuan',
            ['kode_satuan', 'nama_satuan'],
            [],
            true,
            'satuan.csv'
        );
    }
}

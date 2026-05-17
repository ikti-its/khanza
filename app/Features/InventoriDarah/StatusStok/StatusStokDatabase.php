<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StatusStok;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusStokDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'status_stok',
            [
                'id_status_stok'    => T::ID(10),
                'nama_status_stok'  => T::NAME(20),
            ],
            'id_status_stok',
            ['nama_status_stok'],
            [],
            true,
            'status_stok.csv'
        );
    }
}

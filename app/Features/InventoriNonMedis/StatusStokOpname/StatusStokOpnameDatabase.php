<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StatusStokOpname;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusStokOpnameDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'status_stok_opname',
            [
                'id_status_stok_opname'   => T::ID(10),
                'nama_status_stok_opname' => T::NAME(50),
            ],
            'id_status_stok_opname',
            ['nama_status_stok_opname'],
            [],
            true,
            'status_stok_opname.csv',
        );
    }
}

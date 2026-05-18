<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpname;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StokOpnameDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'stok_opname',
            [
                'id_opname'      => T::ID(10_000_000),
                'tanggal'        => T::DTIME(),
                'status'         => T::RECORD(12),
                'catatan'        => T::NOTE()->nullable(),
                'catatan_atasan' => T::NOTE()->nullable(),
            ],
            'id_opname',
            [],
            [],
            true,
            'stok_opname.csv'
        );
    }
}

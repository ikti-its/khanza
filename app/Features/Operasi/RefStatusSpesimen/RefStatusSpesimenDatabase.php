<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusSpesimen;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RefStatusSpesimenDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'operasi',
            'ref_status_spesimen',
            [
                'id_status_spesimen' => T::ID(5),
                'nama_status'        => T::TEXT(),
            ],
            'id_status_spesimen',
            [],
            [],
            true,
            'status_spesimen.csv',
        );
    }
}

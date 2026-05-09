<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StatusKantong;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusKantongDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'status_kantong',
            [
                'id_status_kantong'     => T::ID8(10),
                'nama_status_kantong'   => T::TEXT(),
            ],
            'id_status_kantong',
            ['nama_status_kantong'],
            [],
            true,
            'status_kantong.csv'
        );
    }
}

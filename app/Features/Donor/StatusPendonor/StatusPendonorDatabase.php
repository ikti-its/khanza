<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPendonor;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusPendonorDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'status_pendonor',
            [
                'id_status_pendonor'      => T::ID8(10),
                'nama_status_pendonor'    => T::TEXT(),
            ],
            'id_status_pendonor',
            ['nama_status_pendonor'],
            [],
            true,
            'status_pendonor.csv'
        );
    }
}

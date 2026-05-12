<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPendonor;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class StatusPendonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new StatusPendonorDatabase(),
            'REFS',
            'donor',
            'status_pendonor',
            'id_status_pendonor',
            [
                'id_status_pendonor'    => V::DEFAULT(),
                'nama_status_pendonor'  => V::DEFAULT()
            ],
            [],
        );
    }
}
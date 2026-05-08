<?php
declare(strict_types=1);

namespace App\Features\Role\Pendonor;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PendonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'role',
            'pendonor',
            'id_pendonor',
            [
                'id_pendonor' => V::TODO(),
                'id_orang' => V::TODO(),
                'nomor_pendonor' => V::TODO(),
                'id_rhesus' => V::TODO(),
                'id_status_pendonor' => V::TODO()
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPengambilan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class StatusPengambilanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new StatusPengambilanDatabase(),
            'REFS',
            'donor',
            'status_pengambilan',
            'id_status_pengambilan',
            [
                'id_status_pengambilan'   => V::DEFAULT(),
                'nama_status_pengambilan' => V::DEFAULT(),
            ],
            [],
        );
    }
}

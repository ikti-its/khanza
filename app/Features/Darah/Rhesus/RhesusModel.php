<?php
declare(strict_types=1);

namespace App\Features\Darah\Rhesus;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RhesusModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RhesusDatabase(),
            [
                'id_rhesus'   => V::DEFAULT(),
                'kode_rhesus' => V::DEFAULT(),
            ],
            [],
        );
    }
}

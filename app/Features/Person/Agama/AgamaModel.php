<?php
declare(strict_types=1);

namespace App\Features\Person\Agama;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class AgamaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new AgamaDatabase(),
            [
                'id_agama'   => V::DEFAULT(),
                'nama_agama' => V::DEFAULT(),
            ],
            [],
        );
    }
}

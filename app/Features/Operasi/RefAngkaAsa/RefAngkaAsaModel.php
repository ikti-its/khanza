<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAngkaAsa;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefAngkaAsaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefAngkaAsaDatabase(),
            [
                'id_asa'   => V::DEFAULT(),
                'nama_asa' => V::DEFAULT(),
            ],
            [],
        );
    }
}

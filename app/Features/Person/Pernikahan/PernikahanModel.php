<?php
declare(strict_types=1);

namespace App\Features\Person\Pernikahan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PernikahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PernikahanDatabase(),
            'REFS',
            'person',
            'pernikahan',
            'id_pernikahan',
            [
                'id_pernikahan'         => V::DEFAULT(),
                'status_pernikahan'     => V::DEFAULT()
            ],
            [],
        );
    }
}
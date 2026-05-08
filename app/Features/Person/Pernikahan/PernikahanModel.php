<?php
declare(strict_types=1);

namespace App\Features\Person\Pernikahan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PernikahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'person',
            'pernikahan',
            'id_pernikahan',
            [
                'id_pernikahan' => V::TODO(),
                'status_pernikahan' => V::TODO()
            ],
        );
    }
}
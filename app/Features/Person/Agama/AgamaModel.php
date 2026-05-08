<?php
declare(strict_types=1);

namespace App\Features\Person\Agama;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class AgamaModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'person',
            'agama',
            'id_agama',
            [
                'id_agama' => V::TODO(),
                'nama_agama' => V::TODO()
            ],
        );
    }
}
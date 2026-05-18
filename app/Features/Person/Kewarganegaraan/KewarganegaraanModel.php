<?php
declare(strict_types=1);

namespace App\Features\Person\Kewarganegaraan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KewarganegaraanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new KewarganegaraanDatabase(),
            'REFS',
            'person',
            'agama',
            'id_agama',
            [
                'id_kewarganegaraan' => V::DEFAULT(),
            ],
            [
                'id_negara' => ['nama_negara'],
            ],
        );
    }
}
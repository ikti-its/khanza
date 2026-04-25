<?php
declare(strict_types=1);

namespace App\Features\Person\Agama;
use App\Core\Model\ModelTemplate;

final class AgamaModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'person',
            'agama',
            'id_agama',
            [
                'id_agama' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_agama' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
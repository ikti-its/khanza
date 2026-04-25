<?php
declare(strict_types=1);

namespace App\Features\Person\Pernikahan;
use App\Core\Model\ModelTemplate;

final class PernikahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'person',
            'pernikahan',
            'id_pernikahan',
            [
                'id_pernikahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'status_pernikahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
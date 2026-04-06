<?php
declare(strict_types=1);

namespace App\Features\Darah\Rhesus;

use App\Core\ModelTemplate;

class RhesusModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'darah',
            'rhesus',
            'id_rhesus',
            [
                'id_rhesus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kode_rhesus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
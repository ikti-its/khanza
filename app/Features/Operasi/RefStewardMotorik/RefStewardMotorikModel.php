<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardMotorik;
use App\Core\Model\ModelTemplate;

final class RefStewardMotorikModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_steward_motorik',
            'id_motorik',
            [
                'id_motorik' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_skala' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nilai' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
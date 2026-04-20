<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardRespirasi;

use App\Core\ModelTemplate;

class RefStewardRespirasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_steward_respirasi',
            'id_respirasi',
            [
                'id_respirasi' => [
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
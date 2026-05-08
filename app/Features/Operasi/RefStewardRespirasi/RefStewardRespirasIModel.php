<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardRespirasi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefStewardRespirasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_steward_respirasi',
            'id_respirasi',
            [
                'id_respirasi' => V::TODO(),
                'nama_skala' => V::TODO(),
                'nilai' => V::TODO(),
            ],
        );
    }
}
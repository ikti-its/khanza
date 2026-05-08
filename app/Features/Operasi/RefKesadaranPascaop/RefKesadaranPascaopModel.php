<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaranPascaop;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefKesadaranPascaopModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_kesadaran_pascaop',
            'id_kesadaran',
            [
                'id_kesadaran' => V::TODO(),
                'nama_kesadaran' => V::TODO(),
            ],
        );
    }
}
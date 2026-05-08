<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteKesadaran;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefAldretteKesadaranModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_aldrette_kesadaran',
            'id_kesadaran',
            [
                'id_kesadaran' => V::TODO(),
                'nama_skala' => V::TODO(),
                'nilai' => V::TODO(),
            ],
        );
    }
}
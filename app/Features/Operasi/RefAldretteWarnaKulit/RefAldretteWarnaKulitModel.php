<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteWarnaKulit;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefAldretteWarnaKulitModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new RefAldretteWarnaKulitDatabase(),
            'REFS',
            'operasi',
            'ref_aldrette_warna_kulit',
            'id_warna',
            [
                'id_warna'   => V::DEFAULT(),
                'nama_skala' => V::DEFAULT(),
                'nilai'      => V::DEFAULT(),
            ],
            []
        );
    }
}
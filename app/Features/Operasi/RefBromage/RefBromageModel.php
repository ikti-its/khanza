<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefBromage;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefBromageModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_bromage',
            'id_bromage',
            [
                'id_bromage' => V::TODO(),
                'nama_skala' => V::TODO(),
                'tingkat_blok' => V::TODO(),
                'nilai' => V::TODO(),
                'gambar' => V::TODO(),
            ],
        );
    }
}
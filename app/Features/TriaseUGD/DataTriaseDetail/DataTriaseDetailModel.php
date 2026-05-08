<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class DataTriaseDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'data_triase_detail',
            'id_triase_detail',
            [
                'id_triase_detail' => V::TODO(),
                'id_triase' => V::TODO(),
                'id_skala' => V::TODO()
            ],
        );
    }
}
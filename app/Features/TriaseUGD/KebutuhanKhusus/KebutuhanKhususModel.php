<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\KebutuhanKhusus;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KebutuhanKhususModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new KebutuhanKhususDatabase(),
            'REFS',
            'triase_ugd',
            'kebutuhan_khusus',
            'id_kebutuhan',
            [
                'id_kebutuhan'      => V::DEFAULT(),
                'nama_kebutuhan'    => V::DEFAULT()
            ],
            [],
        );
    }
}
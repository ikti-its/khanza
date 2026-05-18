<?php
declare(strict_types=1);

namespace App\Features\Finansial\MetodePembayaran;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class MetodePembayaranModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new MetodePembayaranDatabase(),
            'BASE',
            'finansial',
            'metode',
            'id_metode',
            [
                'id_metode'   => V::DEFAULT(),
                'nama_metode' => V::DEFAULT(),
                'biaya'       => V::DEFAULT(),
            ],
            [],
        );
    }
}
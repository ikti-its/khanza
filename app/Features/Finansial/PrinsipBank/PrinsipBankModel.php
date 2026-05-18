<?php
declare(strict_types=1);

namespace App\Features\Finansial\PrinsipBank;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PrinsipBankModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PrinsipBankDatabase(),
            'BASE',
            'finansial',
            'prinsip',
            'id_prinsip',
            [
                'id_prinsip'   => V::DEFAULT(),
                'nama_prinsip' => V::DEFAULT(),
            ],
            [],
        );
    }
}
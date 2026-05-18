<?php
declare(strict_types=1);

namespace App\Features\Finansial\PemilikBank;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PemilikBankModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PemilikBankDatabase(),
            'BASE',
            'finansial',
            'pemilik',
            'id_pemilik',
            [
                'id_pemilik'   => V::DEFAULT(),
                'nama_pemilik' => V::DEFAULT(),
            ],
            [],
        );
    }
}
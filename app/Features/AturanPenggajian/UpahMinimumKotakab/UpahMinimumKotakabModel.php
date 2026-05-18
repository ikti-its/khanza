<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UpahMinimumKotakab;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class UpahMinimumKotakabModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new UpahMinimumKotakabDatabase(),
            'BASE',
            'penggajian',
            'umk',
            'no_umk',
            [
                'no_umk'       => V::DEFAULT(),
                'tahun'        => V::DEFAULT(),
                'kotakab'      => V::DEFAULT(),
                'upah_minimum' => V::DEFAULT(),
            ],       
            [
                'kotakab' => ['nama_kota'],
            ],
        );
    }
}
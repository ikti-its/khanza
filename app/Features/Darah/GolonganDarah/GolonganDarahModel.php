<?php
declare(strict_types=1);

namespace App\Features\Darah\GolonganDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class GolonganDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'darah',
            'golongan_darah',
            'id_golongan_darah',
            [
                'id_golongan_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'nama_golongan_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
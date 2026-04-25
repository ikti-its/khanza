<?php
declare(strict_types=1);

namespace App\Features\Darah\KomponenDarah;
use App\Core\Model\ModelTemplate;

final class KomponenDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'darah',
            'komponen_darah',
            'id_komponen',
            [
                'id_komponen' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'kode_komponen' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_komponen' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'masa_berlaku_hari' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
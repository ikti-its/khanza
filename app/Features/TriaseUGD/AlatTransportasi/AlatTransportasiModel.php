<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlatTransportasi;
use App\Core\Model\ModelTemplate;

final class AlatTransportasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'triase_ugd',
            'alat_transportasi',
            'id_transportasi',
            [
                'id_transportasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_transportasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Donor\LokasiPengambilanDarah;

use App\Core\ModelTemplate;

final class LokasiPengambilanDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'donor',
            'lokasi_pengambilan_darah',
            'id_lokasi_pengambilan',
            [
                'id_lokasi_pengambilan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_lokasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
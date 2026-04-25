<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefHubunganKeluarga;

use App\Core\ModelTemplate;

final class RefHubunganKeluargaModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_hubungan_keluarga',
            'id_hubungan_keluarga',
            [
                'id_hubungan_keluarga' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_hubungan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
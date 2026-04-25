<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteWarnaKulit;

use App\Core\ModelTemplate;

final class RefAldretteWarnaKulitModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_aldrette_warna_kulit',
            'id_warna',
            [
                'id_warna' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_skala' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nilai' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
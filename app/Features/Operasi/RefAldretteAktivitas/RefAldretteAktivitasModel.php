<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteAktivitas;

use App\Core\ModelTemplate;

final class RefAldretteAktivitasModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_aldrette_aktivitas',
            'id_aktivitas',
            [
                'id_aktivitas' => [
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
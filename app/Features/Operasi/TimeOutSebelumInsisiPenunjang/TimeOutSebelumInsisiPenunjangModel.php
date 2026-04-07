<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisiPenunjang;

use App\Core\ModelTemplate;

class TimeOutSebelumInsisiPenunjangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'timeout_sebelum_insisi_penunjang',
            'id_penunjang',
            [
                'id_penunjang' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_timeout' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_jenis_penunjang' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_status' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}
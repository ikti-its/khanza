<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPreOperasiPenunjang;

use App\Core\ModelTemplate;

class ChecklistPreOperasiPenunjangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'checklist_pre_operasi_penunjang',
            'id_penunjang',
            [
                'id_penunjang' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_checklist' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'jenis_penunjang' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_ketersediaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'keterangan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}
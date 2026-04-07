<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopPenunjang;

use App\Core\ModelTemplate;

class ChecklistPostopPenunjangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'checklist_postop_penunjang',
            'id_checklist_post',
            [
                'id_penunjang' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_checklist_post' => [
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
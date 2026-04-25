<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopDrain;
use App\Core\Model\ModelTemplate;

final class ChecklistPostopDrainModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'checklist_postop_drain',
            'id_drain',
            [
                'id_drain' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_checklist_post' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_ketersediaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'jumlah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'letak' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'warna' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}
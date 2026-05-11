<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopDrain;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

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
                'id_drain' => V::TODO(),
                'id_checklist_post' => V::TODO(),
                'id_ketersediaan' => V::TODO(),
                'jumlah' => V::TODO(),
                'letak' => V::TODO(),
                'warna' => V::TODO(),
            ],
        );
    }
}
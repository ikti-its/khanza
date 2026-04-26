<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteRespirasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefAldretteRespirasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefAldretteRespirasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Aldrette Respirasi', 'icon' => 'ref_aldrette_respirasi'],
            ],
            title: 'Referensi Aldrette Respirasi',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_respirasi', 'ID Respirasi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteKesadaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefAldretteKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefAldretteKesadaranModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Aldrette Kesadaran', 'ref_aldrette_kesadaran'],
            ],
            'Referensi Aldrette Kesadaran',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_kesadaran', 'ID Kesadaran'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteWarnaKulit;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefAldretteWarnaKulitController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefAldretteWarnaKulitModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Aldrette Warna Kulit', 'ref_aldrette_warna_kulit'],
            ],
            title: 'Referensi Aldrette Warna Kulit',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_warna', 'ID Warna'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
            ],
        );
    }
}
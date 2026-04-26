<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefInduksi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefInduksiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefInduksiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Induksi', 'icon' => 'ref_induksi'],
            ],
            title: 'Referensi Induksi',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_induksi', 'ID Induksi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_induksi', 'Nama Induksi'],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisSedasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefJenisSedasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefJenisSedasiModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Jenis Sedasi', 'ref_jenis_sedasi'],
            ],
            title: 'Referensi Jenis Sedasi',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_sedasi', 'ID Jenis Sedasi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_sedasi', 'Nama Sedasi'],
            ],
        );
    }
}
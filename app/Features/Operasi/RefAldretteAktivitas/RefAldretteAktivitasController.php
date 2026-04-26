<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteAktivitas;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefAldretteAktivitasController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefAldretteAktivitasModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Aldrette Aktivitas', 'ref_aldrette_aktivitas'],
            ],
            title: 'Referensi Aldrette Aktivitas',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_aktivitas', 'ID Aktivitas'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
            ],
        );
    }
}
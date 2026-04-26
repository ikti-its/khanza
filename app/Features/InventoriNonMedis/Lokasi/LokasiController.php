<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Lokasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class LokasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new LokasiModel(),
            breadcrumbs: [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Lokasi',              'lokasi'],
            ],
            title: 'Lokasi',
            action: [
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_lokasi', 'ID'],
                [SHOW, REQUIRED, I::NAME, 'nama_lokasi', 'Nama Lokasi'],
            ],
        );
    }
}

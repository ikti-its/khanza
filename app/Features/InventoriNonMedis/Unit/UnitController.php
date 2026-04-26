<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Unit;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class UnitController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new UnitModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Unit',                'icon' => 'unit'],
            ],
            judul: 'Unit',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_unit', 'ID'],
                [SHOW, REQUIRED, I::NAME, 'nama_unit', 'Nama Unit'],
            ],
        );
    }
}

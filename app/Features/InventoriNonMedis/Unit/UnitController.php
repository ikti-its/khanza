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
            modul_path: '/inventori-non-medis/unit',
            nama_tabel: 'unit',
            kolom_id: 'id_unit',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [HIDE, 'ID',        'id_unit',   'indeks', OPTIONAL],
                [SHOW, 'Nama Unit', 'nama_unit', 'nama',   REQUIRED],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

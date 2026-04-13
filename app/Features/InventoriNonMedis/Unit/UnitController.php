<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Unit;
use App\Core\Controller\ControllerTemplate;

class UnitController extends ControllerTemplate
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
                [0, 'ID',        'id_unit',   'indeks', 0],
                [1, 'Nama Unit', 'nama_unit', 'nama',   1],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

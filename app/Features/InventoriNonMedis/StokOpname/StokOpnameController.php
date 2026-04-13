<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpname;
use App\Core\Controller\ControllerTemplate;

class StokOpnameController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new StokOpnameModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Stok Opname',         'icon' => 'stok_opname'],
            ],
            judul: 'Stok Opname',
            modul_path: '/inventori-non-medis/stok-opname',
            nama_tabel: 'stok_opname',
            kolom_id: 'id_opname',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [0, 'ID Opname',      'id_opname',      'indeks',  0],
                [1, 'Tanggal',        'tanggal',        'tanggal', 1],
                [1, 'Status',         'status',         'status',  0],
                [1, 'Catatan',        'catatan',        'teks',    0],
                [1, 'Catatan Atasan', 'catatan_atasan', 'teks',    0],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

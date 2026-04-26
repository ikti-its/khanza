<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpname;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class StokOpnameController extends ControllerTemplate
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
                [HIDE, OPTIONAL, I::INDEX, 'id_opname', 'ID Opname'],
                [SHOW, REQUIRED, I::DATE,  'tanggal', 'Tanggal'],
                [SHOW, OPTIONAL, I::SELECT,'status',  'Status'],
                [SHOW, OPTIONAL, I::TEXT, 'catatan', 'Catatan'],
                [SHOW, OPTIONAL, I::TEXT, 'catatan_atasan', 'Catatan Atasan'],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

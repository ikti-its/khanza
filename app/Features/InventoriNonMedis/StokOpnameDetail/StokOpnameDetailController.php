<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpnameDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class StokOpnameDetailController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new StokOpnameDetailModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Stok Opname',         'icon' => 'stok_opname'],
                ['title' => 'Detail',              'icon' => 'detail'],
            ],
            judul: 'Detail Stok Opname',
            modul_path: '/inventori-non-medis/stok-opname',
            nama_tabel: 'stok_opname_detail',
            kolom_id: 'id_detail',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [HIDE, 'ID Detail',  'id_detail',   I::INDEX, OPTIONAL],
                [HIDE, 'ID Opname',  'id_opname',   I::INDEX, OPTIONAL],
                [SHOW, 'Barang',     'id_barang',   I::SELECT, REQUIRED],
                [SHOW, 'Stok Sistem','stok_sistem', I::NUMBER, REQUIRED],
                [SHOW, 'Stok Fisik', 'stok_fisik',  I::NUMBER, REQUIRED],
                [SHOW, 'Selisih',    'selisih',     I::NUMBER, OPTIONAL],
                [SHOW, 'Keterangan', 'keterangan',  I::TEXT,   OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

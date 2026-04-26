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
                [HIDE, OPTIONAL, I::INDEX, 'id_detail', 'ID Detail'],
                [HIDE, OPTIONAL, I::INDEX, 'id_opname', 'ID Opname'],
                [SHOW, REQUIRED, I::SELECT, 'id_barang', 'Barang'],
                [SHOW, REQUIRED, I::NUMBER, 'stok_sistem', 'Stok Sistem'],
                [SHOW, REQUIRED, I::NUMBER, 'stok_fisik', 'Stok Fisik'],
                [SHOW, OPTIONAL, I::NUMBER, 'selisih', 'Selisih'],
                [SHOW, OPTIONAL, I::TEXT, 'keterangan', 'Keterangan'],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

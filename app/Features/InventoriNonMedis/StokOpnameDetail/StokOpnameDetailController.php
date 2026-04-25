<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpnameDetail;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Detail',  'id_detail',   'indeks', 0],
                [0, 'ID Opname',  'id_opname',   'indeks', 0],
                [1, 'Barang',     'id_barang',   'status', 1],
                [1, 'Stok Sistem','stok_sistem', 'jumlah', 1],
                [1, 'Stok Fisik', 'stok_fisik',  'jumlah', 1],
                [1, 'Selisih',    'selisih',     'jumlah', 0],
                [1, 'Keterangan', 'keterangan',  'teks',   0],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

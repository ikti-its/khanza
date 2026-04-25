<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarangDetail;
use App\Core\Controller\ControllerTemplate;

final class PermintaanBarangDetailController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PermintaanBarangDetailModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Permintaan Barang',   'icon' => 'permintaan_barang'],
                ['title' => 'Detail',              'icon' => 'detail'],
            ],
            judul: 'Detail Permintaan Barang',
            modul_path: '/inventori-non-medis/permintaan-barang',
            nama_tabel: 'permintaan_barang_detail',
            kolom_id: 'id_detail',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [0, 'ID Detail',        'id_detail',        'indeks', 0],
                [0, 'ID Permintaan',    'id_permintaan',    'indeks', 0],
                [1, 'Barang',           'id_barang',        'status', 0],
                [1, 'Nama Barang Baru', 'nama_barang_baru', 'teks',   0],
                [1, 'Qty',              'qty',              'jumlah', 1],
                [1, 'Qty Disetujui',    'qty_disetujui',    'jumlah', 0],
                [1, 'Catatan',          'catatan',          'teks',   0],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

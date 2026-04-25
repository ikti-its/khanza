<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarangDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Detail',        'id_detail',        'indeks', OPTIONAL],
                [HIDE, 'ID Permintaan',    'id_permintaan',    'indeks', OPTIONAL],
                [SHOW, 'Barang',           'id_barang',        'status', OPTIONAL],
                [SHOW, 'Nama Barang Baru', 'nama_barang_baru', 'teks',   OPTIONAL],
                [SHOW, 'Qty',              'qty',              'jumlah', REQUIRED],
                [SHOW, 'Qty Disetujui',    'qty_disetujui',    'jumlah', OPTIONAL],
                [SHOW, 'Catatan',          'catatan',          'teks',   OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

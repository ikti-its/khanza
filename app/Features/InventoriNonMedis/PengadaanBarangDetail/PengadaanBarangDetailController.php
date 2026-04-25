<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarangDetail;
use App\Core\Controller\ControllerTemplate;

final class PengadaanBarangDetailController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengadaanBarangDetailModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Pengadaan Barang',    'icon' => 'pengadaan_barang'],
                ['title' => 'Detail',              'icon' => 'detail'],
            ],
            judul: 'Detail Pengadaan Barang',
            modul_path: '/inventori-non-medis/pengadaan-barang',
            nama_tabel: 'pengadaan_barang_detail',
            kolom_id: 'id_detail',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [HIDE, 'ID Detail',    'id_detail',    'indeks', OPTIONAL],
                [HIDE, 'ID Pengadaan', 'id_pengadaan', 'indeks', OPTIONAL],
                [SHOW, 'Barang',       'id_barang',    'status', REQUIRED],
                [SHOW, 'Qty',          'qty',          'jumlah', REQUIRED],
                [SHOW, 'Harga Satuan', 'harga_satuan', 'uang',   OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

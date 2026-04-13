<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarangDetail;
use App\Core\Controller\ControllerTemplate;

class PengajuanBarangDetailController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengajuanBarangDetailModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Pengajuan Barang',    'icon' => 'pengajuan_barang'],
                ['title' => 'Detail',              'icon' => 'detail'],
            ],
            judul: 'Detail Pengajuan Barang',
            modul_path: '/inventori-non-medis/pengajuan-barang',
            nama_tabel: 'pengajuan_barang_detail',
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
                [0, 'ID Pengajuan',     'id_pengajuan',     'indeks', 0],
                [1, 'Barang',           'id_barang',        'status', 0],
                [1, 'Nama Barang Baru', 'nama_barang_baru', 'teks',   0],
                [1, 'Qty',              'qty',              'jumlah', 1],
                [1, 'Harga Estimasi',   'harga_estimasi',   'uang',   0],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

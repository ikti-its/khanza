<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarangDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PengajuanBarangDetailController extends ControllerTemplate
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
                [HIDE, 'ID Detail',        'id_detail',        I::INDEX, OPTIONAL],
                [HIDE, 'ID Pengajuan',     'id_pengajuan',     I::INDEX, OPTIONAL],
                [SHOW, 'Barang',           'id_barang',        I::SELECT, OPTIONAL],
                [SHOW, 'Nama Barang Baru', 'nama_barang_baru', I::TEXT,   OPTIONAL],
                [SHOW, 'Qty',              'qty',              I::NUMBER, REQUIRED],
                [SHOW, 'Harga Estimasi',   'harga_estimasi',   I::MONEY,   OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

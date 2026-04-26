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
                [HIDE, OPTIONAL, I::INDEX, 'id_detail', 'ID Detail'],
                [HIDE, OPTIONAL, I::INDEX, 'id_pengajuan', 'ID Pengajuan'],
                [SHOW, OPTIONAL, I::SELECT, 'id_barang', 'Barang'],
                [SHOW, OPTIONAL, I::TEXT, 'nama_barang_baru', 'Nama Barang Baru'],
                [SHOW, REQUIRED, I::NUMBER, 'qty', 'Qty'],
                [SHOW, OPTIONAL, I::MONEY, 'harga_estimasi', 'Harga Estimasi'],
            ],
        );
    }
}

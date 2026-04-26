<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarangDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
            title: 'Detail Pengadaan Barang',
            action: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_detail', 'ID Detail'],
                [HIDE, OPTIONAL, I::INDEX, 'id_pengadaan', 'ID Pengadaan'],
                [SHOW, REQUIRED, I::SELECT, 'id_barang', 'Barang'],
                [SHOW, REQUIRED, I::NUMBER, 'qty', 'Qty'],
                [SHOW, OPTIONAL, I::MONEY, 'harga_satuan', 'Harga Satuan'],
            ],
        );
    }
}

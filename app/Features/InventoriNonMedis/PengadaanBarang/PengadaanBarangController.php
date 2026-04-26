<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PengadaanBarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengadaanBarangModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Pengadaan Barang',    'icon' => 'pengadaan_barang'],
            ],
            title: 'Pengadaan Barang',
            action: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pengadaan', 'ID Pengadaan'],
                [HIDE, OPTIONAL, I::INDEX, 'id_pengajuan', 'ID Pengajuan'],
                [SHOW, REQUIRED, I::SELECT, 'id_supplier', 'Supplier'],
                [SHOW, REQUIRED, I::DATE,  'tanggal', 'Tanggal'],
                [SHOW, OPTIONAL, I::SELECT,'status', 'Status'],
                [SHOW, OPTIONAL, I::TEXT, 'catatan', 'Catatan'],
            ],
        );
    }
}

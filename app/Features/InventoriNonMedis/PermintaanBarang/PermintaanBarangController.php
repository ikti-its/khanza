<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PermintaanBarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PermintaanBarangModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Permintaan Barang',   'icon' => 'permintaan_barang'],
            ],
            title: 'Permintaan Barang',
            action: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan', 'ID'],
                [SHOW, REQUIRED, I::TEXT, 'unit_pemohon', 'Unit Pemohon'],
                [SHOW, REQUIRED, I::SELECT, 'tipe', 'Tipe'],
                [SHOW, REQUIRED, I::DATE, 'tanggal', 'Tanggal'],
                [SHOW, OPTIONAL, I::SELECT,'status', 'Status'],
                [SHOW, OPTIONAL, I::TEXT, 'catatan', 'Catatan'],
            ],
        );
    }
}

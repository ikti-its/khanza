<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TransaksiStok;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class TransaksiStokController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new TransaksiStokModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Transaksi Stok',      'icon' => 'transaksi_stok'],
            ],
            title: 'Transaksi Stok',
            action: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_transaksi', 'ID Transaksi'],
                [SHOW, REQUIRED, I::SELECT, 'id_barang', 'Barang'],
                [SHOW, REQUIRED, I::SELECT, 'tipe_transaksi', 'Tipe Transaksi'],
                [SHOW, REQUIRED, I::NUMBER, 'qty', 'Qty'],
                [SHOW, REQUIRED, I::DATE, 'tanggal', 'Tanggal'],
                [SHOW, OPTIONAL, I::TEXT, 'catatan', 'Catatan'],
            ],
        );
    }
}

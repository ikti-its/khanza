<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TransaksiStok;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
            judul: 'Transaksi Stok',
            modul_path: '/inventori-non-medis/transaksi-stok',
            nama_tabel: 'transaksi_stok',
            kolom_id: 'id_transaksi',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [HIDE, 'ID Transaksi',   'id_transaksi',   I::INDEX,  OPTIONAL],
                [SHOW, 'Barang',         'id_barang',      I::SELECT,  REQUIRED],
                [SHOW, 'Tipe Transaksi', 'tipe_transaksi', I::SELECT,  REQUIRED],
                [SHOW, 'Qty',            'qty',            I::NUMBER,  REQUIRED],
                [SHOW, I::DATE,        I::DATE,        I::DATE, REQUIRED],
                [SHOW, 'Catatan',        'catatan',        I::TEXT,    OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TransaksiStok;
use App\Core\Controller\ControllerTemplate;

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
                [HIDE, 'ID Transaksi',   'id_transaksi',   'indeks',  OPTIONAL],
                [SHOW, 'Barang',         'id_barang',      'status',  REQUIRED],
                [SHOW, 'Tipe Transaksi', 'tipe_transaksi', 'status',  REQUIRED],
                [SHOW, 'Qty',            'qty',            'jumlah',  REQUIRED],
                [SHOW, 'Tanggal',        'tanggal',        'tanggal', REQUIRED],
                [SHOW, 'Catatan',        'catatan',        'teks',    OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

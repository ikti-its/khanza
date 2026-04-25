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
                [0, 'ID Transaksi',   'id_transaksi',   'indeks',  0],
                [1, 'Barang',         'id_barang',      'status',  1],
                [1, 'Tipe Transaksi', 'tipe_transaksi', 'status',  1],
                [1, 'Qty',            'qty',            'jumlah',  1],
                [1, 'Tanggal',        'tanggal',        'tanggal', 1],
                [1, 'Catatan',        'catatan',        'teks',    0],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

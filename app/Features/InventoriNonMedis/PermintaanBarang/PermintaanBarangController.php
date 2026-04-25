<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;
use App\Core\Controller\ControllerTemplate;

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
            judul: 'Permintaan Barang',
            modul_path: '/inventori-non-medis/permintaan-barang',
            nama_tabel: 'permintaan_barang',
            kolom_id: 'id_permintaan',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [0, 'ID',           'id_permintaan', 'indeks',  0],
                [1, 'Unit Pemohon', 'unit_pemohon',  'teks',    1],
                [1, 'Tipe',         'tipe',          'status',  1],
                [1, 'Tanggal',      'tanggal',       'tanggal', 1],
                [1, 'Status',       'status',        'status',  0],
                [1, 'Catatan',      'catatan',       'teks',    0],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

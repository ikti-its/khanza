<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarang;
use App\Core\Controller\ControllerTemplate;

class PengajuanBarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengajuanBarangModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Pengajuan Barang',    'icon' => 'pengajuan_barang'],
            ],
            judul: 'Pengajuan Barang',
            modul_path: '/inventori-non-medis/pengajuan-barang',
            nama_tabel: 'pengajuan_barang',
            kolom_id: 'id_pengajuan',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [0, 'ID Pengajuan',   'id_pengajuan',   'indeks',  0],
                [0, 'ID Permintaan',  'id_permintaan',  'indeks',  0],
                [1, 'Tanggal',        'tanggal',        'tanggal', 1],
                [1, 'Status',         'status',         'status',  0],
                [1, 'Catatan',        'catatan',        'teks',    0],
                [1, 'Catatan Atasan', 'catatan_atasan', 'teks',    0],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => 1],
        );
    }
}

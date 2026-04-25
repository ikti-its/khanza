<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarang;
use App\Core\Controller\ControllerTemplate;

final class PengajuanBarangController extends ControllerTemplate
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
                [HIDE, 'ID Pengajuan',   'id_pengajuan',   'indeks',  OPTIONAL],
                [HIDE, 'ID Permintaan',  'id_permintaan',  'indeks',  OPTIONAL],
                [SHOW, 'Tanggal',        'tanggal',        'tanggal', REQUIRED],
                [SHOW, 'Status',         'status',         'status',  OPTIONAL],
                [SHOW, 'Catatan',        'catatan',        'teks',    OPTIONAL],
                [SHOW, 'Catatan Atasan', 'catatan_atasan', 'teks',    OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

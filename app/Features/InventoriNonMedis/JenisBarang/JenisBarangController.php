<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\JenisBarang;
use App\Core\Controller\ControllerTemplate;

final class JenisBarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new JenisBarangModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Jenis Barang',        'icon' => 'jenis_barang'],
            ],
            judul: 'Jenis Barang',
            modul_path: '/inventori-non-medis/jenis-barang',
            nama_tabel: 'jenis_barang',
            kolom_id: 'id_jenis_barang',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [HIDE, 'ID',               'id_jenis_barang',   'indeks', OPTIONAL],
                [SHOW, 'Nama Jenis Barang','nama_jenis_barang',  'nama',   REQUIRED],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

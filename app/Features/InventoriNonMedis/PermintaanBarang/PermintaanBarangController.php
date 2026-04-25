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
                [HIDE, 'ID',           'id_permintaan', I::INDEX,  OPTIONAL],
                [SHOW, 'Unit Pemohon', 'unit_pemohon',  I::TEXT,    REQUIRED],
                [SHOW, 'Tipe',         'tipe',          I::SELECT,  REQUIRED],
                [SHOW, I::DATE,      I::DATE,       I::DATE, REQUIRED],
                [SHOW, I::SELECT,       I::SELECT,        I::SELECT,  OPTIONAL],
                [SHOW, 'Catatan',      'catatan',       I::TEXT,    OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Lokasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class LokasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new LokasiModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Lokasi',              'icon' => 'lokasi'],
            ],
            judul: 'Lokasi',
            modul_path: '/inventori-non-medis/lokasi',
            nama_tabel: 'lokasi',
            kolom_id: 'id_lokasi',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [HIDE, 'ID',          'id_lokasi',   'indeks', OPTIONAL],
                [SHOW, 'Nama Lokasi', 'nama_lokasi', 'nama',   REQUIRED],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

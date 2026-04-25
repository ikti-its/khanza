<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Supplier;
use App\Core\Controller\ControllerTemplate;

final class SupplierController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new SupplierModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Supplier',            'icon' => 'supplier'],
            ],
            judul: 'Supplier',
            modul_path: '/inventori-non-medis/supplier',
            nama_tabel: 'supplier',
            kolom_id: 'id_supplier',
            aksi: [
                'tambah' => true,
                'audit'  => false,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                // [visible, 'Display', 'kolom', 'jenis', required]
                [HIDE, 'ID Supplier',   'id_supplier',   'indeks', OPTIONAL],
                [SHOW, 'Nama Supplier', 'nama_supplier', 'nama',   REQUIRED],
                [SHOW, 'No. Telepon',   'no_telp',       'teks',   OPTIONAL],
                [HIDE, 'ID Alamat',     'id_alamat',     'indeks', OPTIONAL],
            ],
            meta_data: ['page' => 1, 'size' => 10, 'total' => REQUIRED],
        );
    }
}

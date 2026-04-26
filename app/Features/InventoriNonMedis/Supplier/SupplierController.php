<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Supplier;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, OPTIONAL, I::INDEX, 'id_supplier', 'ID Supplier'],
                [SHOW, REQUIRED, I::NAME, 'nama_supplier', 'Nama Supplier'],
                [SHOW, OPTIONAL, I::TEXT, 'no_telp', 'No. Telepon'],
                [HIDE, OPTIONAL, I::INDEX, 'id_alamat', 'ID Alamat'],
            ],
        );
    }
}

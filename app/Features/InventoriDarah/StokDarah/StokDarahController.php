<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StokDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class StokDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StokDarahModel(),
            breadcrumbs: [
                ['title' => 'Inventaris Darah', 'icon' => 'inventaris_darah'],
                ['title' => 'Stok Darah', 'icon' => 'stok_darah'],
            ],
            judul: 'Stok Darah',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, OPTIONAL, I::INDEX, 'id_stok_darah', 'ID Stok Darah'],
                [HIDE, OPTIONAL, I::INDEX, 'id_pemisahan', 'ID Pemisahan'],
                [SHOW, REQUIRED, I::TEXT, 'no_kantong', 'Nomor Kantong'],
                [HIDE, REQUIRED, I::INDEX, 'id_komponen', 'ID Komponen'],
                [SHOW, REQUIRED, I::INDEX, 'id_golongan_darah', 'ID Golongan Darah'],
                [SHOW, REQUIRED, I::INDEX, 'id_rhesus', 'ID Rhesus'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_pengambilan', 'Tanggal Pengambilan'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_kadaluarsa', 'Tanggal Kadaluarsa'],
                [SHOW, REQUIRED, I::INDEX, 'id_sumber_darah', 'ID Sumber Darah'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_stok', 'ID Status Stok'],
            ],
        );
    }   
}
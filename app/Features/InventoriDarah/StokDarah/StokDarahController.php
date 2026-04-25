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
                [HIDE, 'ID Stok Darah', 'id_stok_darah', 'indeks', OPTIONAL],
                [HIDE, 'ID Pemisahan', 'id_pemisahan', 'indeks', OPTIONAL],
                [SHOW, 'Nomor Kantong', 'no_kantong', 'teks', REQUIRED],
                [HIDE, 'ID Komponen', 'id_komponen', 'indeks', REQUIRED],
                [SHOW, 'ID Golongan Darah', 'id_golongan_darah', 'indeks', REQUIRED],
                [SHOW, 'ID Rhesus', 'id_rhesus', 'indeks', REQUIRED],
                [SHOW, 'Tanggal Pengambilan', 'tanggal_pengambilan', 'tanggal', REQUIRED],
                [SHOW, 'Tanggal Kadaluarsa', 'tanggal_kadaluarsa', 'tanggal', REQUIRED],
                [SHOW, 'ID Sumber Darah', 'id_sumber_darah', 'indeks', REQUIRED],
                [SHOW, 'ID Status Stok', 'id_status_stok', 'status', REQUIRED],
            ],
        );
    }   
}
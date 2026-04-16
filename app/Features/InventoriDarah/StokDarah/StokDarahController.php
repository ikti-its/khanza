<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StokDarah;
use App\Core\Controller\ControllerTemplate;

class StokDarahController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Stok Darah', 'id_stok_darah', 'indeks', 0],
                [0, 'ID Pemisahan', 'id_pemisahan', 'indeks', 0],
                [1, 'Nomor Kantong', 'no_kantong', 'teks', 1],
                [0, 'ID Komponen', 'id_komponen', 'indeks', 1],
                [1, 'ID Golongan Darah', 'id_golongan_darah', 'indeks', 1],
                [1, 'ID Rhesus', 'id_rhesus', 'indeks', 1],
                [1, 'Tanggal Pengambilan', 'tanggal_pengambilan', 'tanggal', 1],
                [1, 'Tanggal Kadaluarsa', 'tanggal_kadaluarsa', 'tanggal', 1],
                [1, 'ID Sumber Darah', 'id_sumber_darah', 'indeks', 1],
                [1, 'ID Status Stok', 'id_status_stok', 'status', 1],
            ],
        );
    }   
}
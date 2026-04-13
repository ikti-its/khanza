<?php
declare(strict_types=1);

namespace App\Features\Darah\KomponenDarah;
use App\Core\Controller\ControllerTemplate;

class KomponenDarahController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new KomponenDarahModel(),
            breadcrumbs: [
                ['title' => 'Darah', 'icon' => 'darah'],
                ['title' => 'Komponen Darah', 'icon' => 'komponen_darah'],
            ],
            judul: 'Komponen Darah',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Komponen', 'id_komponen', 'indeks', 0],
                [1, 'Kode', 'kode_komponen', 'teks', 1],
                [1, 'Nama Komponen', 'nama_komponen', 'teks', 1],
                [1, 'Masa Berlaku (Hari)', 'masa_berlaku_hari', 'jumlah', 1],
            ],
        );
    }   
}
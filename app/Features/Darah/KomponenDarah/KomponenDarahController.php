<?php
declare(strict_types=1);

namespace App\Features\Darah\KomponenDarah;
use App\Core\Controller\ControllerTemplate;

final class KomponenDarahController extends ControllerTemplate
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
                [HIDE, 'ID Komponen', 'id_komponen', 'indeks', OPTIONAL],
                [SHOW, 'Kode', 'kode_komponen', 'teks', REQUIRED],
                [SHOW, 'Nama Komponen', 'nama_komponen', 'teks', REQUIRED],
                [SHOW, 'Masa Berlaku (Hari)', 'masa_berlaku_hari', 'jumlah', REQUIRED],
            ],
        );
    }   
}
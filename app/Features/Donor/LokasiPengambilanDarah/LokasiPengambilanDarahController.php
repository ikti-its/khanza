<?php
declare(strict_types=1);

namespace App\Features\Donor\LokasiPengambilanDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class LokasiPengambilanDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new LokasiPengambilanDarahModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Lokasi Pengambilan Darah', 'icon' => 'lokasi_pengambilan_darah'],
            ],
            judul: 'Lokasi Pengambilan Darah',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Lokasi Pengambilan', 'id_lokasi_pengambilan', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Lokasi', 'nama_lokasi', I::TEXT, REQUIRED],
            ],
        );
    }   
}
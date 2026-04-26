<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PermintaanDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PermintaanDarahModel(),
            breadcrumbs: [
                ['title' => 'Pelayanan Darah', 'icon' => 'pelayanan_darah'],
                ['title' => 'Permintaan Darah', 'icon' => 'permintaan_darah'],
            ],
            judul: 'Permintaan Darah',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan', 'ID Permintaan'],
                [SHOW, REQUIRED, I::TEXT, 'no_rawat', 'No. Rawat'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_pengirim', 'Kode Dokter Pengirim'],
                [SHOW, REQUIRED, I::DTIME, 'tanggal_permintaan', 'Tanggal Permintaan'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_permintaan', 'ID Status Permintaan'],
            ],
        );
    }   
}
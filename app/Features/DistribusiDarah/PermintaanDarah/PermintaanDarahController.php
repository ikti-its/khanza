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
                [HIDE, 'ID Permintaan', 'id_permintaan', I::INDEX, OPTIONAL],
                [SHOW, 'No. Rawat', 'no_rawat', I::TEXT, REQUIRED],
                [SHOW, 'Kode Dokter Pengirim', 'kode_dokter_pengirim', I::TEXT, REQUIRED],
                [SHOW, 'Tanggal Permintaan', 'tanggal_permintaan', 'tanggal_jam', REQUIRED],
                [SHOW, 'ID Status Permintaan', 'id_status_permintaan', I::SELECT, REQUIRED],
            ],
        );
    }   
}
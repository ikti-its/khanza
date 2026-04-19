<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarah;
use App\Core\Controller\ControllerTemplate;

class PermintaanDarahController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Permintaan', 'id_permintaan', 'indeks', 0],
                [1, 'No. Rawat', 'no_rawat', 'teks', 1],
                [1, 'Kode Dokter Pengirim', 'kode_dokter_pengirim', 'teks', 1],
                [1, 'Tanggal Permintaan', 'tanggal_permintaan', 'tanggal_jam', 1],
                [1, 'ID Status Permintaan', 'id_status_permintaan', 'status', 1],
            ],
        );
    }   
}
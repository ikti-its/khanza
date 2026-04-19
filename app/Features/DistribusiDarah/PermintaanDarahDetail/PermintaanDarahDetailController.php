<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarahDetail;
use App\Core\Controller\ControllerTemplate;

class PermintaanDarahDetailController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new PermintaanDarahDetailModel(),
            breadcrumbs: [
                ['title' => 'Pelayanan Darah', 'icon' => 'pelayanan_darah'],
                ['title' => 'Permintaan Darah Detail', 'icon' => 'permintaan_darah_detail'],
            ],
            judul: 'Permintaan Darah Detail',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Permintaan Detail', 'id_permintaan_detail', 'indeks', 0],
                [1, 'ID Permintaan', 'id_permintaan', 'indeks', 1],
                [1, 'ID Komponen', 'id_komponen', 'indeks', 1],
                [1, 'ID Golongan Darah', 'id_golongan_darah', 'indeks', 1],
                [1, 'ID Rhesus', 'id_rhesus', 'indeks', 1],
                [1, 'Jumlah Unit', 'jumlah', 'jumlah', 1],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarahDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PermintaanDarahDetailController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan_detail', 'ID Permintaan Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_permintaan', 'ID Permintaan'],
                [SHOW, REQUIRED, I::INDEX, 'id_komponen', 'ID Komponen'],
                [SHOW, REQUIRED, I::INDEX, 'id_golongan_darah', 'ID Golongan Darah'],
                [SHOW, REQUIRED, I::INDEX, 'id_rhesus', 'ID Rhesus'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah Unit'],
            ],
        );
    }   
}
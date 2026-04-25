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
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Permintaan Detail', 'id_permintaan_detail', I::INDEX, OPTIONAL],
                [SHOW, 'ID Permintaan', 'id_permintaan', I::INDEX, REQUIRED],
                [SHOW, 'ID Komponen', 'id_komponen', I::INDEX, REQUIRED],
                [SHOW, 'ID Golongan Darah', 'id_golongan_darah', I::INDEX, REQUIRED],
                [SHOW, 'ID Rhesus', 'id_rhesus', I::INDEX, REQUIRED],
                [SHOW, 'Jumlah Unit', I::NUMBER, I::NUMBER, REQUIRED],
            ],
        );
    }   
}
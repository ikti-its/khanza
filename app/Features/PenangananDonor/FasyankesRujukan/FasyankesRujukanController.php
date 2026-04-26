<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\FasyankesRujukan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class FasyankesRujukanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new FasyankesRujukanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Fasyankes Rujukan', 'icon' => 'fasyankes_rujukan'],
            ],
            judul: 'Fasyankes Rujukan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_fasyankes', 'ID Fasyankes'],
                [SHOW, REQUIRED, I::TEXT, 'nama_fasyankes', 'Nama Fasyankes'],
                [SHOW, REQUIRED, I::INDEX, 'id_alamat', 'ID Alamat'],
                [SHOW, REQUIRED, I::TEXT, 'kode_pos', 'Kode Pos'],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Rujukan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RujukanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new RujukanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Rujukan', 'icon' => 'rujukan'],
            ],
            judul: 'Rujukan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Rujukan', 'id_rujukan', I::INDEX, OPTIONAL],
                [SHOW, 'ID Kasus', 'id_kasus', I::INDEX, REQUIRED],
                [SHOW, 'Nomor Surat', 'nomor_surat', I::TEXT, REQUIRED],
                [SHOW, 'Tanggal Rujukan', 'tanggal_rujukan', I::DATE, REQUIRED],
                [SHOW, 'ID Fasyankes Tujuan', 'id_fasyankes', I::INDEX, REQUIRED],
            ],
        );
    }   
}
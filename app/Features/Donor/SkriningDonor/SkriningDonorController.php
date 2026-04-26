<?php
declare(strict_types=1);

namespace App\Features\Donor\SkriningDonor;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class SkriningDonorController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new SkriningDonorModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Skrining Donor', 'icon' => 'skrining_donor'],
            ],
            judul: 'Skrining Donor',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, OPTIONAL, I::INDEX, 'id_skrining', 'ID Skrining'],
                [SHOW, REQUIRED, I::INDEX, 'id_kunjungan', 'ID Kunjungan'],
                [SHOW, REQUIRED, I::NUMBER, 'sistolik', 'Tekanan Sistolik'],
                [SHOW, REQUIRED, I::NUMBER, 'diastolik', 'Tekanan Diastolik'],
                [SHOW, REQUIRED, 'desimal', 'berat_badan', 'Berat Badan'],
                [SHOW, REQUIRED, 'desimal', 'kadar_hemoglobin', 'Kadar Hemoglobin'],
                [SHOW, REQUIRED, 'suhu', 'suhu_tubuh', 'Suhu'],
                [SHOW, REQUIRED, I::INDEX, 'id_hasil_anamnesis', 'ID Hasil Anamnesis'],
            ],
        );
    }   
}
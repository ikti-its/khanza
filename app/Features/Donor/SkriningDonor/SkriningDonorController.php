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
                [HIDE, 'ID Skrining', 'id_skrining', I::INDEX, OPTIONAL],
                [SHOW, 'ID Kunjungan', 'id_kunjungan', I::INDEX, REQUIRED],
                [SHOW, 'Tekanan Sistolik', 'sistolik', I::NUMBER, REQUIRED],
                [SHOW, 'Tekanan Diastolik', 'diastolik', I::NUMBER, REQUIRED],
                [SHOW, 'Berat Badan', 'berat_badan', 'desimal', REQUIRED],
                [SHOW, 'Kadar Hemoglobin', 'kadar_hemoglobin', 'desimal', REQUIRED],
                [SHOW, 'Suhu', 'suhu_tubuh', 'suhu', REQUIRED],
                [SHOW, 'ID Hasil Anamnesis', 'id_hasil_anamnesis', I::INDEX, REQUIRED],
            ],
        );
    }   
}
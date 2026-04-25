<?php
declare(strict_types=1);

namespace App\Features\Donor\SkriningDonor;
use App\Core\Controller\ControllerTemplate;

final class SkriningDonorController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Skrining', 'id_skrining', 'indeks', 0],
                [1, 'ID Kunjungan', 'id_kunjungan', 'indeks', 1],
                [1, 'Tekanan Sistolik', 'sistolik', 'jumlah', 1],
                [1, 'Tekanan Diastolik', 'diastolik', 'jumlah', 1],
                [1, 'Berat Badan', 'berat_badan', 'desimal', 1],
                [1, 'Kadar Hemoglobin', 'kadar_hemoglobin', 'desimal', 1],
                [1, 'Suhu', 'suhu_tubuh', 'suhu', 1],
                [1, 'ID Hasil Anamnesis', 'id_hasil_anamnesis', 'indeks', 1],
            ],
        );
    }   
}
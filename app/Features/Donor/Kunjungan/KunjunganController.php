<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class KunjunganController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new KunjunganModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Kunjungan', 'icon' => 'kunjungan'],
            ],
            judul: 'Kunjungan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Kunjungan', 'id_kunjungan', I::INDEX, OPTIONAL],
                [SHOW, 'Nomor Antrian', 'nomor_antrian', I::NUMBER, REQUIRED],
                [SHOW, 'ID Pendonor', 'id_pendonor', I::INDEX, REQUIRED],
                [SHOW, 'Tanggal Kunjungan', 'tanggal_kunjungan', I::DATE, REQUIRED],
                [SHOW, 'ID Status Kunjungan', 'id_status_kunjungan', I::SELECT, REQUIRED],
            ],
        );
    }   
}
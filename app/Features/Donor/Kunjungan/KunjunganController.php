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
                [HIDE, OPTIONAL, I::INDEX, 'id_kunjungan', 'ID Kunjungan'],
                [SHOW, REQUIRED, I::NUMBER, 'nomor_antrian', 'Nomor Antrian'],
                [SHOW, REQUIRED, I::INDEX, 'id_pendonor', 'ID Pendonor'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_kunjungan', 'Tanggal Kunjungan'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_kunjungan', 'ID Status Kunjungan'],
            ],
        );
    }   
}
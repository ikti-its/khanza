<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;
use App\Core\Controller\ControllerTemplate;

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
                [HIDE, 'ID Kunjungan', 'id_kunjungan', 'indeks', OPTIONAL],
                [SHOW, 'Nomor Antrian', 'nomor_antrian', 'jumlah', REQUIRED],
                [SHOW, 'ID Pendonor', 'id_pendonor', 'indeks', REQUIRED],
                [SHOW, 'Tanggal Kunjungan', 'tanggal_kunjungan', 'tanggal', REQUIRED],
                [SHOW, 'ID Status Kunjungan', 'id_status_kunjungan', 'status', REQUIRED],
            ],
        );
    }   
}
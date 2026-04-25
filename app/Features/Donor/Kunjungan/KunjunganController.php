<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;
use App\Core\Controller\ControllerTemplate;

final class KunjunganController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Kunjungan', 'id_kunjungan', 'indeks', 0],
                [1, 'Nomor Antrian', 'nomor_antrian', 'jumlah', 1],
                [1, 'ID Pendonor', 'id_pendonor', 'indeks', 1],
                [1, 'Tanggal Kunjungan', 'tanggal_kunjungan', 'tanggal', 1],
                [1, 'ID Status Kunjungan', 'id_status_kunjungan', 'status', 1],
            ],
        );
    }   
}
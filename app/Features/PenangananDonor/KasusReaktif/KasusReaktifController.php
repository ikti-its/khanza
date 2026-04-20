<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktif;
use App\Core\Controller\ControllerTemplate;

class KasusReaktifController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new KasusReaktifModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Kasus Reaktif', 'icon' => 'kasus_reaktif'],
            ],
            judul: 'Kasus Reaktif',
            aksi: [
                'tambah' => false,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Kasus', 'id_kasus', 'indeks', 0],
                [1, 'ID Kunjungan', 'id_kunjungan', 'indeks', 1],
                [1, 'Tanggal Ditetapkan', 'tanggal_ditetapkan', 'tanggal', 1],
                [1, 'ID Status Kasus', 'id_status_kasus', 'status', 1],
            ],
        );
    }   
}
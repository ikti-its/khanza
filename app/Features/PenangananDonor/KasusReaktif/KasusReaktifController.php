<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktif;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class KasusReaktifController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Kasus', 'id_kasus', 'indeks', OPTIONAL],
                [SHOW, 'ID Kunjungan', 'id_kunjungan', 'indeks', REQUIRED],
                [SHOW, 'Tanggal Ditetapkan', 'tanggal_ditetapkan', 'tanggal', REQUIRED],
                [SHOW, 'ID Status Kasus', 'id_status_kasus', 'status', REQUIRED],
            ],
        );
    }   
}
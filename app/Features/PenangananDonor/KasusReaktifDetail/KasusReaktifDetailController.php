<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktifDetail;
use App\Core\Controller\ControllerTemplate;

class KasusReaktifDetailController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new KasusReaktifDetailModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Kasus Reaktif Detail', 'icon' => 'kasus_reaktif_detail'],
            ],
            judul: 'Kasus Reaktif Detail',
            aksi: [
                'tambah' => false,
                'audit'  => true,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Kasus Detail', 'id_kasus_detail', 'indeks', 0],
                [1, 'ID Kasus', 'id_kasus', 'indeks', 1],
                [1, 'ID Uji Saring Detail', 'id_uji_saring_detail', 'indeks', 1],
            ],
        );
    }   
}
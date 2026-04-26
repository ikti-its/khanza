<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktifDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class KasusReaktifDetailController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, OPTIONAL, I::INDEX, 'id_kasus_detail', 'ID Kasus Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_kasus', 'ID Kasus'],
                [SHOW, REQUIRED, I::INDEX, 'id_uji_saring_detail', 'ID Uji Saring Detail'],
            ],
        );
    }   
}
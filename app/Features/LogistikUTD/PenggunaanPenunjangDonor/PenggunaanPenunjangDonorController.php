<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanPenunjangDonor;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PenggunaanPenunjangDonorController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new PenggunaanPenunjangDonorModel(),
            [
                ['Logistik UTD', 'logistik_utd'],
                ['Penggunaan BHP Non Medis Donor', 'penggunaan_bhp_non_medis_donor'],
            ],
            'Penggunaan BHP Non Medis Donor',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_penunjang_donor', 'ID Penunjang Donor'],
                [SHOW, REQUIRED, I::INDEX, 'id_pengambilan_darah', 'ID Pengambilan Darah'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang', 'ID Barang'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga', 'Harga'],
            ],
        );
    }   
}
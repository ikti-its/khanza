<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPDonor;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PenggunaanBHPDonorController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new PenggunaanBHPDonorModel(),
            [
                ['Logistik UTD', 'logistik_utd'],
                ['Penggunaan BHP Donor', 'penggunaan_bhp_donor'],
            ],
            'Penggunaan BHP Donor',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_bhp_donor', 'ID BHP Donor'],
                [SHOW, REQUIRED, I::INDEX, 'id_pengambilan_darah', 'ID Pengambilan Darah'],
                [SHOW, REQUIRED, I::INDEX, 'id_jenis_bhp', 'ID Jenis BHP'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_medis', 'ID Barang Medis'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_penunjang', 'ID Barang Non Medis'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga', 'Harga'],
            ],
        );
    }   
}
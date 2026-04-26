<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPPenyerahan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PenggunaanBHPPenyerahanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new PenggunaanBHPPenyerahanModel(),
            [
                ['Logistik UTD', 'logistik_utd'],
                ['Penggunaan BHP Penyerahan', 'penggunaan_bhp_penyerahan'],
            ],
            'Penggunaan BHP Penyerahan',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_bhp_penyerahan', 'ID BHP Penyerahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_penyerahan', 'ID Penyerahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_jenis_bhp', 'ID Jenis BHP'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_medis', 'ID Barang Medis'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_penunjang', 'ID Barang Non Medis'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga', 'Harga'],
            ],
        );
    }   
}
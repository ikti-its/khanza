<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanMedisPemisahan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PenggunaanMedisPemisahanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new PenggunaanMedisPemisahanModel(),
            [
                ['Logistik UTD', 'logistik_utd'],
                ['Penggunaan BHP Medis Pemisahan', 'penggunaan_bhp_medis_pemisahan'],
            ],
            'Penggunaan BHP Medis Pemisahan',
            [
                A::CREATE,
                A::AUDIT,
                // A::UPDATE, 
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_medis_pemisahan', 'ID Medis Pemisahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_pemisahan', 'ID Pemisahan'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang', 'ID Barang'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga', 'Harga'],
            ],
        );
    }   
}
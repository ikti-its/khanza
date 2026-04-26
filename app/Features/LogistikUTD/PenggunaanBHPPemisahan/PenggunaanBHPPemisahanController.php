<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPPemisahan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PenggunaanBHPPemisahanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PenggunaanBHPPemisahanModel(),
            breadcrumbs: [
                ['title' => 'Logistik UTD', 'icon' => 'logistik_utd'],
                ['title' => 'Penggunaan BHP Pemisahan', 'icon' => 'penggunaan_bhp_pemisahan'],
            ],
            title: 'Penggunaan BHP Pemisahan',
            action: [
                A::CREATE,
                A::AUDIT,
                // A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_bhp_pemisahan', 'ID BHP Pemisahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_pemisahan', 'ID Pemisahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_jenis_bhp', 'ID Jenis BHP'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_medis', 'ID Barang Medis'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_penunjang', 'ID Barang Non Medis'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga', 'Harga'],
            ],
        );
    }   
}
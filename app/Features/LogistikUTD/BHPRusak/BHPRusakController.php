<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\BHPRusak;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class BHPRusakController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new BHPRusakModel(),
            [
                ['Logistik UTD', 'logistik_utd'],
                ['BHP Rusak', 'bhp_rusak'],
            ],
            'BHP Rusak',
            [
                A::CREATE,
                A::AUDIT,
                // A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_bhp_rusak', 'ID BHP Rusak'],
                [SHOW, REQUIRED, I::INDEX, 'id_jenis_bhp', 'ID Jenis BHP'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_medis', 'ID Barang Medis'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_penunjang', 'ID Barang Non Medis'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga_beli', 'Harga Beli'],
                [HIDE, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
                [SHOW, REQUIRED, I::DTIME, 'tanggal_rusak', 'Tanggal Rusak'],
                [SHOW, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }   
}
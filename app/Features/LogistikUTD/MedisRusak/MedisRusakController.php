<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisRusak;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class MedisRusakController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new MedisRusakModel(),
            [
                ['Logistik UTD',    'logistik_utd'],
                ['BHP Medis Rusak', 'bhp_medis_rusak'],
            ],
            'BHP Medis Rusak',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                // A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX,  'id_medis_rusak', 'ID Medis Rusak'],
                [SHOW, OPTIONAL, I::INDEX,  'id_barang',      'ID Barang'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah',         'Jumlah'],
                [SHOW, REQUIRED, I::MONEY,  'harga_beli',     'Harga Beli'],
                [HIDE, REQUIRED, I::INDEX,  'id_petugas',     'ID Petugas'],
                [SHOW, REQUIRED, I::DTIME,  'tanggal_rusak',  'Tanggal Rusak'],
                [SHOW, REQUIRED, I::TEXT,   'keterangan',     'Keterangan'],
            ],
        );
    }
}

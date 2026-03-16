<?php
declare(strict_types=1);

namespace App\Features\Finansial\Transaksi;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateTransaksiTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'transaksi',
            [
                'id_transaksi'      => T::ID8(),
                'nama_transaksi'    => T::TEXT(),
            ],
            ['id_transaksi'],
            [['nama_transaksi']],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\Inventori\PemisahanKomponenDetail;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePemisahanKomponenDetailTable extends Template
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'pemisahan_komponen_detail',
            [
                'id_pemisahan_detail'    => T::ID32(),
                'id_pemisahan'           => T::ID32(),
                'no_kantong'             => T::TEXT(),
                'id_komponen'            => T::ID8(),
                'tanggal_kadaluarsa'     => T::DATE(),
            ],
            ['id_pemisahan_detail'],
            [['no_kantong']],
            [
                [['id_pemisahan'], 'pemisahan_komponen', ['id_pemisahan'], 'CASCADE', 'CASCADE'],
                [['id_komponen'], 'darah.komponen_darah', ['id_komponen'], 'CASCADE', 'CASCADE'],
            ],
            [['id_pemisahan']],
        );
    }
}

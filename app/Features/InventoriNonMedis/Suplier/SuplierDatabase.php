<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Suplier;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class SuplierDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'suplier',
            [
                'id_suplier'    => T::ID16(200),
                'nama_suplier'  => T::NAME(),
                'no_telp'       => T::TEXT()->nullable(),
                'id_alamat'     => T::FK_AUTO(),
            ],
            'id_suplier',
            [],
            [
                [
                    'id_alamat',
                    \App\Features\Lokasi\Alamat\AlamatDatabase::class,
                    'id_alamat',
                ]
            ],
            true,
            'suplier.csv'
        );
    }
}

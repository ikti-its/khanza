<?php
declare(strict_types=1);

namespace App\Features\Kontak\Telepon;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class TeleponDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'kontak',
            'telepon',
            [
                'id_telepon'    => T::ID32(300_000_000),
                'id_orang'      => T::FK_AUTO(),
                'nomor_telepon' => T::TEXT(),
                'jenis_telepon' => T::FK_AUTO(),
                'id_provider'   => T::FK_AUTO(),
            ],
            'id_telepon',
            ['nomor_telepon'],
            [
                [
                    'id_orang', 
                    \App\Features\Person\Orang\OrangDatabase::class, 
                    'id_orang',
                ],
                [
                    'jenis_telepon',
                    \App\Features\Kontak\JenisTelepon\JenisTeleponDatabase::class, 
                    'id_jenis_telepon',
                ],
                [
                    'id_provider',
                    \App\Features\Kontak\Provider\ProviderDatabase::class,
                    'id_provider',
                ],
            ],
        );
    }
}

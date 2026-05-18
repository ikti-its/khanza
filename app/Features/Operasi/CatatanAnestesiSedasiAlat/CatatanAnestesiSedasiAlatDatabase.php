<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasiAlat;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class CatatanAnestesiSedasiAlatDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'operasi',
            'catatan_anestesi_sedasi_alat',
            [
                'id_alat_catatan'     => T::ID(300_000_000),
                'id_catatan_anestesi' => T::FK_AUTO(),
                'id_alat'             => T::FK_AUTO(),
                'is_digunakan'        => T::BOOL(),
                'keterangan'          => T::NOTE()->nullable(),
            ],
            'id_alat_catatan',
            [],
            [
                [
                    ['id_catatan_anestesi'],
                    \App\Features\Operasi\CatatanAnestesiSedasi\CatatanAnestesiSedasiDatabase::class,
                    ['id_catatan_anestesi'],
                ],
                [
                    ['id_alat'],
                    \App\Features\Operasi\RefAlatAnestesi\RefAlatAnestesiDatabase::class,
                    ['id_alat'],
                ],
            ],
        );
    }
}
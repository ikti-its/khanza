<?php
declare(strict_types=1);

namespace App\Features\Kontak\JenisTelepon;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;
use App\Features\Kontak\Telepon\TeleponDatabase;

final class JenisTeleponModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new TeleponDatabase(),
            'REFS',
            'kontak',
            'jenis_telepon',
            'id_jenis_telepon',
            [
                'id_jenis_telepon' => V::TODO(),
                'nama_jenis_telepon' => V::TODO()
            ],
            [],
        );
    }
}
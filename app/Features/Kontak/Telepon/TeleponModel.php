<?php
declare(strict_types=1);

namespace App\Features\Kontak\Telepon;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TeleponModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'kontak',
            'telepon',
            'id_telepon',
            [
                'id_telepon' => V::TODO(),
                'id_orang' => V::TODO(),
                'nomor_telepon' => V::TODO(),
                'jenis_telepon' => V::TODO(),
                'id_provider' => V::TODO()
            ],
        );
    }
}
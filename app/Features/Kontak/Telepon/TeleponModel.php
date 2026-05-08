<?php
declare(strict_types=1);

namespace App\Features\Kontak\Telepon;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TeleponModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new TeleponDatabase(),
            'BASE',
            'kontak',
            'telepon',
            'id_telepon',
            [
                'id_telepon'    => V::DEFAULT(),
                'nomor_telepon' => V::DEFAULT(),
            ],
            [
                'id_orang'      => ['nik', 'nama'],
                'jenis_telepon' => ['nama_jenis_telepon'],
                'id_provider'   => ['nama_provider']
            ],
        );
    }
}
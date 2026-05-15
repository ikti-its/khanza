<?php
declare(strict_types=1);

namespace App\Features\Role\Pendonor;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PendonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PendonorDatabase(),
            'BASE',
            'role',
            'pendonor',
            'id_pendonor',
            [
                'id_pendonor'               => V::DEFAULT(),
                'nomor_pendonor'            => V::DEFAULT(),
                'tanggal_donor_terakhir'    => V::DEFAULT()
            ],
            [
                'id_orang'  => ['nik', 'nama', 'tanggal_lahir'],
                'id_rhesus' => ['kode_rhesus']
            ],
        );
    }
}
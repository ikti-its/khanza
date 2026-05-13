<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusKunjungan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class StatusKunjunganModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new StatusKunjunganDatabase(),
            'REFS',
            'donor',
            'status_kunjungan',
            'id_status_kunjungan',
            [
                'id_status_kunjungan'   => V::DEFAULT(),
                'nama_status_kunjungan' => V::DEFAULT()
            ],
            [],
        );
    }
}
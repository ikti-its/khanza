<?php
declare(strict_types=1);

namespace App\Features\Role\Dokter;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class DokterModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new DokterDatabase(),
            'BASE',
            'role',
            'dokter',
            'id_dokter',
            [
                'id_dokter' => V::DEFAULT(),
                'spesialis' => V::DEFAULT(),
            ],
            [
                'id_orang' => ['nik', 'nama', 'tanggal_lahir'],
            ],
        );
    }
}

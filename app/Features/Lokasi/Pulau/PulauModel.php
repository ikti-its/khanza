<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Pulau;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PulauModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'lokasi',
            'pulau',
            'id_pulau',
            [
                'id_pulau' => V::TODO(),
                'nama_pulau' => V::TODO()
            ],
            [],
        );
    }
}
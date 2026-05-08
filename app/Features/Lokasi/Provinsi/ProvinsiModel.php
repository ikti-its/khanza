<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Provinsi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class ProvinsiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'lokasi',
            'provinsi',
            'id_provinsi',
            [
                'id_pulau' => V::TODO(),
                'id_provinsi' => V::TODO(),
                'nama_provinsi' => V::TODO()
            ],
        );
    }
}
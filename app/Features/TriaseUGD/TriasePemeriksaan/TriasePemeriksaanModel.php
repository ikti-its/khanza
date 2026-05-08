<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TriasePemeriksaanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'triase_pemeriksaan',
            'id_pemeriksaan',
            [
                'id_pemeriksaan' => V::TODO(),
                'kode_pemeriksaan' => V::TODO(),
                'nama_pemeriksaan' => V::TODO()
            ],
        );
    }
}
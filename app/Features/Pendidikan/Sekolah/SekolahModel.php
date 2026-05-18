<?php
declare(strict_types=1);

namespace App\Features\Pendidikan\Sekolah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SekolahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new SekolahDatabase(),
            'REFS',
            'pendidikan',
            'sekolah',
            'id_sekolah',
            [
                'id_sekolah'   => V::DEFAULT(),
                'nama_sekolah' => V::DEFAULT(),
                
            ],
            [
                'id_jenis'  => ['nama_jenis'],
                'alamat_id' => [],
            ],
        );
    }
}
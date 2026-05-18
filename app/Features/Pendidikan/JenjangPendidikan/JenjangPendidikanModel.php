<?php
declare(strict_types=1);

namespace App\Features\Pendidikan\JenjangPendidikan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JenjangPendidikanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new JenjangPendidikanDatabase(),
            'REFS',
            'pendidikan',
            'jenjang',
            'id_jenjang',
            [
                'id_jenjang'   => V::DEFAULT(),
                'nama_jenjang' => V::DEFAULT()
            ],
            [],
        );
    }
}
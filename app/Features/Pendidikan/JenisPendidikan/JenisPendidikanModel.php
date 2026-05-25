<?php
declare(strict_types=1);

namespace App\Features\Pendidikan\JenisPendidikan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JenisPendidikanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new JenisPendidikanDatabase(),
            'REFS',
            'pendidikan',
            'jenis',
            'id_jenis',
            [
                'id_jenis'   => V::DEFAULT(),
                'nama_jenis' => V::DEFAULT(),
            ],
            [
                'id_jenjang' => ['nama_jenjang'],
            ],
        );
    }
}

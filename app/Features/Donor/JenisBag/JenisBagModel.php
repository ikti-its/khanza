<?php
declare(strict_types=1);

namespace App\Features\Donor\JenisBag;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JenisBagModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new JenisBagDatabase(),
            'REFS',
            'donor',
            'jenis_bag',
            'id_jenis_bag',
            [
                'id_jenis_bag'      => V::DEFAULT(),
                'kode_jenis_bag'    => V::DEFAULT(),
                'nama_jenis_bag'    => V::DEFAULT()
            ],
            [],
        );
    }
}
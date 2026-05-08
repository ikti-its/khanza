<?php
declare(strict_types=1);

namespace App\Features\Person\JenisKelamin;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JenisKelaminModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'person',
            'jenis_kelamin',
            'id_jenis_kelamin',
            [
                'id_jenis_kelamin' => V::TODO(),
                'nama_jenis_kelamin' => V::TODO()
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisSedasi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefJenisSedasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new RefJenisSedasiDatabase(),
            'REFS',
            'operasi',
            'ref_jenis_sedasi',
            'id_jenis_sedasi',
            [
                'id_jenis_sedasi' => V::DEFAULT(),
                'nama_sedasi'     => V::DEFAULT(),
            ],
            []
        );
    }
}
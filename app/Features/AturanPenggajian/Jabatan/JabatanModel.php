<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Jabatan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JabatanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new JabatanDatabase(),
            'BASE',
            'penggajian',
            'jabatan',
            'no_jabatan',
            [
                'no_jabatan'    => V::DEFAULT(),
                'jenis_jabatan' => V::DEFAULT(),
                'nama_jabatan'  => V::DEFAULT(),
                'jenjang'       => V::DEFAULT(),
                'tunjangan'     => V::DEFAULT(),
            ],
            [],
        );
    }
}
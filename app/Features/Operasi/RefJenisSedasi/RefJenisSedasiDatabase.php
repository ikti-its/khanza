<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisSedasi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RefJenisSedasiDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'operasi',
            'ref_jenis_sedasi',
            [
                'id_jenis_sedasi' => T::ID(10),
                'nama_sedasi'     => T::TEXT(),
            ],
            'id_jenis_sedasi',
            [],
            [],
            true,
            'jenis_sedasi.csv',
        );
    }
}

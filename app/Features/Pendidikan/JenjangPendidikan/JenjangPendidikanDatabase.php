<?php
declare(strict_types=1);

namespace App\Features\Pendidikan\JenjangPendidikan;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class JenjangPendidikanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pendidikan',
            'jenjang',
            [
                'id_jenjang'   => T::ID(9),
                'nama_jenjang' => T::TEXT(),
            ],
            'id_jenjang',
            ['nama_jenjang'],
            [],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\Kontak\JenisTelepon;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class JenisTeleponDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'kontak',
            'jenis_telepon',
            [
                'id_jenis_telepon'   => T::ID(5),
                'nama_jenis_telepon' => T::TEXT(),
            ],
            'id_jenis_telepon',
            ['nama_jenis_telepon'],
            [],
        );
    }
}

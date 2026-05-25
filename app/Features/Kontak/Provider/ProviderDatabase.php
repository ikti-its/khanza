<?php
declare(strict_types=1);

namespace App\Features\Kontak\Provider;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class ProviderDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'kontak',
            'provider',
            [
                'id_provider'   => T::ID(20),
                'nama_provider' => T::TEXT(),
            ],
            'id_provider',
            ['nama_provider'],
            [],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\Kontak\Provider;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class ProviderModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new ProviderDatabase(),
            'REFS',
            'kontak',
            'provider',
            'id_provider',
            [
                'id_provider'   => V::DEFAULT(),
                'nama_provider' => V::DEFAULT(),
            ],
            [],
        );
    }
}

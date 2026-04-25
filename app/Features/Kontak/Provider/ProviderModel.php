<?php
declare(strict_types=1);

namespace App\Features\Kontak\Provider;
use App\Core\Model\ModelTemplate;

final class ProviderModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'kontak',
            'provider',
            'id_provider',
            [
                'id_provider' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_provider' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
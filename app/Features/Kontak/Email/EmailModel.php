<?php
declare(strict_types=1);

namespace App\Features\Kontak\Email;
use App\Core\Model\ModelTemplate;

final class EmailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'kontak',
            'email',
            'id_email',
            [
                'id_email' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_orang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'alamat_email' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}
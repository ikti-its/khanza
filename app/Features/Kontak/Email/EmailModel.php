<?php
declare(strict_types=1);

namespace App\Features\Kontak\Email;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class EmailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new EmailDatabase(),
            'BASE',
            'kontak',
            'email',
            'id_email',
            [
                'id_email'     => V::DEFAULT(),
                'id_orang'     => V::DEFAULT(),
                'alamat_email' => V::DEFAULT(),
            ],
            [],
        );
    }
}
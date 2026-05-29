<?php
declare(strict_types=1);

namespace App\Features\Finansial\Bank;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class BankModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new BankDatabase(),
            [
                'id_bank'        => V::DEFAULT(),
                'kode_bank'      => V::DEFAULT(),
                'nama_bank'      => V::DEFAULT(),
                'sebutan'        => V::DEFAULT(),
                'is_bank_devisa' => V::DEFAULT(),
                'mobile_app'     => V::DEFAULT(),
                'link_playstore' => V::DEFAULT(),
            ],
            [
                'id_pemilik' => ['nama_pemilik'],
                'id_prinsip' => ['nama_prinsip'],
            ],
        );
    }
}

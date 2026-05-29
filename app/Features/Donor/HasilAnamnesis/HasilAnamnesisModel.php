<?php
declare(strict_types=1);

namespace App\Features\Donor\HasilAnamnesis;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilAnamnesisModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new HasilAnamnesisDatabase(),
            [
                'id_hasil'   => V::DEFAULT(),
                'nama_hasil' => V::DEFAULT(),
            ],
            [],
        );
    }
}

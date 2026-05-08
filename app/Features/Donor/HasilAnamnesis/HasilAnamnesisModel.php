<?php
declare(strict_types=1);

namespace App\Features\Donor\HasilAnamnesis;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilAnamnesisModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'donor',
            'hasil_anamnesis',
            'id_hasil',
            [
                'id_hasil' => V::TODO(),
                'nama_hasil' => V::TODO()
            ],
        );
    }
}
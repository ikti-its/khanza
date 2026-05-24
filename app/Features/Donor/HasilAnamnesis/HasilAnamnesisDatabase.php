<?php
declare(strict_types=1);

namespace App\Features\Donor\HasilAnamnesis;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class HasilAnamnesisDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'hasil_anamnesis',
            [
                'id_hasil'      => T::ID(3),
                'nama_hasil'    => T::NAME(30),
            ],
            'id_hasil',
            ['nama_hasil'],
            [],
            true,
            'hasil_anamnesis.csv'
        );
    }
}

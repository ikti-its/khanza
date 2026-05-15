<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPengambilan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusPengambilanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'status_pengambilan',
            [
                'id_status_pengambilan'     => T::ID(5),
                'nama_status_pengambilan'   => T::NAME(20),
            ],
            'id_status_pengambilan',
            ['nama_status_pengambilan'],
            [],
            true,
            'status_pengambilan.csv'
        );
    }
}

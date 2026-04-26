<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\AlasanPemusnahan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class AlasanPemusnahanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new AlasanPemusnahanModel(),
            [
                ['Pemusnahan Darah', 'pemusnahan_darah'],
                ['Alasan Pemusnahan', 'alasan_pemusnahan'],
            ],
            'Alasan Pemusnahan',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_alasan', 'ID Alasan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_alasan', 'Nama Alasan Pemusnahan'],
            ],
        );
    }   
}
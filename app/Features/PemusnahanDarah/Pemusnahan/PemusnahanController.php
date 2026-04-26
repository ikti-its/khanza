<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\Pemusnahan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PemusnahanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new PemusnahanModel(),
            [
                ['Pemusnahan Darah', 'pemusnahan_darah'],
                ['Pemusnahan', 'pemusnahan'],
            ],
            'Pemusnahan',
            [
                A::CREATE,
                A::AUDIT,
                // A::UPDATE, 
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_pemusnahan', 'ID Pemusnahan'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_pemusnahan', 'Tanggal Pemusnahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
                [SHOW, OPTIONAL, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\PemusnahanDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PemusnahanDetailController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new PemusnahanDetailModel(),
            [
                ['Pemusnahan Darah', 'pemusnahan_darah'],
                ['Pemusnahan Detail', 'pemusnahan_detail'],
            ],
            'Pemusnahan Detail',
            [
                A::CREATE,
                A::AUDIT,
                // A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_pemusnahan_detail', 'ID Pemusnahan Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_pemusnahan', 'ID Pemusnahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_stok_darah', 'ID Stok Darah'],
                [SHOW, REQUIRED, I::INDEX, 'id_alasan', 'ID Alasan'],
            ],
        );
    }   
}
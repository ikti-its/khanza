<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\KantongDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class KantongDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new KantongDarahModel(),
            breadcrumbs: [
                ['Inventaris Darah', 'inventaris_darah'],
                ['Kantong Darah', 'kantong_darah'],
            ],
            title: 'Kantong Darah',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_bag', 'ID Bag'],
                [SHOW, REQUIRED, I::INDEX, 'id_pengambilan_darah', 'ID Pengambilan Darah'],
                [SHOW, REQUIRED, I::TEXT, 'no_bag', 'Nomor Bag'],
                [SHOW, REQUIRED, I::INDEX, 'id_jenis_bag', 'ID Jenis Bag'],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseMacamKasus;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class TriaseMacamKasusController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new TriaseMacamKasusModel(),
            breadcrumbs: [
                ['Triase UGD', 'triase_ugd'],
                ['Triase Macam Kasus', 'triase_macam_kasus'],
            ],
            title: 'Triase Macam Kasus',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_macam_kasus', 'ID Macam Kasus'],
                [SHOW, REQUIRED, I::TEXT, 'kode_macam_kasus', 'Kode'],
                [SHOW, REQUIRED, I::TEXT, 'nama_macam_kasus', 'Nama Macam Kasus'],
            ],
        );
    }   
}
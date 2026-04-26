<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class DataTriaseDetailController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new DataTriaseDetailModel(),
            [
                ['Triase UGD', 'triase_ugd'],
                ['Data Triase Detail', 'data_triase_detail'],
            ],
            'Data Triase Detail',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_triase_detail', 'ID Triase Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_triase', 'ID Triase'],
                [SHOW, REQUIRED, I::INDEX, 'id_skala', 'ID Skala'],
            ],
        );
    }   
}
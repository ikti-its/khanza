<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\KebutuhanKhusus;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class KebutuhanKhususController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new KebutuhanKhususModel(),
            breadcrumbs: [
                ['Triase UGD', 'triase_ugd'],
                ['Kebutuhan Khusus', 'kebutuhan_khusus'],
            ],
            title: 'Kebutuhan Khusus',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kebutuhan', 'ID Kebutuhan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kebutuhan', 'Nama Kebutuhan'],
            ],
        );
    }   
}
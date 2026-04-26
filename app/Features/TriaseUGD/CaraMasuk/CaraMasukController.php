<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\CaraMasuk;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class CaraMasukController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new CaraMasukModel(),
            breadcrumbs: [
                ['Triase UGD', 'triase_ugd'],
                ['Cara Masuk', 'cara_masuk'],
            ],
            title: 'Cara Masuk',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_cara', 'ID Cara'],
                [SHOW, REQUIRED, I::TEXT, 'nama_cara', 'Nama Cara'],
            ],
        );
    }   
}
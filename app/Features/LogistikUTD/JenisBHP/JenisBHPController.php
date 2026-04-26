<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\JenisBHP;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class JenisBHPController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new JenisBHPModel(),
            breadcrumbs: [
                ['title' => 'Logistik UTD', 'icon' => 'logistik_utd'],
                ['title' => 'Jenis BHP', 'icon' => 'jenis_bhp'],
            ],
            title: 'Jenis BHP',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_bhp', 'ID Jenis BHP'],
                [SHOW, REQUIRED, I::TEXT, 'nama_jenis_bhp', 'Nama Jenis BHP'],
            ],
        );
    }   
}
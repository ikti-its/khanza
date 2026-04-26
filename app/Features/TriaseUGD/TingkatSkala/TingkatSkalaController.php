<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TingkatSkala;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class TingkatSkalaController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new TingkatSkalaModel(),
            [
                ['Triase UGD', 'triase_ugd'],
                ['Tingkat Skala', 'tingkat_skala'],
            ],
            'Tingkat Skala',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_tingkat', 'ID Tingkat'],
                [SHOW, REQUIRED, I::TEXT, 'nama_tingkat', 'Nama Tingkat'],
            ],
        );
    }   
}
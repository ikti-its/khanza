<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseSkala;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class TriaseSkalaController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new TriaseSkalaModel(),
            [
                ['Triase UGD', 'triase_ugd'],
                ['Triase Skala', 'triase_skala'],
            ],
            'Triase Skala',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_skala', 'ID Skala'],
                [SHOW, REQUIRED, I::INDEX, 'id_tingkat_skala', 'ID Tingkat Skala'],
                [SHOW, REQUIRED, I::TEXT, 'kode_skala', 'Kode'],
                [SHOW, REQUIRED, I::INDEX, 'id_pemeriksaan', 'ID Pemeriksaan'],
                [SHOW, REQUIRED, I::TEXT, 'pengkajian', 'Pengkajian'],
            ],
        );
    }   
}
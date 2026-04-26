<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlatTransportasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class AlatTransportasiController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new AlatTransportasiModel(),
            [
                ['Triase UGD', 'triase_ugd'],
                ['Alat Transportasi', 'alat_transportasi'],
            ],
            'Alat Transportasi',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_transportasi', 'ID Transportasi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_transportasi', 'Nama Transportasi'],
            ],
        );
    }   
}
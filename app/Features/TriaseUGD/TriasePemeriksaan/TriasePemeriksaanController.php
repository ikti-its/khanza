<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class TriasePemeriksaanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new TriasePemeriksaanModel(),
            [
                ['Triase UGD', 'triase_ugd'],
                ['Triase Pemeriksaan', 'triase_pemeriksaan'],
            ],
            'Triase Pemeriksaan',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_pemeriksaan', 'ID Pemeriksaan'],
                [SHOW, REQUIRED, I::TEXT, 'kode_pemeriksaan', 'Kode'],
                [SHOW, REQUIRED, I::TEXT, 'nama_pemeriksaan', 'Nama Pemeriksaan'],
            ],
        );
    }   
}
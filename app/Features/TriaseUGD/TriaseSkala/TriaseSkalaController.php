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
            model: new TriaseSkalaModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Triase Skala', 'icon' => 'triase_skala'],
            ],
            title: 'Triase Skala',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_skala', 'ID Skala'],
                [SHOW, REQUIRED, I::INDEX, 'id_tingkat_skala', 'ID Tingkat Skala'],
                [SHOW, REQUIRED, I::TEXT, 'kode_skala', 'Kode'],
                [SHOW, REQUIRED, I::INDEX, 'id_pemeriksaan', 'ID Pemeriksaan'],
                [SHOW, REQUIRED, I::TEXT, 'pengkajian', 'Pengkajian'],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\Darah\KomponenDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class KomponenDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new KomponenDarahModel(),
            breadcrumbs: [
                ['title' => 'Darah', 'icon' => 'darah'],
                ['title' => 'Komponen Darah', 'icon' => 'komponen_darah'],
            ],
            title: 'Komponen Darah',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_komponen', 'ID Komponen'],
                [SHOW, REQUIRED, I::TEXT, 'kode_komponen', 'Kode'],
                [SHOW, REQUIRED, I::TEXT, 'nama_komponen', 'Nama Komponen'],
                [SHOW, REQUIRED, I::NUMBER, 'masa_berlaku_hari', 'Masa Berlaku (Hari)'],
            ],
        );
    }   
}
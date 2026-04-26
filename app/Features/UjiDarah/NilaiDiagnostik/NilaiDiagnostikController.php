<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiDiagnostik;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class NilaiDiagnostikController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new NilaiDiagnostikModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Nilai Diagnostik', 'icon' => 'nilai_diagnostik'],
            ],
            title: 'Nilai Diagnostik',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_nilai_diagnostik', 'ID Nilai Diagnostik'],
                [SHOW, REQUIRED, I::TEXT, 'nama_nilai_diagnostik', 'Nama Nilai Diagnostik'],
            ],
        );
    }   
}
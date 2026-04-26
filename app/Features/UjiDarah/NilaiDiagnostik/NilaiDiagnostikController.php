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
            new NilaiDiagnostikModel(),
            [
                ['Uji Darah', 'uji_darah'],
                ['Nilai Diagnostik', 'nilai_diagnostik'],
            ],
            'Nilai Diagnostik',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_nilai_diagnostik', 'ID Nilai Diagnostik'],
                [SHOW, REQUIRED, I::TEXT, 'nama_nilai_diagnostik', 'Nama Nilai Diagnostik'],
            ],
        );
    }   
}
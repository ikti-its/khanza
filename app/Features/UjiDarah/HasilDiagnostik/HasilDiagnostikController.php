<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostik;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class HasilDiagnostikController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new HasilDiagnostikModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Hasil Diagnostik', 'icon' => 'hasil_diagnostik'],
            ],
            title: 'Hasil Diagnostik',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_diagnostik', 'ID Diagnostik'],
                [SHOW, REQUIRED, I::INDEX, 'id_rujukan', 'ID Rujukan'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_hasil', 'Tanggal Hasil'],
                [SHOW, REQUIRED, I::NAME, 'dokter_pemeriksa', 'Dokter Pemeriksa'],
            ],
        );
    }   
}
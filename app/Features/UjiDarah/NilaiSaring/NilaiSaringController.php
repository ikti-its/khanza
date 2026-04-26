<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiSaring;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class NilaiSaringController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new NilaiSaringModel(),
            breadcrumbs: [
                ['Uji Darah', 'uji_darah'],
                ['Nilai Saring', 'nilai_saring'],
            ],
            title: 'Nilai Saring',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_nilai_saring', 'ID Nilai Saring'],
                [SHOW, REQUIRED, I::TEXT, 'nama_nilai_saring', 'Nama Nilai Saring'],
            ],
        );
    }   
}
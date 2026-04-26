<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaring;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class HasilUjiSaringController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new HasilUjiSaringModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Hasil Uji Saring', 'icon' => 'hasil_uji_saring'],
            ],
            title: 'Hasil Uji Saring',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_uji_saring', 'ID Uji Saring'],
                [SHOW, REQUIRED, I::INDEX, 'id_bag', 'ID Bag'],
                [SHOW, REQUIRED, I::INDEX, 'id_metode_uji', 'ID Metode Uji'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_uji', 'Tanggal Uji'],
                [SHOW, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
            ],
        );
    }   
}
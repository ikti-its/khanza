<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaring;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class HasilUjiSaringController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new HasilUjiSaringModel(),
            [
                ['Uji Darah',        'uji_darah'],
                ['Hasil Uji Saring', 'hasil_uji_saring'],
            ],
            'Hasil Uji Saring',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_uji_saring',        'ID Uji Saring'],
                [SHOW, REQUIRED, I::INDEX, 'id_pengambilan_darah', 'ID Pengambilan Darah'],
                [SHOW, REQUIRED, I::DATE,  'tanggal_uji',          'Tanggal Uji'],
                [SHOW, REQUIRED, I::INDEX, 'id_metode_uji',        'ID Metode Uji'],
                [SHOW, REQUIRED, I::INDEX, 'id_petugas',           'ID Petugas'],
                [SHOW, REQUIRED, I::BOOL,  'hbsag',                'HBsAg'],
                [SHOW, REQUIRED, I::BOOL,  'hcv',                  'HCV'],
                [SHOW, REQUIRED, I::BOOL,  'hiv',                  'HIV'],
                [SHOW, REQUIRED, I::BOOL,  'sifilis',              'Sifilis'],
                [SHOW, REQUIRED, I::BOOL,  'malaria',              'Malaria'],
            ],
        );
    }
}

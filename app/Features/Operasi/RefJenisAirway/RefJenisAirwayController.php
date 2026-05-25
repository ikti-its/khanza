<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisAirway;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefJenisAirwayController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefJenisAirwayModel(),
            [
                ['Operasi',                'operasi'],
                ['Referensi Jenis Airway', 'ref_jenis_airway'],
            ],
            'Referensi Jenis Airway',
            [
                A::READ,
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis',   'ID Jenis'],
                [SHOW, REQUIRED, I::TEXT,  'nama_jenis', 'Nama Jenis'],
            ],
        );
    }
}

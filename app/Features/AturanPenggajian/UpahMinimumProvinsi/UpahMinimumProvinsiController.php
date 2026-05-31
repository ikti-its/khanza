<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UpahMinimumProvinsi;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class UpahMinimumProvinsiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new UpahMinimumProvinsiModel(),
            [
                ['User', 'user'],
                ['UMP', 'ump'],
            ],
            'Upah Minimum Provinsi',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [SHOW, REQUIRED, I::INDEX,  'no_umr',        'Nomor UMR'],
                [SHOW, REQUIRED, I::NUMBER, 'tahun',         'Tahun'],
                [SHOW, REQUIRED, I::TEXT,   'nama_provinsi', 'Provinsi'],
                [SHOW, REQUIRED, I::MONEY,  'upah_minimum',  'Upah Minimum'],
            ],
        );
    }
}

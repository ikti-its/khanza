<?php
declare(strict_types=1);

namespace App\Features\Role\Petugas;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PetugasController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PetugasModel(),
            [
                ['Role',    'role'],
                ['Petugas', 'petugas'],
            ],
            'Petugas',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_petugas', 'ID Petugas'],
                [HIDE, OPTIONAL, I::INDEX, 'id_orang',   'ID Orang'],
                [SHOW, REQUIRED, I::TEXT,  'nik',        'NIK'],
                [SHOW, REQUIRED, I::TEXT,  'nama',       'Nama'],
                [SHOW, REQUIRED, I::DATE,  'tanggal_lahir', 'Tanggal Lahir'],
                [SHOW, OPTIONAL, I::TEXT,  'deskripsi',  'Deskripsi'],
            ],
        );
    }
}
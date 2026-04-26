<?php
declare(strict_types=1);

namespace App\Features\Person\JenisKelamin;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class JenisKelaminController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new JenisKelaminModel(),
            [
                ['Person', 'person'],
                ['Jenis Kelamin', 'jenis_kelamin'],
            ],
            'Jenis Kelamin',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_kelamin', 'ID Jenis Kelamin'],
                [SHOW, REQUIRED, I::TEXT, 'nama_jenis_kelamin', 'Nama Jenis Kelamin'],
            ],
        );
    }   
}
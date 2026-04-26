<?php
declare(strict_types=1);

namespace App\Features\Person\Orang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class OrangController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new OrangModel(),
            [
                ['Person', 'person'],
                ['Orang', 'orang'],
            ],
            'Orang',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_orang', 'ID Orang'],
                [SHOW, REQUIRED, I::TEXT, 'nik', 'NIK'],
                [SHOW, REQUIRED, I::NAME, 'nama', 'Nama'],
                [SHOW, REQUIRED, I::INDEX, 'id_jenis_kelamin', 'ID Jenis Kelamin'],
                [HIDE, REQUIRED, I::INDEX, 'id_agama', 'ID Agama'],
                [HIDE, REQUIRED, I::INDEX, 'id_pernikahan', 'ID Pernikahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_golongan_darah', 'ID Golongan Darah'],
                [HIDE, REQUIRED, I::INDEX, 'id_alamat', 'ID Alamat'],
                [HIDE, REQUIRED, I::INDEX, 'tempat_lahir_prov', 'Tempat Lahir Provinsi'],
                [SHOW, REQUIRED, I::INDEX, 'tempat_lahir_kota', 'Tempat Lahir Kota'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_lahir', 'Tanggal Lahir'],
            ],
        );
    }   
}
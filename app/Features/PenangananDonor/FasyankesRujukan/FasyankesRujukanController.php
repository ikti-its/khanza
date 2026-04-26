<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\FasyankesRujukan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class FasyankesRujukanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new FasyankesRujukanModel(),
            breadcrumbs: [
                ['Penanganan Donor', 'penanganan_donor'],
                ['Fasyankes Rujukan', 'fasyankes_rujukan'],
            ],
            title: 'Fasyankes Rujukan',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_fasyankes', 'ID Fasyankes'],
                [SHOW, REQUIRED, I::TEXT, 'nama_fasyankes', 'Nama Fasyankes'],
                [SHOW, REQUIRED, I::INDEX, 'id_alamat', 'ID Alamat'],
                [SHOW, REQUIRED, I::TEXT, 'kode_pos', 'Kode Pos'],
            ],
        );
    }   
}
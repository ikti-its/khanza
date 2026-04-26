<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Rujukan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RujukanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new RujukanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Rujukan', 'icon' => 'rujukan'],
            ],
            title: 'Rujukan',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_rujukan', 'ID Rujukan'],
                [SHOW, REQUIRED, I::INDEX, 'id_kasus', 'ID Kasus'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_surat', 'Nomor Surat'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_rujukan', 'Tanggal Rujukan'],
                [SHOW, REQUIRED, I::INDEX, 'id_fasyankes', 'ID Fasyankes Tujuan'],
            ],
        );
    }   
}
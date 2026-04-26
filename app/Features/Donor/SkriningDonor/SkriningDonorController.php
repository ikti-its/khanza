<?php
declare(strict_types=1);

namespace App\Features\Donor\SkriningDonor;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class SkriningDonorController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new SkriningDonorModel(),
            breadcrumbs: [
                ['Donor', 'donor'],
                ['Skrining Donor', 'skrining_donor'],
            ],
            title: 'Skrining Donor',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_skrining', 'ID Skrining'],
                [SHOW, REQUIRED, I::INDEX, 'id_kunjungan', 'ID Kunjungan'],
                [SHOW, REQUIRED, I::NUMBER, 'sistolik', 'Tekanan Sistolik'],
                [SHOW, REQUIRED, I::NUMBER, 'diastolik', 'Tekanan Diastolik'],
                [SHOW, REQUIRED, I::FLOAT, 'berat_badan', 'Berat Badan'],
                [SHOW, REQUIRED, I::FLOAT, 'kadar_hemoglobin', 'Kadar Hemoglobin'],
                [SHOW, REQUIRED, I::TEMP, 'suhu_tubuh', 'Suhu'],
                [SHOW, REQUIRED, I::INDEX, 'id_hasil_anamnesis', 'ID Hasil Anamnesis'],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\BPJS;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class BPJSController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new BPJSModel(),
            breadcrumbs: [
                ['User', 'user'],
                ['BPJS', 'bpjs'],
            ],
            title: 'BPJS',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                // [SHOW, REQUIRED, I::INDEX, 'no_bpjs', 'Nomor BPJS'],
                [SHOW, REQUIRED, I::TEXT, 'nama_program', 'Program'],
                [SHOW, REQUIRED, I::SELECT, 'penyelenggara', 'Penyelenggara'],
                [SHOW, REQUIRED, I::NUMBER, 'tarif', 'Tarif (%)'],
                [SHOW, REQUIRED, I::MONEY, 'batas_atas', 'Limit'],
                [SHOW, REQUIRED, I::MONEY, 'batas_bawah', 'Threshold'],
            ],
        );
    }   
}
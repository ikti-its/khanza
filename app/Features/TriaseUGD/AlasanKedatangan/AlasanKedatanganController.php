<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlasanKedatangan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class AlasanKedatanganController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new AlasanKedatanganModel(),
            [
                ['Triase UGD', 'triase_ugd'],
                ['Alasan Kedatangan', 'alasan_kedatangan'],
            ],
            'Alasan Kedatangan',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_alasan', 'ID Alasan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_alasan', 'Nama Alasan Kedatangan'],
            ],
        );
    }   
}
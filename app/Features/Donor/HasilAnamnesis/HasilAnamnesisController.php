<?php
declare(strict_types=1);

namespace App\Features\Donor\HasilAnamnesis;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class HasilAnamnesisController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new HasilAnamnesisModel(),
            breadcrumbs: [
                ['Donor', 'donor'],
                ['Hasil Anamnesis', 'hasil_anamnesis'],
            ],
            title: 'Hasil Anamnesis',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_hasil', 'ID Hasil'],
                [SHOW, REQUIRED, I::TEXT, 'nama_hasil', 'Nama Hasil'],
            ],
        );
    }   
}
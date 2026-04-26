<?php
declare(strict_types=1);

namespace App\Features\Donor\HasilAnamnesis;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class HasilAnamnesisController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new HasilAnamnesisModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Hasil Anamnesis', 'icon' => 'hasil_anamnesis'],
            ],
            title: 'Hasil Anamnesis',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_hasil', 'ID Hasil'],
                [SHOW, REQUIRED, I::TEXT, 'nama_hasil', 'Nama Hasil'],
            ],
        );
    }   
}
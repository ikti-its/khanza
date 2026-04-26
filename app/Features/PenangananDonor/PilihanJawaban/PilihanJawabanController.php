<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PilihanJawaban;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PilihanJawabanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PilihanJawabanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Pilihan Jawaban', 'icon' => 'pilihan_jawaban'],
            ],
            title: 'Pilihan Jawaban',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pilihan', 'ID Pilihan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_pilihan', 'Nama Pilihan'],
            ],
        );
    }   
}
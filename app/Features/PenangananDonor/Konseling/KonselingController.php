<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Konseling;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class KonselingController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new KonselingModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Konseling', 'icon' => 'konseling'],
            ],
            title: 'Konseling',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_konseling', 'ID Konseling'],
                [SHOW, REQUIRED, I::INDEX, 'id_kasus', 'ID Kasus'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_konseling', 'Tanggal Konseling'],
                [SHOW, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
            ],
        );
    }   
}
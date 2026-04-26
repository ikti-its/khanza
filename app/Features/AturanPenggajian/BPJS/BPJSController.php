<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\BPJS;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class BPJSController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new BPJSModel(),
            breadcrumbs: [
                ['title' => 'User', 'icon' => 'user'],
                ['title' => 'BPJS', 'icon' => 'bpjs'],
            ],
            title: 'BPJS',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
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
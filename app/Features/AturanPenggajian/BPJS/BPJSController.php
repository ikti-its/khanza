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
            judul: 'BPJS',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                // [SHOW, 'Nomor BPJS', 'no_bpjs', I::INDEX, REQUIRED],
                [SHOW, 'Program', 'nama_program', I::TEXT, REQUIRED],
                [SHOW, 'Penyelenggara', 'penyelenggara', I::SELECT, REQUIRED],
                [SHOW, 'Tarif (%)', 'tarif', I::NUMBER, REQUIRED],
                [SHOW, 'Limit', 'batas_atas', I::MONEY, REQUIRED],
                [SHOW, 'Threshold', 'batas_bawah', I::MONEY, REQUIRED],
            ],
        );
    }   
}
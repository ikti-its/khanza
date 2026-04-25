<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\BPJS;
use App\Core\Controller\ControllerTemplate;

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
                // [SHOW, 'Nomor BPJS', 'no_bpjs', 'indeks', REQUIRED],
                [SHOW, 'Program', 'nama_program', 'teks', REQUIRED],
                [SHOW, 'Penyelenggara', 'penyelenggara', 'status', REQUIRED],
                [SHOW, 'Tarif (%)', 'tarif', 'jumlah', REQUIRED],
                [SHOW, 'Limit', 'batas_atas', 'uang', REQUIRED],
                [SHOW, 'Threshold', 'batas_bawah', 'uang', REQUIRED],
            ],
        );
    }   
}
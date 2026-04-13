<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\BPJS;
use App\Core\Controller\ControllerTemplate;

class BPJSController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new BPJSModel(),
            breadcrumbs: [
                ['title' => 'User', 'icon' => 'user'],
                ['title' => 'BPJS2', 'icon' => 'bpjs'],
            ],
            judul: 'BPJS',
            aksi: [
                'tambah' => false,
                'audit'  => true,
                'ubah'  => true, 
                'hapus' => true],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [1, 'Nomor BPJS', 'no_bpjs', 'indeks', 1],
                [1, 'Program', 'nama_program', 'teks', 1],
                [1, 'Penyelenggara', 'penyelenggara', 'status', 1],
                [1, 'Tarif (%)', 'tarif', 'jumlah', 1],
                [1, 'Limit', 'batas_atas', 'uang', 1],
                [1, 'Threshold', 'batas_bawah', 'uang', 1],
            ],
        );
    }   
}
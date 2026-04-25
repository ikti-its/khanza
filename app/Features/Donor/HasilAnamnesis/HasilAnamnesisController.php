<?php
declare(strict_types=1);

namespace App\Features\Donor\HasilAnamnesis;
use App\Core\Controller\ControllerTemplate;

final class HasilAnamnesisController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new HasilAnamnesisModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Hasil Anamnesis', 'icon' => 'hasil_anamnesis'],
            ],
            judul: 'Hasil Anamnesis',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Hasil', 'id_hasil', 'indeks', 0],
                [1, 'Nama Hasil', 'nama_hasil', 'teks', 1],
            ],
        );
    }   
}
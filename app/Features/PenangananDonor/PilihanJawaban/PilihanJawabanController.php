<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PilihanJawaban;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PilihanJawabanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PilihanJawabanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Pilihan Jawaban', 'icon' => 'pilihan_jawaban'],
            ],
            judul: 'Pilihan Jawaban',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, OPTIONAL, I::INDEX, 'id_pilihan', 'ID Pilihan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_pilihan', 'Nama Pilihan'],
            ],
        );
    }   
}
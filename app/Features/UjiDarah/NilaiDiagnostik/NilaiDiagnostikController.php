<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiDiagnostik;
use App\Core\Controller\ControllerTemplate;

class NilaiDiagnostikController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new NilaiDiagnostikModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Nilai Diagnostik', 'icon' => 'nilai_diagnostik'],
            ],
            judul: 'Nilai Diagnostik',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Nilai Diagnostik', 'id_nilai_diagnostik', 'indeks', 0],
                [1, 'Nama Nilai Diagnostik', 'nama_nilai_diagnostik', 'teks', 1],
            ],
        );
    }   
}
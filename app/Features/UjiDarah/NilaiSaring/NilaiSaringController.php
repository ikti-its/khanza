<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiSaring;
use App\Core\Controller\ControllerTemplate;

final class NilaiSaringController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new NilaiSaringModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Nilai Saring', 'icon' => 'nilai_saring'],
            ],
            judul: 'Nilai Saring',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Nilai Saring', 'id_nilai_saring', 'indeks', 0],
                [1, 'Nama Nilai Saring', 'nama_nilai_saring', 'teks', 1],
            ],
        );
    }   
}
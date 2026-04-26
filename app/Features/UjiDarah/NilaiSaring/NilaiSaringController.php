<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiSaring;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class NilaiSaringController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, OPTIONAL, I::INDEX, 'id_nilai_saring', 'ID Nilai Saring'],
                [SHOW, REQUIRED, I::TEXT, 'nama_nilai_saring', 'Nama Nilai Saring'],
            ],
        );
    }   
}
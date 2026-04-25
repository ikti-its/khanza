<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiDiagnostik;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class NilaiDiagnostikController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Nilai Diagnostik', 'id_nilai_diagnostik', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Nilai Diagnostik', 'nama_nilai_diagnostik', I::TEXT, REQUIRED],
            ],
        );
    }   
}
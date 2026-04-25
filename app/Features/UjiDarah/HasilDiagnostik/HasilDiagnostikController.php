<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostik;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class HasilDiagnostikController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new HasilDiagnostikModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Hasil Diagnostik', 'icon' => 'hasil_diagnostik'],
            ],
            judul: 'Hasil Diagnostik',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Diagnostik', 'id_diagnostik', 'indeks', OPTIONAL],
                [SHOW, 'ID Rujukan', 'id_rujukan', 'indeks', REQUIRED],
                [SHOW, 'Tanggal Hasil', 'tanggal_hasil', 'tanggal', REQUIRED],
                [SHOW, 'Dokter Pemeriksa', 'dokter_pemeriksa', 'nama', REQUIRED],
            ],
        );
    }   
}
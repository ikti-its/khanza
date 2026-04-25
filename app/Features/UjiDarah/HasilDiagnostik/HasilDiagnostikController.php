<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostik;
use App\Core\Controller\ControllerTemplate;

final class HasilDiagnostikController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Diagnostik', 'id_diagnostik', 'indeks', 0],
                [1, 'ID Rujukan', 'id_rujukan', 'indeks', 1],
                [1, 'Tanggal Hasil', 'tanggal_hasil', 'tanggal', 1],
                [1, 'Dokter Pemeriksa', 'dokter_pemeriksa', 'nama', 1],
            ],
        );
    }   
}
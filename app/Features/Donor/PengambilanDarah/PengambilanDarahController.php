<?php
declare(strict_types=1);

namespace App\Features\Donor\PengambilanDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PengambilanDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PengambilanDarahModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Pengambilan Darah', 'icon' => 'pengambilan_darah'],
            ],
            judul: 'Pengambilan Darah',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Pengambilan Darah', 'id_pengambilan_darah', I::INDEX, OPTIONAL],
                [SHOW, 'Nomor Pengambilan', 'nomor_pengambilan', I::TEXT, REQUIRED],
                [SHOW, 'ID Kunjungan', 'id_kunjungan', I::INDEX, REQUIRED],
                [SHOW, 'Tanggal Pengambilan', 'tanggal_pengambilan', I::DATE, REQUIRED],
                [SHOW, 'ID Shift', 'id_shift', I::INDEX, REQUIRED],
                [HIDE, 'ID Jenis Donor', 'id_jenis_donor', I::INDEX, REQUIRED],
                [SHOW, 'ID Lokasi Pengambilan', 'id_lokasi_pengambilan', I::INDEX, REQUIRED],
                [HIDE, 'ID Petugas', 'id_petugas', I::INDEX, REQUIRED],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;
use App\Core\Controller\ControllerTemplate;

final class TriasePemeriksaanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new TriasePemeriksaanModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Triase Pemeriksaan', 'icon' => 'triase_pemeriksaan'],
            ],
            judul: 'Triase Pemeriksaan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Pemeriksaan', 'id_pemeriksaan', 'indeks', OPTIONAL],
                [SHOW, 'Kode', 'kode_pemeriksaan', 'teks', REQUIRED],
                [SHOW, 'Nama Pemeriksaan', 'nama_pemeriksaan', 'teks', REQUIRED],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;
use App\Core\Controller\ControllerTemplate;

class TriasePemeriksaanController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Pemeriksaan', 'id_pemeriksaan', 'indeks', 0],
                [1, 'Kode', 'kode_pemeriksaan', 'teks', 1],
                [1, 'Nama Pemeriksaan', 'nama_pemeriksaan', 'teks', 1],
            ],
        );
    }   
}
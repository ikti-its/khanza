<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseSkala;
use App\Core\Controller\ControllerTemplate;

class TriaseSkalaController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new TriaseSkalaModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Triase Skala', 'icon' => 'triase_skala'],
            ],
            judul: 'Triase Skala',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Skala', 'id_skala', 'indeks', 0],
                [1, 'ID Tingkat Skala', 'id_tingkat_skala', 'indeks', 1],
                [1, 'Kode', 'kode_skala', 'teks', 1],
                [1, 'ID Pemeriksaan', 'id_pemeriksaan', 'indeks', 1],
                [1, 'Pengkajian', 'pengkajian', 'teks', 1],
            ],
        );
    }   
}
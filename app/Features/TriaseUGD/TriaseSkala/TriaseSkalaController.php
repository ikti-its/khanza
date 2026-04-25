<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseSkala;
use App\Core\Controller\ControllerTemplate;

final class TriaseSkalaController extends ControllerTemplate
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
                [HIDE, 'ID Skala', 'id_skala', 'indeks', OPTIONAL],
                [SHOW, 'ID Tingkat Skala', 'id_tingkat_skala', 'indeks', REQUIRED],
                [SHOW, 'Kode', 'kode_skala', 'teks', REQUIRED],
                [SHOW, 'ID Pemeriksaan', 'id_pemeriksaan', 'indeks', REQUIRED],
                [SHOW, 'Pengkajian', 'pengkajian', 'teks', REQUIRED],
            ],
        );
    }   
}
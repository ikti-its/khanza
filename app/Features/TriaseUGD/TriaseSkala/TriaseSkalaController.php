<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseSkala;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class TriaseSkalaController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Skala', 'id_skala', I::INDEX, OPTIONAL],
                [SHOW, 'ID Tingkat Skala', 'id_tingkat_skala', I::INDEX, REQUIRED],
                [SHOW, 'Kode', 'kode_skala', I::TEXT, REQUIRED],
                [SHOW, 'ID Pemeriksaan', 'id_pemeriksaan', I::INDEX, REQUIRED],
                [SHOW, 'Pengkajian', 'pengkajian', I::TEXT, REQUIRED],
            ],
        );
    }   
}
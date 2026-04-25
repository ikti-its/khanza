<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlasanKedatangan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class AlasanKedatanganController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new AlasanKedatanganModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Alasan Kedatangan', 'icon' => 'alasan_kedatangan'],
            ],
            judul: 'Alasan Kedatangan',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Alasan', 'id_alasan', 'indeks', OPTIONAL],
                [SHOW, 'Nama Alasan Kedatangan', 'nama_alasan', 'teks', REQUIRED],
            ],
        );
    }   
}
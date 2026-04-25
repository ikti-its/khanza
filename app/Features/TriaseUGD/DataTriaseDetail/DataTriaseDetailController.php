<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseDetail;
use App\Core\Controller\ControllerTemplate;

final class DataTriaseDetailController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new DataTriaseDetailModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Data Triase Detail', 'icon' => 'data_triase_detail'],
            ],
            judul: 'Data Triase Detail',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Triase Detail', 'id_triase_detail', 'indeks', OPTIONAL],
                [SHOW, 'ID Triase', 'id_triase', 'indeks', REQUIRED],
                [SHOW, 'ID Skala', 'id_skala', 'indeks', REQUIRED],
            ],
        );
    }   
}
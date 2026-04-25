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
                [0, 'ID Triase Detail', 'id_triase_detail', 'indeks', 0],
                [1, 'ID Triase', 'id_triase', 'indeks', 1],
                [1, 'ID Skala', 'id_skala', 'indeks', 1],
            ],
        );
    }   
}
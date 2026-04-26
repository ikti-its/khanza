<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class DataTriaseDetailController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, OPTIONAL, I::INDEX, 'id_triase_detail', 'ID Triase Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_triase', 'ID Triase'],
                [SHOW, REQUIRED, I::INDEX, 'id_skala', 'ID Skala'],
            ],
        );
    }   
}
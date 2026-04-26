<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarahDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PenyerahanDarahDetailController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PenyerahanDarahDetailModel(),
            breadcrumbs: [
                ['title' => 'Pelayanan Darah', 'icon' => 'pelayanan_darah'],
                ['title' => 'Penyerahan Darah Detail', 'icon' => 'penyerahan_darah_detail'],
            ],
            title: 'Penyerahan Darah Detail',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => false,
                'hapus'  => true
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_penyerahan_detail', 'ID Penyerahan Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_penyerahan', 'ID Penyerahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_stok_darah', 'ID Stok Darah'],
                [SHOW, REQUIRED, I::MONEY, 'jasa_sarana', 'Jasa Sarana'],
                [SHOW, REQUIRED, I::MONEY, 'paket_bhp', 'Paket BHP'],
                [SHOW, REQUIRED, I::MONEY, 'kso', 'KSO'],
                [SHOW, REQUIRED, I::MONEY, 'manajemen', 'Manajemen'],
            ],
        );
    }   
}
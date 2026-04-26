<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarahDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PenyerahanDarahDetailController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PenyerahanDarahDetailModel(),
            breadcrumbs: [
                ['Pelayanan Darah', 'pelayanan_darah'],
                ['Penyerahan Darah Detail', 'penyerahan_darah_detail'],
            ],
            title: 'Penyerahan Darah Detail',
            action: [
                A::CREATE,
                A::AUDIT,
                // A::UPDATE,
                A::DELETE,
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
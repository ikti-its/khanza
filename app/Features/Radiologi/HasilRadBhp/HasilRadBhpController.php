<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadBhp;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class HasilRadBhpController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilRadBhpModel(),
            breadcrumbs: [
                ['Radiologi', 'radiologi'],
                ['Hasil Radiologi BHP', 'hasil_rad_bhp'],
            ],
            title: 'Hasil Radiologi BHP',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_rad_bhp', 'ID Radiologi BHP'],
                [SHOW, REQUIRED, I::INDEX, 'id_hasil_rad', 'ID Hasil Rad'],
                [SHOW, REQUIRED, I::INDEX, 'id_barang_medis', 'ID Barang Medis'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah_pakai', 'Jumlah Pakai'],
                [SHOW, REQUIRED, I::TEXT, 'satuan', 'Satuan'],
                [SHOW, REQUIRED, I::MONEY, 'harga_satuan', 'Harga Satuan'],
            ],
        );
    }
}
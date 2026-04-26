<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpnameDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class StokOpnameDetailController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new StokOpnameDetailModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Stok Opname',         'icon' => 'stok_opname'],
                ['title' => 'Detail',              'icon' => 'detail'],
            ],
            title: 'Detail Stok Opname',
            action: [
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_detail', 'ID Detail'],
                [HIDE, OPTIONAL, I::INDEX, 'id_opname', 'ID Opname'],
                [SHOW, REQUIRED, I::SELECT, 'id_barang', 'Barang'],
                [SHOW, REQUIRED, I::NUMBER, 'stok_sistem', 'Stok Sistem'],
                [SHOW, REQUIRED, I::NUMBER, 'stok_fisik', 'Stok Fisik'],
                [SHOW, OPTIONAL, I::NUMBER, 'selisih', 'Selisih'],
                [SHOW, OPTIONAL, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }
}

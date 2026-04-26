<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Supplier;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class SupplierController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new SupplierModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Supplier',            'supplier'],
            ],
            'Supplier',
            [
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_supplier', 'ID Supplier'],
                [SHOW, REQUIRED, I::NAME, 'nama_supplier', 'Nama Supplier'],
                [SHOW, OPTIONAL, I::TEXT, 'no_telp', 'No. Telepon'],
                [HIDE, OPTIONAL, I::INDEX, 'id_alamat', 'ID Alamat'],
            ],
        );
    }
}

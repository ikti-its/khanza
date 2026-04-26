<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpname;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class StokOpnameController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new StokOpnameModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Stok Opname',         'stok_opname'],
            ],
            'Stok Opname',
            [
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_opname', 'ID Opname'],
                [SHOW, REQUIRED, I::DATE,  'tanggal', 'Tanggal'],
                [SHOW, OPTIONAL, I::SELECT,'status',  'Status'],
                [SHOW, OPTIONAL, I::TEXT, 'catatan', 'Catatan'],
                [SHOW, OPTIONAL, I::TEXT, 'catatan_atasan', 'Catatan Atasan'],
            ],
        );
    }
}

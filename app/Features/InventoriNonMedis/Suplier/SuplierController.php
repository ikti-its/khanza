<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Suplier;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class SuplierController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new SuplierModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Suplier',             'suplier'],
            ],
            'Suplier',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_suplier', 'ID Suplier'],
                [SHOW, REQUIRED, I::NAME, 'nama_suplier', 'Nama Suplier'],
                [SHOW, OPTIONAL, I::TEXT, 'no_telp', 'No. Telepon'],
                [HIDE, OPTIONAL, I::INDEX, 'id_alamat', 'ID Alamat'],
            ],
        );
    }
}

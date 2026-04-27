<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\JenisBarang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class JenisBarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new JenisBarangModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Jenis Barang',        'jenis_barang'],
            ],
            'Jenis Barang',
            [
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_barang'  ,'ID'],
                [SHOW, REQUIRED, I::NAME,  'nama_jenis_barang','Nama Jenis Barang'],
            ],
        );
    }
}

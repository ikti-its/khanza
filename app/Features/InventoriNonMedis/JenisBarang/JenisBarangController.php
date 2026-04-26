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
                A::DELETE,,
            ],
            [
                [HIDE, 'ID',               'id_jenis_barang',   I::INDEX, OPTIONAL],
                [SHOW, 'Nama Jenis Barang','nama_jenis_barang',  I::NAME,   REQUIRED],
            ],
        );
    }
}

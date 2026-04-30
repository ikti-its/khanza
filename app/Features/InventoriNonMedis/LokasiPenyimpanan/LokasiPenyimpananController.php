<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\LokasiPenyimpanan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class LokasiPenyimpananController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new LokasiPenyimpananModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Lokasi Penyimpanan',  'lokasi-penyimpanan'],
            ],
            'Lokasi Penyimpanan',
            [
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_lokasi_penyimpanan', 'ID'],
                [SHOW, REQUIRED, I::NAME, 'nama_lokasi_penyimpanan', 'Nama Lokasi Penyimpanan'],
            ],
        );
    }
}

<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\PemisahanKomponen;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PemisahanKomponenController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PemisahanKomponenModel(),
            breadcrumbs: [
                ['Inventaris Darah', 'inventaris_darah'],
                ['Pemisahan Komponen', 'pemisahan_komponen'],
            ],
            title: 'Pemisahan Komponen',
            action: [
                A::CREATE,
                A::AUDIT,
                // A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pemisahan', 'ID Pemisahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_bag', 'ID Bag'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_pemisahan', 'Tanggal Pemisahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_shift', 'ID Shift'],
                [SHOW, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\TarifKomponen;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class TarifKomponenController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new TarifKomponenModel(),
            breadcrumbs: [
                ['Inventaris Darah', 'inventaris_darah'],
                ['Tarif Komponen', 'tarif_komponen'],
            ],
            title: 'Tarif Komponen',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_tarif', 'ID Tarif'],
                [SHOW, REQUIRED, I::INDEX, 'id_komponen', 'ID Komponen'],
                [SHOW, REQUIRED, I::MONEY, 'jasa_sarana', 'Jasa Sarana'],
                [SHOW, REQUIRED, I::MONEY, 'paket_bhp', 'Paket BHP'],
                [SHOW, REQUIRED, I::MONEY, 'kso', 'KSO'],
                [SHOW, REQUIRED, I::MONEY, 'manajemen', 'Manajemen'],
                [HIDE, REQUIRED, I::MONEY, 'pembatalan', 'Pembatalan'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_berlaku', 'Tanggal Berlaku'],
            ],
        );
    }   
}
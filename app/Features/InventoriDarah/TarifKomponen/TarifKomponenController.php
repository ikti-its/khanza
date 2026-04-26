<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\TarifKomponen;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class TarifKomponenController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new TarifKomponenModel(),
            breadcrumbs: [
                ['title' => 'Inventaris Darah', 'icon' => 'inventaris_darah'],
                ['title' => 'Tarif Komponen', 'icon' => 'tarif_komponen'],
            ],
            title: 'Tarif Komponen',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
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
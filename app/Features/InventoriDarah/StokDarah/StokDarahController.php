<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StokDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class StokDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StokDarahModel(),
            breadcrumbs: [
                ['Inventaris Darah', 'inventaris_darah'],
                ['Stok Darah', 'stok_darah'],
            ],
            title: 'Stok Darah',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_stok_darah', 'ID Stok Darah'],
                [HIDE, OPTIONAL, I::INDEX, 'id_pemisahan', 'ID Pemisahan'],
                [SHOW, REQUIRED, I::TEXT, 'no_kantong', 'Nomor Kantong'],
                [HIDE, REQUIRED, I::INDEX, 'id_komponen', 'ID Komponen'],
                [SHOW, REQUIRED, I::INDEX, 'id_golongan_darah', 'ID Golongan Darah'],
                [SHOW, REQUIRED, I::INDEX, 'id_rhesus', 'ID Rhesus'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_pengambilan', 'Tanggal Pengambilan'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_kadaluarsa', 'Tanggal Kadaluarsa'],
                [SHOW, REQUIRED, I::INDEX, 'id_sumber_darah', 'ID Sumber Darah'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_stok', 'ID Status Stok'],
            ],
        );
    }   
}
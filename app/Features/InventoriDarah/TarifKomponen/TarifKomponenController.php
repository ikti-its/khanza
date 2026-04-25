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
            judul: 'Tarif Komponen',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Tarif', 'id_tarif', I::INDEX, OPTIONAL],
                [SHOW, 'ID Komponen', 'id_komponen', I::INDEX, REQUIRED],
                [SHOW, 'Jasa Sarana', 'jasa_sarana', I::MONEY, REQUIRED],
                [SHOW, 'Paket BHP', 'paket_bhp', I::MONEY, REQUIRED],
                [SHOW, 'KSO', 'kso', I::MONEY, REQUIRED],
                [SHOW, 'Manajemen', 'manajemen', I::MONEY, REQUIRED],
                [HIDE, 'Pembatalan', 'pembatalan', I::MONEY, REQUIRED],
                [SHOW, 'Tanggal Berlaku', 'tanggal_berlaku', I::DATE, REQUIRED],
            ],
        );
    }   
}
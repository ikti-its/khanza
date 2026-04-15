<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\TarifKomponen;
use App\Core\Controller\ControllerTemplate;

class TarifKomponenController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Tarif', 'id_tarif', 'indeks', 0],
                [1, 'ID Komponen', 'id_komponen', 'indeks', 1],
                [1, 'Jasa Sarana', 'jasa_sarana', 'uang', 1],
                [1, 'Paket BHP', 'paket_bhp', 'uang', 1],
                [1, 'KSO', 'kso', 'uang', 1],
                [1, 'Manajemen', 'manajemen', 'uang', 1],
                [1, 'Pembatalan', 'pembatalan', 'uang', 1],
                [1, 'Tanggal Berlaku', 'tanggal_berlaku', 'tanggal', 1],
            ],
        );
    }   
}
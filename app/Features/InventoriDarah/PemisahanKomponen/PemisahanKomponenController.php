<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\PemisahanKomponen;
use App\Core\Controller\ControllerTemplate;

final class PemisahanKomponenController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new PemisahanKomponenModel(),
            breadcrumbs: [
                ['title' => 'Inventaris Darah', 'icon' => 'inventaris_darah'],
                ['title' => 'Pemisahan Komponen', 'icon' => 'pemisahan_komponen'],
            ],
            judul: 'Pemisahan Komponen',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => false, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Pemisahan', 'id_pemisahan', 'indeks', 0],
                [1, 'ID Bag', 'id_bag', 'indeks', 1],
                [1, 'Tanggal Pemisahan', 'tanggal_pemisahan', 'tanggal', 1],
                [1, 'ID Shift', 'id_shift', 'indeks', 1],
                [1, 'ID Petugas', 'id_petugas', 'indeks', 1],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarahDetail;
use App\Core\Controller\ControllerTemplate;

final class PenyerahanDarahDetailController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new PenyerahanDarahDetailModel(),
            breadcrumbs: [
                ['title' => 'Pelayanan Darah', 'icon' => 'pelayanan_darah'],
                ['title' => 'Penyerahan Darah Detail', 'icon' => 'penyerahan_darah_detail'],
            ],
            judul: 'Penyerahan Darah Detail',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => false,
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Penyerahan Detail', 'id_penyerahan_detail', 'indeks', 0],
                [1, 'ID Penyerahan', 'id_penyerahan', 'indeks', 1],
                [1, 'ID Stok Darah', 'id_stok_darah', 'indeks', 1],
                [1, 'Jasa Sarana', 'jasa_sarana', 'uang', 1],
                [1, 'Paket BHP', 'paket_bhp', 'uang', 1],
                [1, 'KSO', 'kso', 'uang', 1],
                [1, 'Manajemen', 'manajemen', 'uang', 1],
            ],
        );
    }   
}
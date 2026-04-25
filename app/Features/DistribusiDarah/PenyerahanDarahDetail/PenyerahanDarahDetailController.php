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
                [HIDE, 'ID Penyerahan Detail', 'id_penyerahan_detail', 'indeks', OPTIONAL],
                [SHOW, 'ID Penyerahan', 'id_penyerahan', 'indeks', REQUIRED],
                [SHOW, 'ID Stok Darah', 'id_stok_darah', 'indeks', REQUIRED],
                [SHOW, 'Jasa Sarana', 'jasa_sarana', 'uang', REQUIRED],
                [SHOW, 'Paket BHP', 'paket_bhp', 'uang', REQUIRED],
                [SHOW, 'KSO', 'kso', 'uang', REQUIRED],
                [SHOW, 'Manajemen', 'manajemen', 'uang', REQUIRED],
            ],
        );
    }   
}
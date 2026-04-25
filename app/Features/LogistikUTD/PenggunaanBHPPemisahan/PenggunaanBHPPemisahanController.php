<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPPemisahan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PenggunaanBHPPemisahanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PenggunaanBHPPemisahanModel(),
            breadcrumbs: [
                ['title' => 'Logistik UTD', 'icon' => 'logistik_utd'],
                ['title' => 'Penggunaan BHP Pemisahan', 'icon' => 'penggunaan_bhp_pemisahan'],
            ],
            judul: 'Penggunaan BHP Pemisahan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => false, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID BHP Pemisahan', 'id_bhp_pemisahan', I::INDEX, OPTIONAL],
                [SHOW, 'ID Pemisahan', 'id_pemisahan', I::INDEX, REQUIRED],
                [SHOW, 'ID Jenis BHP', 'id_jenis_bhp', I::INDEX, REQUIRED],
                [SHOW, 'ID Barang Medis', 'id_barang_medis', I::INDEX, OPTIONAL],
                [SHOW, 'ID Barang Non Medis', 'id_barang_penunjang', I::INDEX, OPTIONAL],
                [SHOW, 'Jumlah', 'jumlah', I::NUMBER, REQUIRED],
                [SHOW, 'Harga', 'harga', I::MONEY, REQUIRED],
            ],
        );
    }   
}
<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPPenyerahan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PenggunaanBHPPenyerahanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PenggunaanBHPPenyerahanModel(),
            breadcrumbs: [
                ['title' => 'Logistik UTD', 'icon' => 'logistik_utd'],
                ['title' => 'Penggunaan BHP Penyerahan', 'icon' => 'penggunaan_bhp_penyerahan'],
            ],
            judul: 'Penggunaan BHP Penyerahan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, OPTIONAL, I::INDEX, 'id_bhp_penyerahan', 'ID BHP Penyerahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_penyerahan', 'ID Penyerahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_jenis_bhp', 'ID Jenis BHP'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_medis', 'ID Barang Medis'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_penunjang', 'ID Barang Non Medis'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga', 'Harga'],
            ],
        );
    }   
}
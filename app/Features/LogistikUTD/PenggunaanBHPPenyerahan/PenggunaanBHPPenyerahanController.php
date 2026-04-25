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
                [HIDE, 'ID BHP Penyerahan', 'id_bhp_penyerahan', I::INDEX, OPTIONAL],
                [SHOW, 'ID Penyerahan', 'id_penyerahan', I::INDEX, REQUIRED],
                [SHOW, 'ID Jenis BHP', 'id_jenis_bhp', I::INDEX, REQUIRED],
                [SHOW, 'ID Barang Medis', 'id_barang_medis', I::INDEX, OPTIONAL],
                [SHOW, 'ID Barang Non Medis', 'id_barang_penunjang', I::INDEX, OPTIONAL],
                [SHOW, 'Jumlah', 'jumlah', I::NUMBER, REQUIRED],
                [SHOW, 'Harga', 'harga', I::MONEY, REQUIRED],
            ],
        );
    }   
}
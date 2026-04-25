<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPDonor;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PenggunaanBHPDonorController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PenggunaanBHPDonorModel(),
            breadcrumbs: [
                ['title' => 'Logistik UTD', 'icon' => 'logistik_utd'],
                ['title' => 'Penggunaan BHP Donor', 'icon' => 'penggunaan_bhp_donor'],
            ],
            judul: 'Penggunaan BHP Donor',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID BHP Donor', 'id_bhp_donor', I::INDEX, OPTIONAL],
                [SHOW, 'ID Pengambilan Darah', 'id_pengambilan_darah', I::INDEX, REQUIRED],
                [SHOW, 'ID Jenis BHP', 'id_jenis_bhp', I::INDEX, REQUIRED],
                [SHOW, 'ID Barang Medis', 'id_barang_medis', I::INDEX, OPTIONAL],
                [SHOW, 'ID Barang Non Medis', 'id_barang_penunjang', I::INDEX, OPTIONAL],
                [SHOW, 'Jumlah', 'jumlah', I::NUMBER, REQUIRED],
                [SHOW, 'Harga', 'harga', I::MONEY, REQUIRED],
            ],
        );
    }   
}
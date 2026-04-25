<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\BHPRusak;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class BHPRusakController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new BHPRusakModel(),
            breadcrumbs: [
                ['title' => 'Logistik UTD', 'icon' => 'logistik_utd'],
                ['title' => 'BHP Rusak', 'icon' => 'bhp_rusak'],
            ],
            judul: 'BHP Rusak',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => false,
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID BHP Rusak', 'id_bhp_rusak', I::INDEX, OPTIONAL],
                [SHOW, 'ID Jenis BHP', 'id_jenis_bhp', I::INDEX, REQUIRED],
                [SHOW, 'ID Barang Medis', 'id_barang_medis', I::INDEX, OPTIONAL],
                [SHOW, 'ID Barang Non Medis', 'id_barang_penunjang', I::INDEX, OPTIONAL],
                [SHOW, 'Jumlah', 'jumlah', I::NUMBER, REQUIRED],
                [SHOW, 'Harga Beli', 'harga_beli', I::MONEY, REQUIRED],
                [HIDE, 'ID Petugas', 'id_petugas', I::INDEX, REQUIRED],
                [SHOW, 'Tanggal Rusak', 'tanggal_rusak', 'tanggal_jam', REQUIRED],
                [SHOW, 'Keterangan', 'keterangan', I::TEXT, REQUIRED],
            ],
        );
    }   
}
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
                [HIDE, OPTIONAL, I::INDEX, 'id_bhp_rusak', 'ID BHP Rusak'],
                [SHOW, REQUIRED, I::INDEX, 'id_jenis_bhp', 'ID Jenis BHP'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_medis', 'ID Barang Medis'],
                [SHOW, OPTIONAL, I::INDEX, 'id_barang_penunjang', 'ID Barang Non Medis'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga_beli', 'Harga Beli'],
                [HIDE, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
                [SHOW, REQUIRED, I::DTIME, 'tanggal_rusak', 'Tanggal Rusak'],
                [SHOW, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }   
}
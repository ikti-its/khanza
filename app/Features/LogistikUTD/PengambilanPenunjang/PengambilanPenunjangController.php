<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanPenunjang;
use App\Core\Controller\ControllerTemplate;

final class PengambilanPenunjangController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new PengambilanPenunjangModel(),
            breadcrumbs: [
                ['title' => 'Logistik UTD', 'icon' => 'logistik_utd'],
                ['title' => 'Pengambilan BHP Non Medis', 'icon' => 'pengambilan_bhp_non_medis'],
            ],
            judul: 'Pengambilan BHP Non Medis',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Pengambilan Penunjang', 'id_pengambilan_penunjang', 'indeks', 0],
                [1, 'ID Barang', 'id_barang', 'indeks', 1],
                [1, 'Jumlah', 'jumlah', 'jumlah', 1],
                [1, 'Harga Beli', 'harga_beli', 'uang', 1],
                [0, 'ID Petugas Gudang', 'id_petugas_gudang', 'indeks', 1],
                [1, 'Tanggal Pengambilan', 'tanggal_pengambilan', 'tanggal_jam', 1],
                [0, 'Keterangan', 'keterangan', 'teks', 1],
            ],
        );
    }   
}
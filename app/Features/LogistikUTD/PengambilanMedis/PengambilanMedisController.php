<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanMedis;
use App\Core\Controller\ControllerTemplate;

final class PengambilanMedisController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new PengambilanMedisModel(),
            breadcrumbs: [
                ['title' => 'Logistik UTD', 'icon' => 'logistik_utd'],
                ['title' => 'Pengambilan BHP Medis', 'icon' => 'pengambilan_bhp_medis'],
            ],
            judul: 'Pengambilan BHP Medis',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Pengambilan Medis', 'id_pengambilan_medis', 'indeks', 0],
                [1, 'ID Barang', 'id_barang', 'indeks', 1],
                [1, 'Jumlah', 'jumlah', 'jumlah', 1],
                [1, 'Harga Beli', 'harga_beli', 'uang', 1],
                [1, 'Nama Bangsal', 'nama_bangsal', 'teks', 1],
                [1, 'Tanggal Pengambilan', 'tanggal_pengambilan', 'tanggal_jam', 1],
                [0, 'Keterangan', 'keterangan', 'teks', 1],
                [0, 'Nomor Batch', 'nomor_batch', 'teks', 0],
                [0, 'Nomor Faktur', 'nomor_faktur', 'teks', 0],
            ],
        );
    }   
}
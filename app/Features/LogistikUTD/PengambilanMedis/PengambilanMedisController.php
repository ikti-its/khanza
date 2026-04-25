<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanMedis;
use App\Core\Controller\ControllerTemplate;

final class PengambilanMedisController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Pengambilan Medis', 'id_pengambilan_medis', 'indeks', OPTIONAL],
                [SHOW, 'ID Barang', 'id_barang', 'indeks', REQUIRED],
                [SHOW, 'Jumlah', 'jumlah', 'jumlah', REQUIRED],
                [SHOW, 'Harga Beli', 'harga_beli', 'uang', REQUIRED],
                [SHOW, 'Nama Bangsal', 'nama_bangsal', 'teks', REQUIRED],
                [SHOW, 'Tanggal Pengambilan', 'tanggal_pengambilan', 'tanggal_jam', REQUIRED],
                [HIDE, 'Keterangan', 'keterangan', 'teks', REQUIRED],
                [HIDE, 'Nomor Batch', 'nomor_batch', 'teks', OPTIONAL],
                [HIDE, 'Nomor Faktur', 'nomor_faktur', 'teks', OPTIONAL],
            ],
        );
    }   
}
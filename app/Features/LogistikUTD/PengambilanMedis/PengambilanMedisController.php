<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanMedis;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, OPTIONAL, I::INDEX, 'id_pengambilan_medis', 'ID Pengambilan Medis'],
                [SHOW, REQUIRED, I::INDEX, 'id_barang', 'ID Barang'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga_beli', 'Harga Beli'],
                [SHOW, REQUIRED, I::TEXT, 'nama_bangsal', 'Nama Bangsal'],
                [SHOW, REQUIRED, 'tanggal_jam', 'tanggal_pengambilan', 'Tanggal Pengambilan'],
                [HIDE, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
                [HIDE, OPTIONAL, I::TEXT, 'nomor_batch', 'Nomor Batch'],
                [HIDE, OPTIONAL, I::TEXT, 'nomor_faktur', 'Nomor Faktur'],
            ],
        );
    }   
}
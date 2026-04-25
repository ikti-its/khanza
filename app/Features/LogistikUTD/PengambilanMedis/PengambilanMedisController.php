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
                [HIDE, 'ID Pengambilan Medis', 'id_pengambilan_medis', I::INDEX, OPTIONAL],
                [SHOW, 'ID Barang', 'id_barang', I::INDEX, REQUIRED],
                [SHOW, 'Jumlah', 'jumlah', I::NUMBER, REQUIRED],
                [SHOW, 'Harga Beli', 'harga_beli', I::MONEY, REQUIRED],
                [SHOW, 'Nama Bangsal', 'nama_bangsal', I::TEXT, REQUIRED],
                [SHOW, 'Tanggal Pengambilan', 'tanggal_pengambilan', 'tanggal_jam', REQUIRED],
                [HIDE, 'Keterangan', 'keterangan', I::TEXT, REQUIRED],
                [HIDE, 'Nomor Batch', 'nomor_batch', I::TEXT, OPTIONAL],
                [HIDE, 'Nomor Faktur', 'nomor_faktur', I::TEXT, OPTIONAL],
            ],
        );
    }   
}
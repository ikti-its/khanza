<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanPenunjang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PengambilanPenunjangController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Pengambilan Penunjang', 'id_pengambilan_penunjang', I::INDEX, OPTIONAL],
                [SHOW, 'ID Barang', 'id_barang', I::INDEX, REQUIRED],
                [SHOW, 'Jumlah', 'jumlah', I::NUMBER, REQUIRED],
                [SHOW, 'Harga Beli', 'harga_beli', I::MONEY, REQUIRED],
                [HIDE, 'ID Petugas Gudang', 'id_petugas_gudang', I::INDEX, REQUIRED],
                [SHOW, 'Tanggal Pengambilan', 'tanggal_pengambilan', 'tanggal_jam', REQUIRED],
                [HIDE, 'Keterangan', 'keterangan', I::TEXT, REQUIRED],
            ],
        );
    }   
}
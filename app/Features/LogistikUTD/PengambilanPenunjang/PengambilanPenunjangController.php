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
                [HIDE, OPTIONAL, I::INDEX, 'id_pengambilan_penunjang', 'ID Pengambilan Penunjang'],
                [SHOW, REQUIRED, I::INDEX, 'id_barang', 'ID Barang'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga_beli', 'Harga Beli'],
                [HIDE, REQUIRED, I::INDEX, 'id_petugas_gudang', 'ID Petugas Gudang'],
                [SHOW, REQUIRED, 'tanggal_jam', 'tanggal_pengambilan', 'Tanggal Pengambilan'],
                [HIDE, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }   
}
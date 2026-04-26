<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PenyerahanDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PenyerahanDarahModel(),
            breadcrumbs: [
                ['title' => 'Pelayanan Darah', 'icon' => 'pelayanan_darah'],
                ['title' => 'Penyerahan Darah', 'icon' => 'penyerahan_darah'],
            ],
            judul: 'Penyerahan Darah',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, OPTIONAL, I::INDEX, 'id_penyerahan', 'ID Penyerahan'],
                [HIDE, REQUIRED, I::INDEX, 'id_permintaan', 'ID Permintaan'],
                [SHOW, REQUIRED, I::TEXT, 'no_penyerahan', 'No. Penyerahan'],
                [SHOW, REQUIRED, I::DTIME, 'tanggal_penyerahan', 'Tanggal Penyerahan'],
                [HIDE, REQUIRED, I::INDEX, 'id_shift', 'ID Shift'],
                [HIDE, REQUIRED, I::INDEX, 'id_petugas_cross', 'ID Petugas Crossmatch'],
                [HIDE, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
                [HIDE, REQUIRED, I::INDEX, 'id_rekening', 'ID Rekening'],
                [SHOW, REQUIRED, I::NAME, 'pengambil_darah', 'Pengambil Darah'],
                [HIDE, REQUIRED, I::TEXT, 'alamat_pengambil', 'Alamat Pengambil'],
                [HIDE, REQUIRED, I::INDEX, 'id_penanggung_jawab', 'ID Penanggung Jawab'],
                [HIDE, REQUIRED, I::FLOAT, 'besar_ppn', 'PPN (%)'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_pembayaran', 'ID Status Pembayaran'],
            ],
        );
    }   
}
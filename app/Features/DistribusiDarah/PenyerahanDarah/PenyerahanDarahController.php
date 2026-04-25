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
                [HIDE, 'ID Penyerahan', 'id_penyerahan', I::INDEX, OPTIONAL],
                [HIDE, 'ID Permintaan', 'id_permintaan', I::INDEX, REQUIRED],
                [SHOW, 'No. Penyerahan', 'no_penyerahan', I::TEXT, REQUIRED],
                [SHOW, 'Tanggal Penyerahan', 'tanggal_penyerahan', 'tanggal_jam', REQUIRED],
                [HIDE, 'ID Shift', 'id_shift', I::INDEX, REQUIRED],
                [HIDE, 'ID Petugas Crossmatch', 'id_petugas_cross', I::INDEX, REQUIRED],
                [HIDE, 'Keterangan', 'keterangan', I::TEXT, REQUIRED],
                [HIDE, 'ID Rekening', 'id_rekening', I::INDEX, REQUIRED],
                [SHOW, 'Pengambil Darah', 'pengambil_darah', I::NAME, REQUIRED],
                [HIDE, 'Alamat Pengambil', 'alamat_pengambil', I::TEXT, REQUIRED],
                [HIDE, 'ID Penanggung Jawab', 'id_penanggung_jawab', I::INDEX, REQUIRED],
                [HIDE, 'PPN (%)', 'besar_ppn', 'desimal', REQUIRED],
                [SHOW, 'ID Status Pembayaran', 'id_status_pembayaran', I::SELECT, REQUIRED],
            ],
        );
    }   
}
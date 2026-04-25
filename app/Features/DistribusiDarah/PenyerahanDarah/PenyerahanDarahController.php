<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarah;
use App\Core\Controller\ControllerTemplate;

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
                [HIDE, 'ID Penyerahan', 'id_penyerahan', 'indeks', OPTIONAL],
                [HIDE, 'ID Permintaan', 'id_permintaan', 'indeks', REQUIRED],
                [SHOW, 'No. Penyerahan', 'no_penyerahan', 'teks', REQUIRED],
                [SHOW, 'Tanggal Penyerahan', 'tanggal_penyerahan', 'tanggal_jam', REQUIRED],
                [HIDE, 'ID Shift', 'id_shift', 'indeks', REQUIRED],
                [HIDE, 'ID Petugas Crossmatch', 'id_petugas_cross', 'indeks', REQUIRED],
                [HIDE, 'Keterangan', 'keterangan', 'teks', REQUIRED],
                [HIDE, 'ID Rekening', 'id_rekening', 'indeks', REQUIRED],
                [SHOW, 'Pengambil Darah', 'pengambil_darah', 'nama', REQUIRED],
                [HIDE, 'Alamat Pengambil', 'alamat_pengambil', 'teks', REQUIRED],
                [HIDE, 'ID Penanggung Jawab', 'id_penanggung_jawab', 'indeks', REQUIRED],
                [HIDE, 'PPN (%)', 'besar_ppn', 'desimal', REQUIRED],
                [SHOW, 'ID Status Pembayaran', 'id_status_pembayaran', 'status', REQUIRED],
            ],
        );
    }   
}
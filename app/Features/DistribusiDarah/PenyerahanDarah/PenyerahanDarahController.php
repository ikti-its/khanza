<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarah;
use App\Core\Controller\ControllerTemplate;

final class PenyerahanDarahController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Penyerahan', 'id_penyerahan', 'indeks', 0],
                [0, 'ID Permintaan', 'id_permintaan', 'indeks', 1],
                [1, 'No. Penyerahan', 'no_penyerahan', 'teks', 1],
                [1, 'Tanggal Penyerahan', 'tanggal_penyerahan', 'tanggal_jam', 1],
                [0, 'ID Shift', 'id_shift', 'indeks', 1],
                [0, 'ID Petugas Crossmatch', 'id_petugas_cross', 'indeks', 1],
                [0, 'Keterangan', 'keterangan', 'teks', 1],
                [0, 'ID Rekening', 'id_rekening', 'indeks', 1],
                [1, 'Pengambil Darah', 'pengambil_darah', 'nama', 1],
                [0, 'Alamat Pengambil', 'alamat_pengambil', 'teks', 1],
                [0, 'ID Penanggung Jawab', 'id_penanggung_jawab', 'indeks', 1],
                [0, 'PPN (%)', 'besar_ppn', 'desimal', 1],
                [1, 'ID Status Pembayaran', 'id_status_pembayaran', 'status', 1],
            ],
        );
    }   
}
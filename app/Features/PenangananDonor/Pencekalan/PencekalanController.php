<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Pencekalan;
use App\Core\Controller\ControllerTemplate;

class PencekalanController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new PencekalanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Pencekalan', 'icon' => 'pencekalan'],
            ],
            judul: 'Pencekalan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Pencekalan', 'id_pencekalan', 'indeks', 0],
                [1, 'ID Kunjungan', 'id_kunjungan', 'indeks', 1],
                [1, 'ID Jenis Pencekalan', 'id_jenis_pencekalan', 'indeks', 1],
                [1, 'Tanggal Mulai', 'tanggal_mulai', 'tanggal', 1],
                [1, 'Tanggal Selesai', 'tanggal_selesai', 'tanggal', 0],
                [0, 'ID Shift', 'id_shift', 'indeks', 1],
                [0, 'ID Petugas', 'id_petugas', 'indeks', 1],
                [1, 'Keterangan', 'keterangan', 'teks', 1],
                [1, 'ID Status Pencekalan', 'id_status_pencekalan', 'status', 1],
            ],
        );
    }   
}
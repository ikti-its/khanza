<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Pencekalan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PencekalanController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Pencekalan', 'id_pencekalan', 'indeks', OPTIONAL],
                [SHOW, 'ID Kunjungan', 'id_kunjungan', 'indeks', REQUIRED],
                [SHOW, 'ID Jenis Pencekalan', 'id_jenis_pencekalan', 'indeks', REQUIRED],
                [SHOW, 'Tanggal Mulai', 'tanggal_mulai', 'tanggal', REQUIRED],
                [SHOW, 'Tanggal Selesai', 'tanggal_selesai', 'tanggal', OPTIONAL],
                [HIDE, 'ID Shift', 'id_shift', 'indeks', REQUIRED],
                [HIDE, 'ID Petugas', 'id_petugas', 'indeks', REQUIRED],
                [SHOW, 'Keterangan', 'keterangan', 'teks', REQUIRED],
                [SHOW, 'ID Status Pencekalan', 'id_status_pencekalan', 'status', REQUIRED],
            ],
        );
    }   
}
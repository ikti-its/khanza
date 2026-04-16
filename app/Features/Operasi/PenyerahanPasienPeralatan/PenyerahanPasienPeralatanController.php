<?php
declare(strict_types=1);

namespace App\Features\Operasi\PenyerahanPasienPeralatan;
use App\Core\Controller\ControllerTemplate;

class PenyerahanPasienPeralatanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PenyerahanPasienPeralatanModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Penyerahan Pasien Peralatan', 'icon' => 'penyerahan_pasien_peralatan'],
            ],
            judul: 'Penyerahan Pasien Peralatan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID',             'id',             'indeks', 0],
                [0, 'ID Penyerahan',  'id_penyerahan',  'indeks', 0],
                [1, 'Peralatan',      'id_peralatan',   'indeks', 1],
                [1, 'Keterangan',     'keterangan',     'teks',   1],
            ],
        );
    }
}
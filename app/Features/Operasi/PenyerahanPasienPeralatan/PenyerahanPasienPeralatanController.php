<?php
declare(strict_types=1);

namespace App\Features\Operasi\PenyerahanPasienPeralatan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PenyerahanPasienPeralatanController extends ControllerTemplate
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
                [HIDE, 'ID',             'id',             I::INDEX, OPTIONAL],
                [HIDE, 'ID Penyerahan',  'id_penyerahan',  I::INDEX, OPTIONAL],
                [SHOW, 'Peralatan',      'id_peralatan',   I::INDEX, REQUIRED],
                [SHOW, 'Keterangan',     'keterangan',     I::TEXT,   REQUIRED],
            ],
        );
    }
}
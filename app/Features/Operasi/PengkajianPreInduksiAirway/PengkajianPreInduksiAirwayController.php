<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksiAirway;
use App\Core\Controller\ControllerTemplate;

final class PengkajianPreInduksiAirwayController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengkajianPreInduksiAirwayModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Pengkajian Pre Induksi Airway', 'icon' => 'pengkajian_pre_induksi_airway'],
            ],
            judul: 'Pengkajian Pre Induksi Airway',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Airway',     'id_airway',     'indeks', OPTIONAL],
                [HIDE, 'ID Pengkajian', 'id_pengkajian', 'indeks', OPTIONAL],
                [SHOW, 'Jenis Airway',  'jenis_airway',  'teks',   REQUIRED],
                [SHOW, 'Nomor',         'nomor',         'teks',   REQUIRED],
                [SHOW, 'Jenis',         'jenis',         'teks',   REQUIRED],
                [SHOW, 'Fiksasi (cm)',  'fiksasi_cm',    'jumlah', REQUIRED],
                [SHOW, 'Keterangan',    'keterangan',    'teks',   REQUIRED],
            ],
        );
    }
}
<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksiAirway;
use App\Core\Controller\ControllerTemplate;

class PengkajianPreInduksiAirwayController extends ControllerTemplate
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
                [0, 'ID Airway',     'id_airway',     'indeks', 0],
                [0, 'ID Pengkajian', 'id_pengkajian', 'indeks', 0],
                [1, 'Jenis Airway',  'jenis_airway',  'teks',   1],
                [1, 'Nomor',         'nomor',         'teks',   1],
                [1, 'Jenis',         'jenis',         'teks',   1],
                [1, 'Fiksasi (cm)',  'fiksasi_cm',    'jumlah', 1],
                [1, 'Keterangan',    'keterangan',    'teks',   1],
            ],
        );
    }
}
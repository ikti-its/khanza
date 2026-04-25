<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksiAirway;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Airway',     'id_airway',     I::INDEX, OPTIONAL],
                [HIDE, 'ID Pengkajian', 'id_pengkajian', I::INDEX, OPTIONAL],
                [SHOW, 'Jenis Airway',  'jenis_airway',  I::TEXT,   REQUIRED],
                [SHOW, 'Nomor',         'nomor',         I::TEXT,   REQUIRED],
                [SHOW, 'Jenis',         'jenis',         I::TEXT,   REQUIRED],
                [SHOW, 'Fiksasi (cm)',  'fiksasi_cm',    I::NUMBER, REQUIRED],
                [SHOW, 'Keterangan',    'keterangan',    I::TEXT,   REQUIRED],
            ],
        );
    }
}
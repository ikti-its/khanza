<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksiAirway;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

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
            title: 'Pengkajian Pre Induksi Airway',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_airway', 'ID Airway'],
                [HIDE, OPTIONAL, I::INDEX, 'id_pengkajian', 'ID Pengkajian'],
                [SHOW, REQUIRED, I::TEXT, 'jenis_airway', 'Jenis Airway'],
                [SHOW, REQUIRED, I::TEXT, 'nomor', 'Nomor'],
                [SHOW, REQUIRED, I::TEXT, 'jenis', 'Jenis'],
                [SHOW, REQUIRED, I::NUMBER, 'fiksasi_cm', 'Fiksasi (cm)'],
                [SHOW, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }
}
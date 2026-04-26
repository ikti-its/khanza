<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\SkriningRawatJalan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class SkriningRawatJalanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new SkriningRawatJalanModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Skrining Rawat Jalan', 'icon' => 'skrining_rawat_jalan'],
            ],
            title: 'Skrining Rawat Jalan',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_skrining', 'ID Skrining'],
                [SHOW, REQUIRED, I::TEXT, 'no_rm', 'No. Rekam Medis'],
                [SHOW, REQUIRED, I::DATE, 'tgl_jam_skrining', 'Tanggal Skrining'],
                [SHOW, REQUIRED, I::INDEX, 'id_kesadaran', 'Kesadaran'],
                [SHOW, REQUIRED, I::INDEX, 'id_pernafasan', 'Pernafasan'],
                [SHOW, REQUIRED, I::INDEX, 'id_skala_nyeri', 'Skala Nyeri'],
                [SHOW, REQUIRED, I::INDEX, 'id_nyeri_dada', 'Nyeri Dada'],
                [SHOW, REQUIRED, I::INDEX, 'id_batuk', 'Batuk'],
                [SHOW, REQUIRED, I::SELECT, 'is_geriatri', 'Geriatri'],
                [SHOW, REQUIRED, I::SELECT, 'is_risiko_jatuh', 'Risiko Jatuh'],
                [SHOW, REQUIRED, I::INDEX, 'id_keputusan', 'Keputusan'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas', 'ID Petugas'],
            ],
        );
    }
}
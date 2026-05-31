<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\SkriningRawatJalan;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class SkriningRawatJalanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new SkriningRawatJalanModel(),
            [
                ['Rawat Jalan',          'rawat_jalan'],
                ['Skrining Rawat Jalan', 'skrining_rawat_jalan'],
            ],
            'Skrining Rawat Jalan',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX,   'id_skrining',      'ID Skrining'],
                [SHOW, REQUIRED, I::TEXT,    'no_rm',            'No. Rekam Medis'],
                [SHOW, REQUIRED, I::DATE,    'tgl_skrining',     'Tanggal Skrining'],
                [SHOW, REQUIRED, I::TIME,    'jam_skrining',     'Jam Skrining'],
                [SHOW, REQUIRED, I::SELECT,  'id_kesadaran',     'Kesadaran'],
                [SHOW, REQUIRED, I::SELECT,  'id_pernafasan',    'Pernafasan'],
                [SHOW, REQUIRED, I::SELECT,  'id_skala_nyeri',   'Skala Nyeri'],
                [SHOW, REQUIRED, I::SELECT,  'id_nyeri_dada',    'Nyeri Dada'],
                [SHOW, REQUIRED, I::SELECT,  'id_batuk',         'Batuk'],
                [SHOW, REQUIRED, I::BOOL,    'is_geriatri',      'Geriatri'],
                [SHOW, REQUIRED, I::BOOL,    'is_risiko_jatuh',  'Risiko Jatuh'],
                [SHOW, REQUIRED, I::SELECT,  'id_keputusan',     'Keputusan'],
                [SHOW, REQUIRED, I::SELECT,  'id_petugas',       'ID Petugas'],
            ],
        );
    }
}

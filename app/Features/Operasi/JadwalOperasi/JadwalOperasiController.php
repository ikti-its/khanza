<?php
declare(strict_types=1);

namespace App\Features\Operasi\JadwalOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class JadwalOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new JadwalOperasiModel(),
            [
                ['Operasi', 'operasi'],
                ['Jadwal Operasi', 'jadwal_operasi'],
            ],
            'Jadwal Operasi',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_jadwal', 'ID Jadwal'],
                [SHOW, REQUIRED, I::INDEX, 'id_permintaan', 'ID Permintaan'],
                [SHOW, REQUIRED, I::INDEX, 'id_ruangan', 'ID Ruangan'],
                [SHOW, REQUIRED, I::INDEX, 'id_tindakan', 'ID Tindakan'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_bedah', 'Kode Dokter Bedah'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_anestesi', 'Kode Dokter Anestesi'],
                [SHOW, REQUIRED, I::DATE, 'tanggal', 'Tanggal'],
                [SHOW, REQUIRED, I::TIME, 'waktu_mulai', 'Waktu Mulai'],
                [SHOW, REQUIRED, I::TIME, 'waktu_selesai', 'Waktu Selesai'],
                [SHOW, REQUIRED, I::INDEX, 'id_status', 'Status'],
            ],
        );
    }
}
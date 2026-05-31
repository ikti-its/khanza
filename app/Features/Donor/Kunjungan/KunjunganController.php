<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class KunjunganController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new KunjunganModel(),
            [
                ['Donor',     'donor'],
                ['Kunjungan', 'kunjungan'],
            ],
            'Kunjungan',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_kunjungan',      'ID Kunjungan'],
                [SHOW, REQUIRED, I::TEXT,  'nomor_antrian',     'Nomor Antrian'],
                [SHOW, REQUIRED, I::TEXT,  'nomor_kunjungan',   'Nomor Kunjungan'],
                [SHOW, REQUIRED, I::DTIME,  'tanggal_kunjungan', 'Tanggal Kunjungan'],
                [HIDE, REQUIRED, I::INDEX, 'id_pendonor',       'ID Pendonor'],
            ],
        );
    }

    /**
     * OVERRIDE: Menampilkan Form Kunjungan
     */
    #[\Override]
    final public function create_page(): string
    {
        $breadcrumbs = [
            ['title' => 'Tambah', 'icon' => 'tambah']
        ];

        $fieldsKunjunganMatang = $this->get_fields();
        
        $controllerPendonor = new \App\Features\Role\Pendonor\PendonorController();
        $fieldsPendonorMatang = $controllerPendonor->get_fields();

        $mockBaris = [];
        $konfigGabungan = [];

        $tanggalHariIni = date('Y-m-d H:i:s');
        
        $jumlahKunjunganHariIni = $this->model->db->table('donor.kunjungan')
            ->where('DATE(tanggal_kunjungan)', $tanggalHariIni)
            ->countAllResults();

        $nextAntrian = $jumlahKunjunganHariIni + 1;
        $nomorAntrianOtomatis = str_pad((string)$nextAntrian, 3, '0', STR_PAD_LEFT);

        $formatTanggalPendek = date('ymd');
        $nomorKunjunganOtomatis = 'REG-' . $formatTanggalPendek . '-' . $nomorAntrianOtomatis;

        foreach ($fieldsKunjunganMatang as $fieldKunjungan) {
            $columnKunjungan = $fieldKunjungan[2];

            if ($columnKunjungan === 'id_kunjungan') {
                continue;
            }

            if ($columnKunjungan === 'tanggal_kunjungan') {
                $mockBaris[$columnKunjungan] = $tanggalHariIni;
            } elseif ($columnKunjungan === 'nomor_antrian') {
                $mockBaris[$columnKunjungan] = $nomorAntrianOtomatis;
                $fieldKunjungan[3] = 'indeks';
            } elseif ($columnKunjungan === 'nomor_kunjungan') {
                $mockBaris[$columnKunjungan] = $nomorKunjunganOtomatis;
                $fieldKunjungan[3] = 'indeks';
            } else {
                $mockBaris[$columnKunjungan] = '';
            }

            if ($columnKunjungan === 'id_pendonor') {
                foreach ($fieldsPendonorMatang as $fieldPendonor) {
                    if ($fieldPendonor[2] === 'nomor_pendonor') {
                        $mockBaris['nomor_pendonor'] = '';
                        
                        $konfigGabungan[] = $fieldPendonor;
                        break;
                    }
                }
                continue;
            }

            $konfigGabungan[] = $fieldKunjungan;
        }

        return view('/admin/donor/tambah_kunjungan', [
            'judul'       => 'Registrasi ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->model->primaryKey,
            'konfig'      => $konfigGabungan, 
            'baris'       => $mockBaris,
            'form_action' => '/submittambah',
        ]);
    }
}

<?php
declare(strict_types=1);

namespace App\Features\Donor\PengambilanDarah;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PengambilanDarahController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PengambilanDarahModel(),
            [
                ['Donor',             'donor'],
                ['Pengambilan Darah', 'pengambilan_darah'],
            ],
            'Pengambilan Darah',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
                A::SEPARATE,
                A::TEST,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX,  'id_pengambilan_darah',  'ID Pengambilan Darah'],
                [SHOW, REQUIRED, I::TEXT,   'nomor_pengambilan',     'Nomor Pengambilan'],
                [HIDE, REQUIRED, I::INDEX,  'id_kunjungan',          'ID Kunjungan'],
                [SHOW, REQUIRED, I::DATE,   'tanggal_pengambilan',   'Tanggal Pengambilan'],
                [SHOW, REQUIRED, I::SELECT,  'id_shift',              'Shift'],
                [SHOW, REQUIRED, I::TEXT,   'no_bag',                'Nomor Bag'],
                [HIDE, REQUIRED, I::SELECT,  'id_jenis_bag',          'Jenis Bag'],
                [HIDE, REQUIRED, I::SELECT,  'id_jenis_donor',        'Jenis Donor'],
                [HIDE, REQUIRED, I::SELECT,  'id_lokasi_pengambilan', 'Lokasi Pengambilan'],
                [HIDE, REQUIRED, I::SELECT,  'id_petugas',            'Petugas'],
                [SHOW, OPTIONAL, I::SELECT, 'id_status_pengambilan', 'Status Pengambilan'],
            ],
        );
    }

    /**
     * OVERRIDE: Menampilkan Form Pengambilan Darah & Penggunaan BHP
     */
    #[\Override]
    public function create_page(): string
    {
        $breadcrumbs = [
            ['title' => 'Tambah', 'icon' => 'tambah']
        ];

        $konfigPengambilan = $this->get_fields_with_options(false, true);

        $controllerKunjungan = new \App\Features\Donor\Kunjungan\KunjunganController();
        $controllerPendonor  = new \App\Features\Role\Pendonor\PendonorController();
        $controllerOrang     = new \App\Features\Person\Orang\OrangController();

        $konfigKunjungan = $controllerKunjungan->get_fields_with_options(false, true);
        $konfigPendonor  = $controllerPendonor->get_fields_with_options(false, true);
        $konfigOrang     = $controllerOrang->get_fields_with_options(false, true);

        $modelBhpMedis    = new \App\Features\LogistikUTD\PengambilanMedis\PengambilanMedisModel();
        $modelBhpNonMedis = new \App\Features\LogistikUTD\PengambilanPenunjang\PengambilanPenunjangModel();

        $rawMedis    = $modelBhpMedis->get_katalog_dan_stok_ruangan();
        $rawPenunjang = $modelBhpNonMedis->get_katalog_dan_stok_ruangan();

        $masterBhpMedis = [];
        foreach ($rawMedis as $row) {
            $sisaStok = (int)$row['total_masuk'] - (int)$row['total_terpakai_donor'] - (int)$row['total_terpakai_pemisahan'] - (int)$row['total_terpakai_penyerahan'] - (int)$row['total_rusak'];
            
            if ((int)$row['total_masuk'] > 0) {
                $masterBhpMedis[] = [
                    'id_barang'   => $row['id_barang'],
                    'nama_barang' => $row['nama_barang'],
                    'stok'        => $sisaStok
                ];
            }
        }

        $masterBhpNonMedis = [];
        foreach ($rawPenunjang as $row) {
            $sisaStokNon = (int)$row['total_masuk'] - (int)$row['total_terpakai_donor'] - (int)$row['total_terpakai_pemisahan'] - (int)$row['total_terpakai_penyerahan'] - (int)$row['total_rusak'];
            
            if ((int)$row['total_masuk'] > 0) {
                $masterBhpNonMedis[] = [
                    'id_barang'   => $row['id_barang'],
                    'nama_barang' => $row['nama_barang'],
                    'stok'        => $sisaStokNon
                ];
            }
        }

        $mockBaris = [];
        $konfigGabungan = [];

        foreach ($konfigPengambilan as $fieldPengambilan) {
            $columnPengambilan = $fieldPengambilan[2];

            if ($columnPengambilan === 'id_pengambilan_darah') {
                continue;
            }

            $mockBaris[$columnPengambilan] = '';

            if ($columnPengambilan === 'id_kunjungan') {
                foreach ($konfigKunjungan as $fieldKunjungan) {
                    if ($fieldKunjungan[2] === 'nomor_kunjungan') {
                        $mockBaris['nomor_kunjungan'] = '';
                        $konfigGabungan[] = $fieldKunjungan;
                        break;
                    }
                }

                foreach ($konfigPendonor as $fieldPendonor) {
                    if ($fieldPendonor[2] === 'nomor_pendonor') {
                        $mockBaris['nomor_pendonor'] = '';
                        $konfigGabungan[] = $fieldPendonor;
                        break;
                    }
                }

                foreach ($konfigOrang as $fieldOrang) {
                    if ($fieldOrang[2] === 'nama') {
                        $mockBaris['nama'] = '';
                        $konfigGabungan[] = $fieldOrang;
                        break;
                    }
                }
                continue;
            }

            $konfigGabungan[] = $fieldPengambilan;
        }

        return view('/admin/donor/tambah_pengambilandarah', [
            'judul'             => 'Tambah ' . $this->title,
            'breadcrumbs'       => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'        => $this->get_uri_path(),
            'kolom_id'          => $this->model->primaryKey,
            'konfig'            => $konfigGabungan,
            'baris'             => $mockBaris,
            'bhp_medis_options' => $masterBhpMedis,
            'bhp_non_options'   => $masterBhpNonMedis,
            'form_action'       => '/submittambah',
        ]);
    }
}

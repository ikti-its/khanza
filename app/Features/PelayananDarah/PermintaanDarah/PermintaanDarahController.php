<?php
declare(strict_types=1);

namespace App\Features\PelayananDarah\PermintaanDarah;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

final class PermintaanDarahController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PermintaanDarahModel(),
            [
                ['Pelayanan Darah',  'pelayanan_darah'],
                ['Permintaan Darah', 'permintaan_darah'],
            ],
            'Permintaan Darah',
            [
                A::READ,
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,
                A::DETAIL,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX,  'id_permintaan',        'ID Permintaan'],
                [SHOW, REQUIRED, I::TEXT,   'no_permintaan',        'Nomor Permintaan'],
                [SHOW, REQUIRED, I::TEXT,   'id_registrasi',        'ID Registrasi'],
                [SHOW, REQUIRED, I::TEXT,   'id_dokter_pengirim',   'Dokter Penanggung Jawab'],
                [SHOW, REQUIRED, I::DTIME,  'tanggal_permintaan',   'Tanggal Permintaan'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_permintaan', 'Status Permintaan'],
            ],
        );
    }

    /**
     * OVERRIDE: Menampilkan Halaman Utama Permintaan Darah
     * 
     * @throws DatabaseException
     */
    #[\Override]
    public function index(): string
    {
        $currentPage = max(1, (int) ($this->request->getGet('page') ?? 1));
        $perPage     = 10;
        $offset      = ($currentPage - 1) * $perPage;

        $totalRows  = $this->model->count_filtered();

        $permintaanDarahModel = new PermintaanDarahModel();
        $data_tabel = $permintaanDarahModel->get_data_tabel($perPage, $offset);

        $konfig = [
            [1, 'No. Permintaan',     'no_permintaan',          'teks',        0],
            [1, 'No. Rawat',          'nomor_rawat',            'teks',        0],
            [1, 'No. Rekam Medis',    'nomor_rm',               'teks',        0],
            [1, 'Nama Pasien',        'nama',                   'nama',        0],
            [1, 'Tanggal Permintaan', 'tanggal_permintaan',     'tanggal_jam', 0],
            [1, 'Status',             'nama_status_permintaan', 'status',      0],
        ];

        return view('/layouts/data', [
            'judul'         => $this->title,
            'breadcrumbs'   => $this->breadcrumbs,
            'meta_data'     => [
                'page'  => $currentPage,
                'size'  => count($data_tabel),
                'total' => ceil($totalRows / $perPage),
            ],
            'modul_path'    => $this->get_uri_path(),
            'kolom_id'      => $this->primary_key,
            'konfig'        => $konfig,
            'aksi'          => $this->actions,
            'tabel'         => $data_tabel,
            'row_alert'     => [],
            'child_link'    => null,
            'query_string'  => '',
            'filters'       => $this->filters,
            'active_filter' => $this->active_filter,
        ]);
    }

    /**
     * OVERRIDE: Menampilkan Form Permintaan Darah
     * 
     * @throws DatabaseException
     */
    #[\Override]
    public function create_page(): string
    {
        $breadcrumbs = [
            ['title' => 'Tambah', 'icon' => 'tambah'],
        ];

        /** @var list<array<int, mixed>> $konfigPermintaan */
        $konfigPermintaan = $this->get_fields_with_options(false, true);

        $controllerRawatInap  = new \App\Features\RawatInap\Registrasi\RegistrasiController();
        $controllerRegistrasi = new \App\Features\Registrasi\Registrasi\RegistrasiController();
        $controllerPasien     = new \App\Features\Role\Pasien\PasienController();
        $controllerOrang      = new \App\Features\Person\Orang\OrangController();

        $konfigRawatInap  = $controllerRawatInap->fields;
        $konfigRegistrasi = $controllerRegistrasi->fields;
        $konfigPasien     = $controllerPasien->fields;
        $konfigOrang      = $controllerOrang->fields;

        $modelKomponen = new \App\Features\InventoriDarah\KomponenDarah\KomponenDarahModel();
        $modelGolDarah = new \App\Features\Darah\GolonganDarah\GolonganDarahModel();
        $modelRhesus   = new \App\Features\Darah\Rhesus\RhesusModel();

        $masterKomponen = $modelKomponen->findAll();
        $masterGolDarah = $modelGolDarah->findAll();
        $masterRhesus   = $modelRhesus->findAll();

        $mockBaris      = [];
        $konfigGabungan = [];

        $tahunSekarang = date('Y');
        $bulanSekarang = date('m');

        $prefiksPermintaan = "{$tahunSekarang}-{$bulanSekarang}-REQ";

        $query = $this->model
            ->db
            ->table('pelayanan_darah.permintaan_darah')
            ->select('no_permintaan')
            ->like('no_permintaan', $prefiksPermintaan, 'after')
            ->orderBy('no_permintaan', 'DESC')
            ->limit(1)
            ->get();
        
        $nomorTerakhir = $query !== false ? $query->getRowArray() : null;

        $nextUrutan = $nomorTerakhir
            ? ((int) substr((string) ($nomorTerakhir['no_permintaan'] ?? ''), strlen($prefiksPermintaan)) + 1)
            : 1;

        $stringUrutan = str_pad((string) $nextUrutan, 5, '0', STR_PAD_LEFT);

        $nomorPermintaanOtomatis = "{$prefiksPermintaan}{$stringUrutan}";

        foreach ($konfigPermintaan as $fieldPermintaan) {
            if (!isset($fieldPermintaan[2])) {
                continue;
            }

            $columnPermintaan = (string) $fieldPermintaan[2];

            if ($columnPermintaan === 'id_permintaan') {
                continue;
            }

            $isTanggal =
                $fieldPermintaan[3] === 'tanggal'
                || str_contains($columnPermintaan, 'tanggal')
                || $fieldPermintaan[3] === 'dtime';
            $mockBaris[$columnPermintaan] = $isTanggal ? date('Y-m-d\TH:i') : '';

            if ($columnPermintaan === 'no_permintaan') {
                $mockBaris[$columnPermintaan] = $nomorPermintaanOtomatis;
                $fieldPermintaan[3]           = 'indeks';
            }

            if ($columnPermintaan === 'id_registrasi') {
                foreach ($konfigRegistrasi as $fieldRegistrasi) {
                    if ($fieldRegistrasi[2] === 'nomor_rawat') {
                        $mockBaris['nomor_rawat'] = '';
                        $konfigGabungan[]         = $fieldRegistrasi;
                        break;
                    }
                }

                foreach ($konfigPasien as $fieldPasien) {
                    if ($fieldPasien[2] === 'nomor_rm') {
                        $mockBaris['nomor_rm'] = '';
                        $konfigGabungan[]      = $fieldPasien;
                        break;
                    }
                }

                foreach ($konfigOrang as $fieldOrang) {
                    if ($fieldOrang[2] === 'nama') {
                        $mockBaris['nama'] = '';
                        $konfigGabungan[]  = $fieldOrang;
                        break;
                    }
                }

                foreach ($konfigRawatInap as $fieldRanap) {
                    if ($fieldRanap[2] === 'kamar') {
                        $mockBaris['kamar'] = '';
                        $konfigGabungan[]   = $fieldRanap;
                        break;
                    }
                }
                continue;
            }

            $konfigGabungan[] = $fieldPermintaan;
        }

        return view('admin/pelayanandarah/tambah_permintaandarah', [
            'judul'            => 'Tambah ' . $this->title,
            'breadcrumbs'      => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'       => $this->get_uri_path(),
            'kolom_id'         => $this->model->primaryKey,
            'konfig'           => $konfigGabungan,
            'baris'            => $mockBaris,
            'master_komponen'  => $masterKomponen,
            'master_gol_darah' => $masterGolDarah,
            'master_rhesus'    => $masterRhesus,
            'form_action'      => '/submittambah',
        ]);
    }

    /**
     * OVERRIDE: Memproses simpan data permintaan darah
     */
    #[\Override]
    public function create(): string|RedirectResponse
    {
        /** @var array<string, mixed> $rawPost */
        $rawPost = $this->request->getPost();

        /** @var list<int|string> $listKomponen */
        $listKomponen = is_array($rawPost['id_komponen'] ?? null) ? array_values($rawPost['id_komponen']) : [];

        /** @var array<array-key, int|string> $listGolDarah */
        $listGolDarah = is_array($rawPost['id_golongan_darah'] ?? null) ? $rawPost['id_golongan_darah'] : [];

        /** @var array<array-key, int|string> $listRhesus */
        $listRhesus = is_array($rawPost['id_rhesus'] ?? null) ? $rawPost['id_rhesus'] : [];

        /** @var array<array-key, int|numeric-string> $listJumlah */
        $listJumlah = is_array($rawPost['jumlah'] ?? null) ? $rawPost['jumlah'] : [];

        $dataPermintaan = [];
        foreach ($this->fields as $field) {
            $namaKolom = $field[2];
            if (array_key_exists($namaKolom, $rawPost)) {
                $dataPermintaan[$namaKolom] = $rawPost[$namaKolom];
            }
        }

        $dataPermintaan['id_status_permintaan'] = 1;

        $this->model->db->transStart();

        try {
            $this->model->insert($dataPermintaan);
            $idPermintaan = $this->model->getInsertID();

            if (!empty($listKomponen)) {
                $modelDetail = new \App\Features\PelayananDarah\PermintaanDarahDetail\PermintaanDarahDetailModel();

                foreach ($listKomponen as $index => $idKomponen) {
                    if (empty($idKomponen))
                        continue;

                    $modelDetail->insert([
                        'id_permintaan'     => $idPermintaan,
                        'id_komponen'       => $idKomponen,
                        'id_golongan_darah' => $listGolDarah[$index],
                        'id_rhesus'         => $listRhesus[$index],
                        'jumlah'            => (int) $listJumlah[$index],
                    ]);
                }
            }

            $this->model->db->transComplete();

            if (!$this->model->db->transStatus() ) {
                throw new \RuntimeException('Gagal menyimpan data permintaan darah.');
            }

            session()->setFlashdata('success', 'Data permintaan darah berhasil disimpan.');
        } catch (\Exception $e) {
            $this->model->db->transRollback();
            $errMsg = $e instanceof DatabaseException
                ? $this->friendly_db_error($e)
                : $e->getMessage();
            session()->setFlashdata('error', $errMsg);
        }

        return redirect()->to($this->get_uri_path() . '/data');
    }

    /**
     * OVERRIDE: Menampilkan Halaman Ubah Data Permintaan Darah
     * 
     * @throws DatabaseException
     */
    #[\Override]
    public function update_page(int|string $id): string
    {
        if ($id == 0)
            return $this->index();

        $dataPermintaan = $this->model->find($id);
        if (!is_array($dataPermintaan)) {
            $dataPermintaan = [];
        }

        $dataRawatInap  = [];
        $dataRegistrasi = [];
        $dataPasien     = [];
        $dataOrang      = [];
        $dataDokter     = [];

        if (!empty($dataPermintaan['id_registrasi'])) {
            $modelRegistrasi = new \App\Features\Registrasi\Registrasi\RegistrasiModel();
            $dataRegistrasi  = $modelRegistrasi->find((int) $dataPermintaan['id_registrasi']);
            if (!is_array($dataRegistrasi)) {
                $dataRegistrasi = [];
            }

            if (!empty($dataRegistrasi['id_pasien'])) {
                $modelPasien = new \App\Features\Role\Pasien\PasienModel();
                $dataPasien  = $modelPasien->find((int) $dataRegistrasi['id_pasien']);
                if (!is_array($dataPasien)) {
                    $dataPasien = [];
                }

                if (!empty($dataPasien['id_orang'])) {
                    $modelOrang = new \App\Features\Person\Orang\OrangModel();
                    $dataOrang  = $modelOrang->find((int) $dataPasien['id_orang']);
                    if (!is_array($dataOrang)) {
                        $dataOrang = [];
                    }
                }
            }
        }

        $modelRawatInap = new \App\Features\RawatInap\Registrasi\RegistrasiModel();
        $ranapResult    = $modelRawatInap->where('id_registrasi', $dataPermintaan['id_registrasi'])->first();
        if ($ranapResult && !empty($ranapResult['kamar'])) {
            $dataRawatInap['kamar'] = $ranapResult['kamar'];
        }

        if (!empty($dataPermintaan['id_dokter_pengirim'])) {
            $modelDokterUser = new \App\Features\Role\Dokter\DokterModel();
            $dataDokterRole = $modelDokterUser->find((int) $dataPermintaan['id_dokter_pengirim']) ?? [];

            if (!empty($dataDokterRole['id_orang'])) {
                $modelOrangDokter          = new \App\Features\Person\Orang\OrangModel();
                $dataOrangDokter           = $modelOrangDokter->find((int) $dataDokterRole['id_orang']) ?? [];
                $dataDokter['nama_dokter'] = $dataOrangDokter['nama'] ?? '';
            }
        }

        $baris = array_merge($dataOrang, $dataPasien, $dataRegistrasi, $dataRawatInap, $dataDokter, $dataPermintaan);

        $controllerRawatInap  = new \App\Features\RawatInap\Registrasi\RegistrasiController();
        $controllerRegistrasi = new \App\Features\Registrasi\Registrasi\RegistrasiController();
        $controllerPasien     = new \App\Features\Role\Pasien\PasienController();

        $konfigRawatInap  = $controllerRawatInap->fields;
        $konfigRegistrasi = $controllerRegistrasi->fields;
        $konfigPasien     = $controllerPasien->fields;

        /** @var list<array<int, mixed>> $konfigPermintaan */
        $konfigPermintaan = $this->get_fields_with_options(false, true);

        $konfigGabungan = [];

        foreach ($konfigPermintaan as $fieldPermintaan) {
            if (!isset($fieldPermintaan[2])) {
                continue;
            }

            $columnPermintaan = (string) $fieldPermintaan[2];

            if ($columnPermintaan === 'id_registrasi') {
                foreach ($konfigRegistrasi as $fieldRegistrasi) {
                    if ($fieldRegistrasi[2] === 'nomor_rawat') {
                        $konfigGabungan[] = $fieldRegistrasi;
                        break;
                    }
                }
                foreach ($konfigPasien as $fieldPasien) {
                    if ($fieldPasien[2] === 'nomor_rm') {
                        $konfigGabungan[] = $fieldPasien;
                        break;
                    }
                }
                foreach ($konfigRawatInap as $fieldRanap) {
                    if ($fieldRanap[2] === 'kamar') {
                        $konfigGabungan[] = $fieldRanap;
                        break;
                    }
                }
                continue;
            }
            $konfigGabungan[] = $fieldPermintaan;
        }

        $modelKomponen = new \App\Features\InventoriDarah\KomponenDarah\KomponenDarahModel();
        $modelGolDarah = new \App\Features\Darah\GolonganDarah\GolonganDarahModel();
        $modelRhesus   = new \App\Features\Darah\Rhesus\RhesusModel();

        $masterKomponen = $modelKomponen->findAll();
        $masterGolDarah = $modelGolDarah->findAll();
        $masterRhesus   = $modelRhesus->findAll();

        $modelDetail         = new \App\Features\PelayananDarah\PermintaanDarahDetail\PermintaanDarahDetailModel();
        $dataDetailTersimpan = $modelDetail->where('id_permintaan', $id)->findAll();

        $detailBisaDiubah =
            (int) ($dataPermintaan['id_status_permintaan'] ?? PermintaanDarahModel::STATUS_BELUM_DIPROSES)
            === PermintaanDarahModel::STATUS_BELUM_DIPROSES;

        $breadcrumbs = [
            ['title' => 'Ubah', 'icon' => 'ubah'],
        ];

        return view('admin/pelayanandarah/tambah_permintaandarah', [
            'judul'              => 'Ubah ' . $this->title,
            'breadcrumbs'        => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'         => $this->get_uri_path(),
            'kolom_id'           => $this->model->primaryKey,
            'konfig'             => $konfigGabungan,
            'baris'              => $baris,
            'master_komponen'    => $masterKomponen,
            'master_gol_darah'   => $masterGolDarah,
            'master_rhesus'      => $masterRhesus,
            'detail_tersimpan'   => $dataDetailTersimpan,
            'detail_bisa_diubah' => $detailBisaDiubah,
            'form_action'        => '/submitedit/' . $id,
        ]);
    }

    /**
     * OVERRIDE: Mengeksekusi Simpan Perubahan Data Permintaan Darah
     * 
     * @throws DatabaseException
     */
    #[\Override]
    public function update(int|string $id): string|RedirectResponse
    {
        if ($id == 0)
            return $this->index();

        /** @var array<string, mixed> $rawPost */
        $rawPost = $this->request->getPost();

        /** @var list<int|string> $listKomponen */
        $listKomponen = is_array($rawPost['id_komponen'] ?? null) ? array_values($rawPost['id_komponen']) : [];

        /** @var array<array-key, int|string> $listGolDarah */
        $listGolDarah = is_array($rawPost['id_golongan_darah'] ?? null) ? $rawPost['id_golongan_darah'] : [];

        /** @var array<array-key, int|string> $listRhesus */
        $listRhesus = is_array($rawPost['id_rhesus'] ?? null) ? $rawPost['id_rhesus'] : [];

        /** @var array<array-key, int|numeric-string> $listJumlah */
        $listJumlah = is_array($rawPost['jumlah'] ?? null) ? $rawPost['jumlah'] : [];

        $dataPermintaan = [];
        foreach ($this->fields as $field) {
            $namaKolom = $field[2];
            if (array_key_exists($namaKolom, $rawPost)) {
                $dataPermintaan[$namaKolom] = $rawPost[$namaKolom];
            }
        }

        $this->model->db->transStart();

        try {
            $dataLama = $this->model->find($id);
            if (is_array($dataLama) && isset($dataLama['id_status_permintaan'])) {
                $dataPermintaan['id_status_permintaan'] = $dataLama['id_status_permintaan'];
            }

            $detailBisaDiubah =
                (int) ($dataLama['id_status_permintaan'] ?? PermintaanDarahModel::STATUS_BELUM_DIPROSES)
                === PermintaanDarahModel::STATUS_BELUM_DIPROSES;

            $this->model->update($id, $dataPermintaan);

            if ($detailBisaDiubah) {
                $modelDetail = new \App\Features\PelayananDarah\PermintaanDarahDetail\PermintaanDarahDetailModel();

                $modelDetail->where('id_permintaan', $id)->delete();

                if (!empty($listKomponen)) {
                    foreach ($listKomponen as $index => $idKomponen) {
                        if (empty($idKomponen))
                            continue;

                        $modelDetail->insert([
                            'id_permintaan'     => $id,
                            'id_komponen'       => $idKomponen,
                            'id_golongan_darah' => $listGolDarah[$index],
                            'id_rhesus'         => $listRhesus[$index],
                            'jumlah'            => (int) $listJumlah[$index],
                        ]);
                    }
                }
            }

            $this->model->db->transComplete();

            if (!$this->model->db->transStatus() ) {
                throw new \RuntimeException('Gagal memperbarui data permintaan darah.');
            }

            session()->setFlashdata('success', 'Data permintaan darah berhasil diperbarui.');
        } catch (\Exception $e) {
            $this->model->db->transRollback();
            $errMsg = $e instanceof DatabaseException
                ? $this->friendly_db_error($e)
                : $e->getMessage();
            session()->setFlashdata('error', $errMsg);
        }

        return redirect()->to($this->get_uri_path() . '/data');
    }

    /**
     * OVERRIDE: Menghapus data permintaan darah
     */
    #[\Override]
    public function delete(int|string $id): string|RedirectResponse
    {
        if ($id == 0)
            return $this->home();

        $dataPermintaan = $this->model->find($id);
        if (!$dataPermintaan) {
            session()->setFlashdata('error', 'Gagal menghapus. Data permintaan darah tidak ditemukan.');
            return redirect()->to($this->get_uri_path() . '/data');
        }

        $this->model->db->transStart();

        try {
            $modelDetail = new \App\Features\PelayananDarah\PermintaanDarahDetail\PermintaanDarahDetailModel();

            $modelDetail->where('id_permintaan', $id)->delete();

            $this->model->delete($id);

            $this->model->db->transComplete();

            if (!$this->model->db->transStatus() ) {
                throw new \RuntimeException('Gagal menghapus data permintaan darah.');
            }

            session()->setFlashdata('success', 'Data permintaan darah berhasil dihapus.');
        } catch (DatabaseException $e) {
            $this->model->db->transRollback();
            session()->setFlashdata('error', $this->friendly_db_error($e));
        } catch (\Exception $e) {
            $this->model->db->transRollback();
            session()->setFlashdata('error', $e->getMessage());
        }

        return $this->home();
    }

    /**
     * Menampilkan Halaman Detail Permintaan Darah
     * 
     * @throws PageNotFoundException
     * @throws DatabaseException
     */
    public function detail(int|string $id): string
    {
        if ($id == 0)
            return $this->index();

        $dataPermintaan = $this->model->find($id);
        if (!is_array($dataPermintaan)) {
            throw PageNotFoundException::forPageNotFound(
                'Data Permintaan Darah tidak ditemukan.',
            );
        }

        $dataRawatInap  = [];
        $dataRegistrasi = [];
        $dataPasien     = [];
        $dataOrang      = [];
        $dataDokter     = [];

        if (!empty($dataPermintaan['id_registrasi'])) {
            $modelRegistrasi = new \App\Features\Registrasi\Registrasi\RegistrasiModel();
            $dataRegistrasi  = $modelRegistrasi->find((int) $dataPermintaan['id_registrasi']);
            if (!is_array($dataRegistrasi)) {
                $dataRegistrasi = [];
            }

            if (!empty($dataRegistrasi['id_pasien'])) {
                $modelPasien = new \App\Features\Role\Pasien\PasienModel();
                $dataPasien  = $modelPasien->find((int) $dataRegistrasi['id_pasien']);
                if (!is_array($dataPasien)) {
                    $dataPasien = [];
                }

                if (!empty($dataPasien['id_orang'])) {
                    $modelOrang = new \App\Features\Person\Orang\OrangModel();
                    $dataOrang  = $modelOrang->find((int) $dataPasien['id_orang']);
                    if (!is_array($dataOrang)) {
                        $dataOrang = [];
                    }
                }
            }
        }

        $modelRawatInap = new \App\Features\RawatInap\Registrasi\RegistrasiModel();
        $ranapResult    = $modelRawatInap->where('id_registrasi', $dataPermintaan['id_registrasi'])->first();
        if ($ranapResult && !empty($ranapResult['kamar'])) {
            $dataRawatInap['kamar'] = $ranapResult['kamar'];
        }

        if (!empty($dataPermintaan['id_dokter_pengirim'])) {
            $modelDokterUser = new \App\Features\Role\Dokter\DokterModel();
            $dataDokterRole  = $modelDokterUser->find((int) $dataPermintaan['id_dokter_pengirim']) ?? [];

            if (!empty($dataDokterRole['id_orang'])) {
                $modelOrangDokter          = new \App\Features\Person\Orang\OrangModel();
                $dataOrangDokter           = $modelOrangDokter->find((int) $dataDokterRole['id_orang']) ?? [];
                $dataDokter['nama_dokter'] = $dataOrangDokter['nama'] ?? '';
            }
        }

        $baris = array_merge($dataOrang, $dataPasien, $dataRegistrasi, $dataRawatInap, $dataDokter, $dataPermintaan);

        $konfigPermintaan = $this->get_fields_with_options(false, true);

        /** @var list<array<int, mixed>> $fieldsList */
        $fieldsList = array_values(array_filter($konfigPermintaan, 'is_array'));

        foreach ($fieldsList as $field) {
            if (!isset($field[2])) {
                continue;
            }

            $colName = (string) $field[2];
            $options = is_array($field[5] ?? null) ? $field[5] : [];

            if (!empty($options) && isset($baris[$colName])) {
                $idMentah = (string) $baris[$colName];

                /** @var list<array<int, mixed>> $optionsList */
                $optionsList = array_values(array_filter($options, 'is_array'));

                foreach ($optionsList as $opt) {
                    if ((string) ($opt[1] ?? '') === $idMentah) {
                        $baris[$colName] = $opt[0] ?? '';
                        break;
                    }
                }
            }
        }

        $query = $this->model
            ->db
            ->table('pelayanan_darah.permintaan_darah_detail pdd')
            ->select('kd.nama_komponen, gd.nama_golongan_darah, r.kode_rhesus, pdd.jumlah')
            ->join('inventori_darah.komponen_darah kd', 'kd.id_komponen = pdd.id_komponen', 'inner')
            ->join('darah.golongan_darah gd', 'gd.id_golongan_darah = pdd.id_golongan_darah', 'left')
            ->join('darah.rhesus r', 'r.id_rhesus = pdd.id_rhesus', 'left')
            ->where('pdd.id_permintaan', $id)
            ->get();
        
        /** @var list<array<string, mixed>> $detailPermintaanRaw */
        $detailPermintaanRaw = $query !== false ? $query->getResultArray() : [];

        foreach (array_keys($baris) as $key) {
            if ($baris[$key] === null) {
                $baris[$key] = '';
            }
        }

        $breadcrumbs = [
            ['title' => 'Detail', 'icon' => 'detail'],
        ];

        return view('admin/pelayanandarah/detail_permintaandarah', [
            'judul'             => 'Detail ' . $this->title,
            'breadcrumbs'       => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'        => $this->get_uri_path(),
            'baris'             => $baris,
            'detail_permintaan' => $detailPermintaanRaw,
        ]);
    }

    /**
     * Menampilkan data modal permintaan darah
     * 
     * @throws DatabaseException
     */
    public function list(): ResponseInterface
    {
        $permintaanDarahModel = new PermintaanDarahModel();
        $data                 = $permintaanDarahModel->get_data_tabel(hanyaBelumTerpenuhi: true);

        return $this->response->setJSON([
            'data' => $data,
        ]);
    }
}

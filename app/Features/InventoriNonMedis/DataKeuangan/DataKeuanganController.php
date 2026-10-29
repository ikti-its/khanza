<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\DataKeuangan;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Features\InventoriNonMedis\PengadaanBarang\PengadaanBarangModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Endpoint JSON hanya-baca untuk modul keuangan (tidak tampil di sidebar), dijaga login dan
 * hak baca grup Inventori Non-Medis:
 *   GET /inventori-non-medis/data-keuangan/data               daftar endpoint + ringkasan nilai
 *   GET /inventori-non-medis/data-keuangan/pengadaan          pengadaan, total harga, nilai diterima, rekening suplier
 *   GET /inventori-non-medis/data-keuangan/pengadaan-{id|no}  rincian barang satu pengadaan (id atau no. PGD...)
 *   GET /inventori-non-medis/data-keuangan/penerimaan         penerimaan Diterima beserta nilainya
 *   GET /inventori-non-medis/data-keuangan/barang             data barang, stok, harga, nilai persediaan
 *   GET /inventori-non-medis/data-keuangan/ringkasan          total nilai pengadaan, diterima, persediaan
 * Parameter opsional ?dari=YYYY-MM-DD&sampai=YYYY-MM-DD untuk pengadaan, penerimaan, dan ringkasan.
 */
final class DataKeuanganController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PengadaanBarangModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Data Keuangan',       'data_keuangan'],
            ],
            'Data Keuangan',
            [
                A::READ,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_pengadaan', 'ID'],
            ],
        );
    }

    // tanggal dari query string, hanya format Y-m-d yang diterima
    private function tanggal(string $nama): null|string
    {
        $nilai = $this->request->getGet($nama);
        if (!is_string($nilai) || preg_match('/^\d{4}-\d{2}-\d{2}$/', $nilai) !== 1)
            return null;
        return checkdate((int) substr($nilai, 5, 2), (int) substr($nilai, 8, 2), (int) substr($nilai, 0, 4))
            ? $nilai
            : null;
    }

    // daftar endpoint beserta keterangan & contoh, lalu ringkasan seluruh pengadaan
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    public function index(): string|RedirectResponse
    {
        $dasar   = site_url('inventori-non-medis/data-keuangan');
        $service = new DataKeuanganService($this->get_db());
        $contoh  = (string) ($service->pengadaan()[0]['no_pengadaan'] ?? 'PGD...');
        $this->response->setContentType('application/json');

        return (string) json_encode([
            'keterangan'                  => 'API hanya-baca data Inventori Non-Medis untuk modul keuangan.',
            'endpoint'                    => [
                [
                    'url' => "{$dasar}/pengadaan",
                    'isi' => 'Daftar pengadaan, satu baris per pengadaan: suplier, rekening, total harga, nilai diterima, sisa nilai.',
                ],
                [
                    'url'    => "{$dasar}/pengadaan-{id_pengadaan atau no_pengadaan}",
                    'contoh' => "{$dasar}/pengadaan-{$contoh}",
                    'isi'    => 'Satu pengadaan beserta rincian barang yang dipesan dan yang sudah diterima.',
                ],
                [
                    'url' => "{$dasar}/penerimaan",
                    'isi' => 'Penerimaan barang berstatus Diterima beserta nilainya, dasar pencatatan hutang ke suplier.',
                ],
                [
                    'url' => "{$dasar}/barang",
                    'isi' => 'Stok, harga satuan, dan nilai persediaan setiap barang.',
                ],
                [
                    'url' => "{$dasar}/ringkasan",
                    'isi' => 'Total nilai pengadaan, nilai diterima, dan nilai persediaan.',
                ],
            ],
            'parameter'                   => [
                'dari'   => 'YYYY-MM-DD (opsional, untuk pengadaan, penerimaan, ringkasan)',
                'sampai' => 'YYYY-MM-DD (opsional, untuk pengadaan, penerimaan, ringkasan)',
            ],
            'ringkasan_seluruh_pengadaan' => $service->ringkasan($this->tanggal('dari'), $this->tanggal('sampai')),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    // satu jenis data: pengadaan, pengadaan-{id|no}, penerimaan, barang, ringkasan
    /**
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\HTTP\Exceptions\HTTPException
     */
    public function detail(int|string $id): ResponseInterface
    {
        $dari    = $this->tanggal('dari');
        $sampai  = $this->tanggal('sampai');
        $jenis   = (string) $id;
        $service = new DataKeuanganService($this->get_db());

        // pengadaan-13 (id) atau pengadaan-PGD202610110001 (nomor di Surat Pemesanan)
        if (preg_match('/^pengadaan-(.+)$/', $jenis, $m) === 1) {
            $data = $service->detail_pengadaan(ctype_digit($m[1]) ? (int) $m[1] : $m[1]) ?? [
                'pesan' => 'Pengadaan tidak ditemukan atau dibatalkan.',
            ];
        } else {
            $data = match ($jenis) {
                'pengadaan'  => $service->pengadaan($dari, $sampai),
                'penerimaan' => $service->penerimaan($dari, $sampai),
                'barang'     => $service->barang(),
                'ringkasan'  => $service->ringkasan($dari, $sampai),
                default      => ['pesan' => 'Jenis data tidak dikenal.'],
            };
        }

        return $this->response->setStatusCode(isset($data['pesan']) ? 404 : 200)->setJSON(['data' => $data]);
    }

    // hanya-baca: aksi tulis tidak tersedia
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    public function create_page(): string
    {
        $halaman = $this->index();
        return is_string($halaman) ? $halaman : '';
    }

    #[\Override]
    public function create(): string|RedirectResponse
    {
        return $this->home();
    }

    #[\Override]
    public function update_page(int|string $id): string|RedirectResponse
    {
        return $this->home();
    }

    #[\Override]
    public function update(int|string $id): string|RedirectResponse
    {
        return $this->home();
    }

    #[\Override]
    public function delete(int|string $id): string|RedirectResponse
    {
        return $this->home();
    }

    #[\Override]
    public function print(int|string $id): string|RedirectResponse
    {
        return $this->home();
    }
}

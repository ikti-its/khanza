<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\MonitoringTransaksi;

use App\Core\Auth\AccessMatrix;
use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Features\InventoriNonMedis\DaftarTransaksi;
use App\Features\InventoriNonMedis\PermintaanBarang\PermintaanBarangModel;
use CodeIgniter\HTTP\RedirectResponse;

/**
 * Satu halaman untuk menelusuri alur transaksi dari awal sampai akhir:
 * permintaan unit → persetujuan → pengajuan → pengadaan → penerimaan → pengiriman → konfirmasi.
 * Hanya membaca data; perubahan tetap dilakukan di menu masing-masing lewat tombol pintasan.
 */
final class MonitoringTransaksiController extends ControllerTemplate
{
    use DaftarTransaksi;

    protected array $search_columns = ['no_dokumen', 'pemohon', 'unit'];

    // kolom tabel daftar; bukan field model, jadi tidak ikut halaman audit
    private const KOLOM = [
        [SHOW, 'No. Dokumen',    'no_dokumen',  'teks',        0],
        [SHOW, 'Jenis Alur',     'jenis_label', 'teks',        0],
        [SHOW, 'Tanggal',        'tanggal',     'tanggal_jam', 0],
        [SHOW, 'Pemohon',        'pemohon',     'teks',        0],
        [SHOW, 'Unit',           'unit',        'teks',        0],
        [SHOW, 'Status',         'status',      'status',      0],
        [SHOW, 'Tahap Saat Ini', 'tahap',       'teks',        0],
    ];

    public function __construct()
    {
        parent::__construct(
            new PermintaanBarangModel(),
            [
                ['Inventori Non Medis',  'inventori_non_medis'],
                ['Monitoring Transaksi', 'monitoring_transaksi'],
            ],
            'Monitoring Transaksi',
            [
                A::READ,
                A::DETAIL,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan', 'ID'],
            ],
        );
    }

    // penelusuran alur yang dipakai daftar dan detail
    private function service(): MonitoringTransaksiService
    {
        return new MonitoringTransaksiService($this->get_db());
    }

    // daftar alur transaksi, terbaru di atas
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    public function index(): string|RedirectResponse
    {
        $page    = max(1, (int) ($this->request->getGet('page') ?? 1));
        $size    = max(1, (int) ($this->request->getGet('size') ?? 10));
        $keyword = $this->search_keyword();

        $dari   = $this->tanggal_get('dari');
        $sampai = $this->tanggal_get('sampai');
        $status = $this->status_get(MonitoringTransaksiService::STATUS);
        $saring = ['dari' => $dari, 'sampai' => $sampai, 'status' => $status];

        $hasil       = $this->service()->daftar($page, $size, $keyword, $saring);
        $total_pages = max(1, (int) ceil($hasil['total'] / $size));
        if ($page > $total_pages) {
            $page  = $total_pages;
            $hasil = $this->service()->daftar($page, $size, $keyword, $saring);
        }

        return view('/layouts/data', [
            'judul'          => $this->title,
            'breadcrumbs'    => $this->breadcrumbs,
            'meta_data'      => ['page' => $page, 'size' => $size, 'total' => $total_pages],
            'modul_path'     => $this->get_uri_path(),
            'kolom_id'       => 'kunci',
            'konfig'         => self::KOLOM,
            'aksi'           => [A::DETAIL->value => true],
            'filter_tanggal' => [
                'dari'        => $dari,
                'sampai'      => $sampai,
                'status_opsi' => MonitoringTransaksiService::STATUS,
                'status'      => $status,
            ],
            'tabel'          => $hasil['rows'],
            'pencarian'      => ['server' => true, 'q' => $keyword],
            // pintasan langsung ke form pengadaan, seperti tombol Tambah di menu lain
            'pintasan' => AccessMatrix::can_write('inventori-non-medis')
                ? [['label' => 'Buat Pengadaan', 'link' => '/inventori-non-medis/pengadaan-barang/tambah']]
                : [],
        ]);
    }

    // seluruh tahap satu alur, id berbentuk "permintaan-12" atau "pengajuan-5"
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    public function detail(int|string $id): string|RedirectResponse
    {
        [$jenis, $nomor] = array_pad(explode('-', (string) $id, 2), 2, '');
        $alur = match ($jenis) {
            'permintaan' => $this->service()->alur_permintaan((int) $nomor),
            'pengajuan'  => $this->service()->alur_pengajuan((int) $nomor),
            default      => null,
        };
        if ($alur === null || (int) $nomor <= 0)
            return $this->home();

        return view('admin/inventorinonmedis/detail_monitoring_transaksi', [
            'judul'       => 'Detail ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, [['title' => 'Detail', 'icon' => 'detail']]),
            'modul_path'  => $this->get_uri_path(),
            'jenis'       => $jenis,
            'alur'        => $alur,
        ]);
    }

    // halaman ini hanya untuk melihat, aksi tulis kembali ke daftar
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

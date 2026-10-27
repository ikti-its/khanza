<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TransaksiStok;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Features\InventoriNonMedis\DaftarTransaksi;
use CodeIgniter\HTTP\RedirectResponse;

final class TransaksiStokController extends ControllerTemplate
{
    use DaftarTransaksi;

    protected array $search_columns = [
        'nama_tipe_transaksi_stok',
        'keterangan',
        'no_keluar',
        'no_masuk',
        'no_pengembalian',
    ];

    public function __construct()
    {
        parent::__construct(
            new TransaksiStokModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Transaksi Stok',      'transaksi_stok'],
            ],
            'Transaksi Stok',
            [
                A::READ,
                A::DETAIL,
            ],
            [
                [HIDE,       OPTIONAL, I::INDEX,  'id_transaksi',             'ID'],
                [TABLE_ONLY, OPTIONAL, I::SELECT, 'nama_tipe_transaksi_stok', 'Tipe'],
                [SHOW,       REQUIRED, I::DTIME,  'tanggal',                  'Tanggal'],
                [HIDE,       OPTIONAL, I::TEXT,   'no_keluar',                'No. Keluar'],
                [HIDE,       OPTIONAL, I::TEXT,   'no_masuk',                 'No. Masuk'],
                [HIDE,       OPTIONAL, I::TEXT,   'no_pengembalian',          'No. Pengembalian'],
                [SHOW,       OPTIONAL, I::TEXT,   'keterangan',               'Keterangan'],
            ],
        );
    }

    // data terbaru di atas + filter tanggal
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    protected function before_read(): void
    {
        $this->model->set_order('id_transaksi', 'DESC');
        $this->atur_daftar('transaksi_stok');
    }

    // pastikan hasil query valid
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function guarded(mixed $result): \CodeIgniter\Database\BaseResult
    {
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query gagal dieksekusi.');
        return $result;
    }

    // halaman detail transaksi + rincian barang + alur dokumen asal
    /**
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    public function detail(int|string $id): string|RedirectResponse
    {
        if ($id == 0)
            return $this->index();

        $db = $this->get_db();

        $baris = $this->guarded(
            $db
                ->table('inventori_non_medis.transaksi_stok ts')
                ->join(
                    'inventori_non_medis.tipe_transaksi_stok tts',
                    'ts.id_tipe_transaksi_stok = tts.id_tipe_transaksi_stok',
                    'left',
                )
                ->join('inventori_non_medis.penerimaan_barang pnb', 'ts.id_penerimaan = pnb.id_penerimaan', 'left')
                ->join('inventori_non_medis.permintaan_barang pmb', 'ts.id_permintaan = pmb.id_permintaan', 'left')
                ->join(
                    'inventori_non_medis.pengembalian_barang pgb',
                    'ts.id_pengembalian = pgb.id_pengembalian',
                    'left',
                )
                ->select('ts.*, tts.nama_tipe_transaksi_stok, pnb.no_masuk, pmb.no_keluar, pgb.no_pengembalian')
                ->where('ts.id_transaksi', (int) $id)
                ->get(),
        )->getRowArray();

        if ($baris === null)
            return $this->index();

        $detail_items = $this->guarded(
            $db
                ->table('inventori_non_medis.transaksi_stok_detail d')
                ->join('inventori_non_medis.barang b', 'd.id_barang = b.id_barang', 'left')
                ->join('inventori_non_medis.satuan s', 'b.id_satuan = s.id_satuan', 'left')
                ->select(
                    'd.id_barang, d.qty, d.harga_satuan, d.stok_sebelum, d.stok_sesudah, b.kode_barang, b.nama_barang, s.nama_satuan',
                )
                ->where('d.id_transaksi', (int) $id)
                ->get(),
        )->getResultArray();

        return view('admin/inventorinonmedis/detail_transaksi_stok', [
            'judul'        => 'Detail ' . $this->title,
            'breadcrumbs'  => array_merge($this->breadcrumbs, [['title' => 'Detail', 'icon' => 'detail']]),
            'modul_path'   => $this->get_uri_path(),
            'baris'        => $baris,
            'detail_items' => $detail_items,
            'alur'         => (new TransaksiStokService($db))->alur((int) $id),
        ]);
    }
}

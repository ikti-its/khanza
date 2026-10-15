<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Barang;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

final class BarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new BarangModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Barang',              'barang'],
            ],
            'Barang',
            [
                A::READ,
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE,       OPTIONAL, I::INDEX,  'id_barang',       'ID Barang'],
                [SHOW,       REQUIRED, I::TEXT,   'kode_barang',     'Kode Barang'],
                [SHOW,       REQUIRED, I::NAME,   'nama_barang',     'Nama Barang'],
                [SHOW,       REQUIRED, I::SELECT, 'id_satuan',       'Satuan'],
                [SHOW,       REQUIRED, I::SELECT, 'id_jenis_barang', 'Jenis'],
                [TABLE_ONLY, OPTIONAL, I::NUMBER, 'stok',            'Stok'],
                [FORM_ONLY,  OPTIONAL, I::NUMBER, 'stok_minimum',    'Stok Minimum'],
                [SHOW,       OPTIONAL, I::MONEY,  'harga_satuan',    'Harga Satuan'],
            ],
        );
    }

    protected array $row_alert = ['value' => 'stok', 'threshold' => 'stok_minimum'];

    /** Pencarian server (?q=); index() kustom memetakannya ke kolom query di bawah. */
    protected array $search_columns = ['kode_barang', 'nama_barang', 'nama_satuan', 'nama_jenis_barang'];

    // narrows the query-result union (bool|Query|BaseResult) that mago infers
    // for ->get()/->query(), matching ModelTemplate::guarded_get() convention.
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function guarded(mixed $result): \CodeIgniter\Database\BaseResult
    {
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query gagal dieksekusi.');
        return $result;
    }

    // urut berdasarkan nama A-Z
    #[\Override]
    protected function before_read(): void
    {
        $this->model->set_order('nama_barang', 'ASC');
    }

    // tabel kustom: tambah kolom checkbox "pengajuan cepat" untuk barang di bawah stok minimum,
    // tanpa mengubah components/tabel/data.php atau td.php (dipakai semua modul lain)
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    #[\Override]
    public function index(): string|RedirectResponse
    {
        $page = max(1, (int) ($this->request->getGet('page') ?? 1));
        $size = max(1, (int) ($this->request->getGet('size') ?? $this->meta_data['size']));

        // Query yang sama dipakai untuk menghitung total dan mengambil halaman, supaya
        // jumlah halaman mengikuti hasil pencarian. View barang/satuan/jenis = data terdekripsi.
        $keyword = $this->search_keyword();
        $builder = $this
            ->get_db()
            ->table('inventori_non_medis.barang b')
            ->join('inventori_non_medis.satuan s', 'b.id_satuan = s.id_satuan', 'left')
            ->join('inventori_non_medis.jenis_barang j', 'b.id_jenis_barang = j.id_jenis_barang', 'left')
            ->where('b.id_barang !=', 0);
        if ($keyword !== '') {
            // ILIKE cocok sebagian lewat parameter binding; % dan _ di-escape (lihat like_keyword())
            $kw = $this->model->like_keyword($keyword);
            $builder
                ->groupStart()
                ->orLike('b.kode_barang', $kw, 'both', true, true)
                ->orLike('b.nama_barang', $kw, 'both', true, true)
                ->orLike('s.nama_satuan', $kw, 'both', true, true)
                ->orLike('j.nama_jenis_barang', $kw, 'both', true, true)
                ->groupEnd();
        }

        $total_rows  = (int) $builder->countAllResults(false);
        $total_pages = $total_rows > 0 ? (int) ceil($total_rows / $size) : 1;
        $page        = min($page, $total_pages);
        $offset      = ($page - 1) * $size;

        $data_tabel = $this->guarded(
            $builder
                ->select(
                    'b.id_barang, b.kode_barang, b.nama_barang, s.nama_satuan, j.nama_jenis_barang, b.stok, b.stok_minimum, b.harga_satuan',
                )
                ->orderBy('b.nama_barang', 'ASC')
                ->limit($size, $offset)
                ->get(),
        )->getResultArray();

        return view('admin/inventorinonmedis/daftar_barang', [
            'judul'       => $this->title,
            'breadcrumbs' => $this->breadcrumbs,
            'meta_data'   => ['page' => $page, 'size' => $size, 'total' => $total_pages],
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->primary_key,
            'aksi'        => $this->actions,
            'tabel'       => $data_tabel,
            'search_q'    => $keyword,
        ]);
    }

    /** Kode yang tampil di form tambah / ditetapkan untuk penyimpanan yang sedang berjalan. */
    private string $kode_baru = '';

    // form tambah custom dengan modal search satuan dan jenis barang;
    // kode = pratinjau kode berikutnya (kode final ditetapkan ulang saat simpan)
    /**
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    #[\Override]
    public function create_page(): string
    {
        assert($this->model instanceof BarangModel, 'Model harus BarangModel.');
        $this->kode_baru = $this->model->kode_barang_berikutnya();

        return $this->create_view();
    }

    // Kode barang dihasilkan sistem: ditetapkan di dalam transaksi yang sama dengan insert,
    // selama kunci dipegang (pola F13), dan diperiksa duplikatnya sebelum insert.
    /**
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    #[\Override]
    public function create(): string|RedirectResponse
    {
        assert($this->model instanceof BarangModel, 'Model harus BarangModel.');

        $db = $this->get_db();
        try {
            $db->transException(true)->transBegin();
            $this->kode_baru = $this->model->tetapkan_kode_barang();

            $hasil = parent::create(); // before_create() memasang $this->kode_baru
            if (!$hasil instanceof RedirectResponse) {
                $db->transRollback(); // validasi/DB gagal: form sudah dirender ulang dengan pesan error
                return $hasil;
            }
            $db->transCommit();
        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('error', 'Gagal menyimpan: ' . $e->getMessage());
            $this->kode_baru = $this->model->kode_barang_berikutnya(); // pratinjau baru, setelah rollback
            /** @var array<string, mixed> $isian isian form yang baru disubmit */
            $isian = $this->request->getPost();
            return $this->create_view($isian);
        } finally {
            $db->transException(false);
        }

        session()->setFlashdata('success', "Barang {$this->kode_baru} berhasil disimpan.");
        return $hasil;
    }

    // tampilkan form ubah custom (reuse view tambah)
    #[\Override]
    public function update_page(int|string $id): string
    {
        $baris = $this->model->find_one($id);

        return view('admin/inventorinonmedis/tambah_barang', [
            'judul'       => 'Ubah ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, [['title' => 'Ubah', 'icon' => 'ubah']]),
            'modul_path'  => $this->get_uri_path(),
            'form_action' => '/submitedit/' . $id,
            'baris'       => $baris,
        ]);
    }

    /**
     * @throws \CodeIgniter\Exceptions\ModelException
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function list(): ResponseInterface
    {
        $rows = $this->guarded(
            $this->model
                ->builder()
                ->join(
                    'inventori_non_medis.satuan',
                    'inventori_non_medis.satuan.id_satuan = inventori_non_medis.barang.id_satuan',
                    'left',
                )
                ->select(
                    'inventori_non_medis.barang.id_barang, inventori_non_medis.barang.kode_barang, inventori_non_medis.barang.nama_barang, inventori_non_medis.satuan.nama_satuan, inventori_non_medis.barang.stok, inventori_non_medis.barang.harga_satuan',
                )
                ->orderBy('inventori_non_medis.barang.nama_barang', 'ASC')
                ->get(),
        )->getResultArray();

        return $this->response->setJSON(['data' => $rows]);
    }

    /** @param array<array-key, mixed> $postData */
    // stok awal = 0
    #[\Override]
    protected function before_create(array &$postData): void
    {
        $postData['stok']        = 0;
        $postData['kode_barang'] = $this->kode_baru; // abaikan kode kiriman form

        // convert empty FK modal fields to null
        foreach (['id_satuan', 'id_jenis_barang'] as $fk) {
            if (isset($postData[$fk]) && $postData[$fk] === '') {
                $postData[$fk] = null;
            }
        }
    }

    /** @param array<array-key, mixed> $postData */
    // 'stok' bukan bagian dari form ubah (tampil readonly, tanpa name di form),
    // jadi get_post_data() akan mengirim null untuknya kalau tidak dibuang di sini —
    // dan itu melanggar constraint NOT NULL pada kolom stok.
    // 'kode_barang' juga dibuang: kode tidak boleh berubah setelah dibuat, walau POST dimanipulasi.
    #[\Override]
    protected function before_update(array &$postData, int|string $id): void
    {
        unset($postData['stok'], $postData['kode_barang']);

        foreach (['id_satuan', 'id_jenis_barang'] as $fk) {
            if (isset($postData[$fk]) && $postData[$fk] === '') {
                $postData[$fk] = null;
            }
        }
    }

    // form tambah (juga saat gagal simpan): view custom yang sama, bukan layout generik.
    // Kode diambil dari $kode_baru, bukan query ulang: transaksinya mungkin sudah batal.
    #[\Override]
    protected function create_view(array $baris = []): string
    {
        $baris['kode_barang'] = $this->kode_baru;

        return view('admin/inventorinonmedis/tambah_barang', [
            'judul'       => 'Tambah ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, [['title' => 'Tambah', 'icon' => 'tambah']]),
            'modul_path'  => $this->get_uri_path(),
            'form_action' => '/submittambah/',
            'baris'       => $baris,
        ]);
    }

    // form ubah gagal validasi: render ulang view custom yang sama dengan input yang baru disubmit
    #[\Override]
    protected function update_error_view(int|string $id, string $msg, array $postData = []): string
    {
        session()->setFlashdata('error', $msg);
        $data  = $this->model->find_one($id);
        $baris = array_merge($data ?? [], $postData);

        return view('admin/inventorinonmedis/tambah_barang', [
            'judul'       => 'Ubah ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, [['title' => 'Ubah', 'icon' => 'ubah']]),
            'modul_path'  => $this->get_uri_path(),
            'form_action' => '/submitedit/' . $id,
            'baris'       => $baris,
        ]);
    }

    // Guard hapus: FK dari tabel detail ke barang tidak aktif di jalur data nyata
    // (lihat BarangModel::is_referenced), jadi penolakan ditegakkan di sini —
    // teks pesan disamakan dengan friendly_db_error() untuk pelanggaran FK.
    #[\Override]
    public function delete(int|string $id): string|RedirectResponse
    {
        assert($this->model instanceof BarangModel, 'Model harus BarangModel.');

        try {
            $referenced = $this->model->is_referenced((int) $id);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            log_message('error', 'Barang::delete gagal cek referensi: ' . $e->getMessage());
            $referenced = true; // fail-safe: blokir hapus daripada meninggalkan data yatim
        }

        if ($referenced) {
            session()->setFlashdata('error', 'Data tidak dapat dihapus karena masih digunakan oleh data lain.');
            return $this->home();
        }

        return parent::delete($id);
    }
}

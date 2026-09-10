<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\JenisBarang;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

final class JenisBarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new JenisBarangModel(),
            [
                ['Inventori Non Medis', 'inventori_non_medis'],
                ['Jenis Barang',        'jenis_barang'],
            ],
            'Jenis Barang',
            [
                A::READ,
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_barang',   'ID'],
                [SHOW, REQUIRED, I::TEXT,  'kode_jenis_barang', 'Kode Jenis'],
                [SHOW, REQUIRED, I::NAME,  'nama_jenis_barang', 'Jenis Barang'],
            ],
        );
    }

    // narrows the query-result union (bool|Query|BaseResult) that mago infers
    // for ->get()/->query(), matching ModelTemplate::guarded_get() convention.
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function guarded(mixed $result): \CodeIgniter\Database\BaseResult
    {
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query gagal dieksekusi.');
        return $result;
    }

    /**
     * @throws \CodeIgniter\Exceptions\ModelException
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function list(): ResponseInterface
    {
        $data = $this->guarded(
            $this->model
                ->builder()
                ->select('id_jenis_barang, kode_jenis_barang, nama_jenis_barang')
                ->orderBy('nama_jenis_barang', 'ASC')
                ->get(),
        )->getResultArray();

        return $this->response->setJSON(['data' => $data]);
    }

    // urut berdasarkan nama A-Z
    #[\Override]
    protected function before_read(): void
    {
        $this->model->set_order('nama_jenis_barang', 'ASC');
    }

    // Guard hapus: FK dari barang & permintaan_barang_detail ke jenis_barang tidak
    // aktif di jalur data nyata (lihat JenisBarangModel::is_referenced), jadi
    // penolakan ditegakkan di sini — teks pesan disamakan dengan friendly_db_error().
    #[\Override]
    public function delete(int|string $id): string|RedirectResponse
    {
        assert($this->model instanceof JenisBarangModel, 'Model harus JenisBarangModel.');

        try {
            $referenced = $this->model->is_referenced((int) $id);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            log_message('error', 'JenisBarang::delete gagal cek referensi: ' . $e->getMessage());
            $referenced = true;
        }

        if ($referenced) {
            session()->setFlashdata('error', 'Data tidak dapat dihapus karena masih digunakan oleh data lain.');
            return $this->home();
        }

        return parent::delete($id);
    }
}

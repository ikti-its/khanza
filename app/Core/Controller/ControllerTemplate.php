<?php
declare(strict_types=1);

namespace App\Core\Controller;
use App\Core\Model\ModelTemplate;
use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\RedirectResponse;

/** @mago-expect lint:too-many-methods */
class ControllerTemplate extends Controller
{
    private array $meta_data;
    private string $primary_key;
    /** @var list<array{
     *    title: string,
     *    icon: string,
     * }> */
    protected array $breadcrumbs;
    
    /** @var array<int, array{
     *  0: 0|1,
     *  1: string,
     *  2: string,
     *  3: string|InputType,
     *  4: 0|1,
     * }> */
    private array $fields;

    /**
     * @var array<string, bool>
     */
    private array $actions;
    public function __construct(
        protected ModelTemplate $model,
        /** @var list<list<string>> */
        protected array $breadcrumb,
        /** @var non-empty-string */
        protected string $title,
        /** @var  list<ActionType> */
        protected array $action,
        /** @var array<int, array{
         *  0: 0|1,
         *  1: 0|1,
         *  2: InputType,
         *  3: string,
         *  4: string,
         * }> */
        protected array $field,
        
    ) {
        $this->reorder_fields();
        $this->process_fields();
        $this->process_action();
        $this->process_breadcrumbs();
        $this->primary_key = $this->model->get_primary_key();
        $this->meta_data = ['page' => 1, 'size' => 10, 'total' => 1];
    }

    private function get_uri_path(): string {
        $segments = $this->request->getUri()->getSegments();
        while (count($segments) > 2) {
            array_pop($segments);
        }
        return '/' . implode('/', $segments);
    }

    /**
     * @return array<string, mixed>
     */
    private function get_post_data(): array
    {
        $postData = [];
        foreach ($this->fields as $f) {
            [$_required, $name, $column, $type, $_show] = $f;

            if ($column === $this->primary_key) continue;

            $raw_data = $this->request->getPost($column);
            if (in_array($type, ['jumlah', 'uang', 'suhu'])) {
                $raw_data = floatval($raw_data);
            }
            $postData[$column] = $raw_data;
        }
        return $postData;
    }

    private function process_fields(): void {
        for($i = 0; $i < count($this->fields); $i++){
            $input_type = $this->fields[$i][3];
            if($input_type instanceof InputType){
                $this->fields[$i][3] = $input_type->value;
            }
        }
    }

    private function reorder_fields(): void {
        for($i = 0; $i < count($this->field); $i++){
            [$show, $required, $type, $column, $name] = $this->field[$i];
            $this->fields[$i] = [$show, $name, $column, $type, $required];
            // Elemen ke-6 (index 5) opsional: opsi statis untuk dropdown enum
            // Format: [['Label', 'value'], ['Label2', 'value2'], ...]
            if (isset($this->field[$i][5])) {
                $this->fields[$i][5] = $this->field[$i][5];
            }
        }
    }

    private function process_action(): void {
        $action = [
            'tambah' => false,
            'audit'  => false,
            'ubah'   => false,
            'hapus'  => false,
        ];
        foreach ($this->action as $a) {
            if (!$a instanceof ActionType) {
                continue;
            }
            // READ hanya penanda permission, bukan tombol aksi — tidak perlu dikirim ke view
            if ($a === ActionType::READ) {
                continue;
            }
            $action[$a->value] = true;
        }
        $this->actions = $action;
    }

    private function process_breadcrumbs(): void{
        for($i = 0; $i < count($this->breadcrumb); $i++){
            $curr = $this->breadcrumb[$i];
            $title = $curr[0];
            $icon  = $curr[1];
            $this->breadcrumbs[$i] = [
                'title' => $title,
                'icon'  => $icon,
            ];
        }
    }

    final public function index(): string
    {
        return view('/layouts/data', [
            'judul'       => $this->title,
            'breadcrumbs' => $this->breadcrumbs,
            'meta_data'   => $this->meta_data,
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->primary_key,
            'konfig'      => $this->fields,
            'aksi'        => $this->actions,
            'tabel'       => $this->model->findAll(),
        ]);
    }

    final public function audit(): string
    {
        $audit_konfig = [
            // [1, 'Nomor Perubahan'  , 'change_id' , 'indeks'],
            [1, 'Nama', 'nama', 'teks'],
            [1, 'Aksi Perubahan', 'action', 'status'],
            [1, 'IP Address', 'user_ip', 'teks'],
            [1, 'MAC Address', 'user_mac', 'teks'],
            // [1, 'Pengubah'         , 'changed_by', 'indeks'],
            [1, 'Tanggal Perubahan', 'changed_at', 'tanggal'],
        ];
        $breadcrumbs = [
            ['title' => 'Audit', 'icon', 'audit']
        ];
        return view('/layouts/audit', [
            'judul'       => 'Audit ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'meta_data'   => $this->meta_data,
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => 'action',
            'konfig'      => array_merge($audit_konfig, $this->fields),
            'tabel'       => $this->model->audit(),
        ]);
    }

    private function get_fields_with_options(bool $include_pk = false): array
    {
        $all_options = $this->model->get_all_options();
        $result = [];

        foreach ($this->fields as $field) {
            [$visible, , $column, $type] = $field;

            if ($visible === 0 && !($include_pk && $column === $this->primary_key)) {
                continue;
            }

            if ($type === 'status') {
                if (isset($all_options[$column])) {
                    // Opsi dari FK (tabel referensi) — prioritas utama
                    $field[5] = $all_options[$column];
                }
                // Jika tidak ada FK, opsi statis sudah ada di $field[5] dari reorder_fields()
            }

            $result[] = $field;
        }

        return $result;
    }

    final public function create_page(): string
    {
        $breadcrumbs = [
            ['title' => 'Tambah', 'icon', 'tambah']
        ];
        return view('/layouts/tambah_ubah', [
            'judul'       => 'Tambah ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->primary_key,
            'konfig'      => $this->get_fields_with_options(false),
            'form_action' => '/submittambah/',
        ]);
    }

    final public function update_page(int|string $id): string
    {
        if ($id == 0) return $this->index();

        $breadcrumbs = [
            ['title' => 'Ubah', 'icon', 'Ubah']
        ];
        $data  = $this->model->find($id);
        return view('/layouts/tambah_ubah', [
            'judul'       => 'Ubah ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->primary_key,
            'konfig'      => $this->get_fields_with_options(true),
            'baris'       => $data,
            'form_action' => '/submitedit/' . $id,
        ]);
    }

    /** Extract a user-friendly message from a DatabaseException */
    private function friendly_db_error(DatabaseException $e): string
    {
        $msg = $e->getMessage();
        if (str_contains($msg, 'violates foreign key constraint')) {
            return 'Data tidak dapat dihapus atau diubah karena masih digunakan oleh data lain.';
        }
        if (str_contains($msg, 'duplicate key') || str_contains($msg, 'unique constraint')) {
            return 'Data sudah ada. Gunakan nilai yang berbeda.';
        }
        if (str_contains($msg, 'not-null constraint') || str_contains($msg, 'violates not-null')) {
            return 'Ada kolom wajib yang belum diisi.';
        }
        return $msg;
    }

    final public function create(): string|RedirectResponse
    {
        /** @var array<string, scalar|null> $postData */
        $postData = $this->get_post_data();
        try {
            $this->model->insert($postData);
        } catch(\ReflectionException $e){
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->to($this->get_uri_path() . '/data');
        } catch(DatabaseException $e){
            $errMsg = $this->friendly_db_error($e);
            session()->setFlashdata('error', $errMsg);
            $breadcrumbs = [
                ['title' => 'Tambah', 'icon', 'tambah']
            ];
            return view('/layouts/tambah_ubah', [
                'judul'       => 'Tambah ' . $this->title,
                'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
                'modul_path'  => $this->get_uri_path(),
                'kolom_id'    => $this->primary_key,
                'konfig'      => $this->get_fields_with_options(false),
                'form_action' => '/submittambah/',
            ]);
        }

        return redirect()->to($this->get_uri_path() . '/data');
    }

    final public function update(int|string $id): string|RedirectResponse
    {
        if ($id == 0) return redirect()->to($this->get_uri_path() . '/data');

        /** @var array<string, scalar|null> $postData */
        $postData = $this->get_post_data();
        try {
            $this->model->update($id, $postData);
        } catch(\ReflectionException $e){
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->to($this->get_uri_path() . '/data');
        } catch(DatabaseException $e){
            $errMsg = $this->friendly_db_error($e);
            session()->setFlashdata('error', $errMsg);
            $breadcrumbs = [
                ['title' => 'Ubah', 'icon', 'Ubah']
            ];
            $data = $this->model->find($id);
            return view('/layouts/tambah_ubah', [
                'judul'       => 'Ubah ' . $this->title,
                'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
                'modul_path'  => $this->get_uri_path(),
                'kolom_id'    => $this->primary_key,
                'konfig'      => $this->get_fields_with_options(true),
                'baris'       => $data,
                'form_action' => '/submitedit/' . $id,
            ]);
        }

        return redirect()->to($this->get_uri_path() . '/data');
    }

    final public function delete(int|string $id): string|RedirectResponse
    {
        if ($id == 0) return redirect()->to($this->get_uri_path() . '/data');

        try {
            $this->model->delete($id);
        } catch(DatabaseException $e){
            session()->setFlashdata('error', $this->friendly_db_error($e));
        }

        return redirect()->to($this->get_uri_path() . '/data');
    }

    public function print(int|string $id): string
    {
        if (in_array(ActionType::PRINT, $this->actions, true)) {
            return view('components/cetak/template', ['id' => $id]);
        }
        return $this->index();
    }
}

<?php
declare(strict_types=1);

namespace App\Core\Controller;
use App\Core\Model\ModelTemplate;
use CodeIgniter\Controller;

class ControllerTemplate extends Controller
{
    public function __construct(
        protected ModelTemplate|null $model = null,
        protected array $breadcrumbs = [],
        protected string $judul = '',
        protected string $modul_path = '',
        protected string $api_path = '',
        protected string $nama_tabel = '',
        protected string $kolom_id = '',
        protected array $aksi = [],
        protected array $konfig = [],
        protected array $meta_data = ['page' => 1, 'size' => 10, 'total' => 1],
        protected string $api_url =  '',
    ) {
        $this->api_url = getenv('api_URL');
        $this->reorder_config();
        $this->process_config();
    }

    private function get_uri_path(){
        $segments = $this->request->getUri()->getSegments();
        while (count($segments) > 2) {
            array_pop($segments);
        }

        $parentPath = '/' . implode('/', $segments);
        return $parentPath;
    }

    private function get_post_data()
    {
        $KOLOM = 2;
        $JENIS = 3;
        $postData = [];
        foreach ($this->konfig as $k) {
            $kolom = $k[$KOLOM];
            $jenis = $k[$JENIS];
            $raw_data = $this->request->getPost($kolom);
            if (in_array($jenis, ['jumlah', 'uang', 'suhu'])) {
                $raw_data = floatval($raw_data);
            }
            $postData[$kolom] = $raw_data;
        }
        return $postData;
    }

    private function process_config(){
        $JENIS = 3;
        for($i = 0; $i < count($this->konfig); $i++){
            $input_type = $this->konfig[$i][$JENIS];
            if($input_type instanceof InputType)
                $this->konfig[$i][$JENIS] = $this->konfig[$i][$JENIS]->value;
        }
    }

    private function reorder_config(){
        for($i = 0; $i < count($this->konfig); $i++){
            $c = $this->konfig[$i];
            $this->konfig[$i] = [$c[0], $c[4], $c[3], $c[2], $c[1]];
        }
    }

    final public function index()
    {
        return view('/layouts/data', [
            'judul'       => $this->judul,
            'breadcrumbs' => $this->breadcrumbs,
            'meta_data'   => $this->meta_data,
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->model->get_primary_key(),
            'konfig'      => $this->konfig,
            'aksi'        => $this->aksi,
            'tabel'       => $this->model->findAll(),
        ]);
    }

    final public function audit()
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
            'judul'       => 'Audit ' . $this->judul,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'meta_data'   => $this->meta_data,
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => 'action',
            'konfig'      => array_merge($audit_konfig, $this->konfig),
            'tabel'       => $this->model->audit(),
        ]);
    }

    final public function create_page()
    {
        $breadcrumbs = [
            ['title' => 'Tambah', 'icon', 'tambah']
        ];
        return view('/layouts/tambah_ubah', [
            'judul'       => 'Tambah ' . $this->judul,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->model->get_primary_key(),
            'konfig'      => $this->konfig,
            'form_action' => '/submittambah/',
        ]);
    }
    final public function update_page($id)
    {
        $breadcrumbs = [
            ['title' => 'Ubah', 'icon', 'Ubah']
        ];
        $data  = $this->model->find($id);
        return view('/layouts/tambah_ubah', [
            'judul'       => 'Ubah ' . $this->judul,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->model->get_primary_key(),
            'konfig'      => $this->konfig,
            'baris'       => $data,
            'form_action' => '/submitedit/' . $data[$this->model->get_primary_key()],
        ]);
    }

    final public function create()
    {
        $postData = $this->get_post_data();
        $this->model->insert($postData);
        return $this->index();
    }

    final public function update($id)
    {
        $postData = $this->get_post_data();
        $this->model->update($id, $postData);
        return $this->index();
    }

    final public function delete($id)
    {   
        $this->model->delete($id);
        return $this->index();        
    }
}

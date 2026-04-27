<?php
declare(strict_types=1);

namespace App\Core\Controller;
use App\Core\Model\ModelTemplate;
use CodeIgniter\Controller;

class ControllerTemplate extends Controller
{
    public function __construct(
        protected ModelTemplate|null $model,
        protected array $breadcrumbs,
        protected string $title,
        protected array $action,
        protected array $fields,
        private array $meta_data = [],
        private array|string $primary_keys = ''
    ) {
        $this->reorder_fields();
        $this->process_fields();
        $this->process_action();
        $this->process_breadcrumbs();
        $this->primary_keys = $this->model->get_primary_key();
        $this->meta_data = ['page' => 1, 'size' => 10, 'total' => 1];
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
        $column = 2;
        $type = 3;
        $postData = [];
        foreach ($this->fields as $k) {
            $kolom = $k[$column];
            $jenis = $k[$type];
            $raw_data = $this->request->getPost($kolom);
            if (in_array($jenis, ['jumlah', 'uang', 'suhu'])) {
                $raw_data = floatval($raw_data);
            }
            $postData[$kolom] = $raw_data;
        }
        return $postData;
    }

    private function process_fields(){
        $type = 3;
        for($i = 0; $i < count($this->fields); $i++){
            $input_type = $this->fields[$i][$type];
            if($input_type instanceof InputType)
                $this->fields[$i][$type] = $this->fields[$i][$type]->value;
        }
    }

    private function reorder_fields(){
        for($i = 0; $i < count($this->fields); $i++){
            $c = $this->fields[$i];
            $this->fields[$i] = [$c[0], $c[4], $c[3], $c[2], $c[1]];
        }
    }

    private function process_action(){
        $action = [
            'tambah' => false,
            'audit'  => false,
            'ubah'   => false,
            'hapus'  => false,
        ];
        foreach($this->action as $a){
            if ($a instanceof ActionType)
                $action[$a->value] = true;
        }
        $this->action = $action;
    }

    private function process_breadcrumbs(){
        for($i = 0; $i < count($this->breadcrumbs); $i++){
            $curr = $this->breadcrumbs[$i];
            $title = $curr[0];
            $icon  = $curr[1];
            $this->breadcrumbs[$i] = [
                'title' => $title,
                'icon'  => $icon,
            ];
        }
    }

    final public function index()
    {
        return view('/layouts/data', [
            'judul'       => $this->title,
            'breadcrumbs' => $this->breadcrumbs,
            'meta_data'   => $this->meta_data,
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->primary_keys,
            'konfig'      => $this->fields,
            'aksi'        => $this->action,
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
            'judul'       => 'Audit ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'meta_data'   => $this->meta_data,
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => 'action',
            'konfig'      => array_merge($audit_konfig, $this->fields),
            'tabel'       => $this->model->audit(),
        ]);
    }

    final public function create_page()
    {
        $breadcrumbs = [
            ['title' => 'Tambah', 'icon', 'tambah']
        ];
        return view('/layouts/tambah_ubah', [
            'judul'       => 'Tambah ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->primary_keys,
            'konfig'      => $this->fields,
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
            'judul'       => 'Ubah ' . $this->title,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'  => $this->get_uri_path(),
            'kolom_id'    => $this->primary_keys,
            'konfig'      => $this->fields,
            'baris'       => $data,
            'form_action' => '/submitedit/' . $data[$this->primary_keys],
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

    final public function print(){
        if(in_array(ActionType::PRINT, $this->action)){
            echo view('components/cetak/template');
        } else {
            return $this->index();
        }
    }
}

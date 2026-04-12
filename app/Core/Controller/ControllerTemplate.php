<?php
declare(strict_types=1);

namespace App\Core\Controller;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class ControllerTemplate extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        // Preload any models, libraries, etc, here.
        // E.g.: $this->session = \Config\Services::session();
    }

    protected string $api_url;

    public function __construct(
        protected array $breadcrumbs = [],
        protected string $judul,
        protected string $modul_path,
        protected string $api_path,
        protected string $nama_tabel,
        protected string $kolom_id,
        protected array $aksi,
        protected array $konfig,
        protected array $meta_data,
    ) {
        $this->api_url = getenv('api_URL');
        // Check notifications and set session variable
        // $this->checkNotifications();
    }

    protected function addBreadcrumb($title, $icon = '')
    {
        $this->breadcrumbs[] = [
            'title' => $title,
            'icon' => $icon
        ];
    }

    protected function fetchDataUsingCurl($method, $path, $data = null, $redirect_url = null, $redirect_msg = null)
    {
        CURL::fetchDataUsingCurl($method, $path, $data, $redirect_url, $redirect_msg);
    }

    private function getPostData()
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

    protected function renderErrorView($status_code, $custom_message = null)
    {
        return HTTPError::renderErrorView($status_code, $custom_message);
    }

    public function tampilData()
    {
        $tabel = $this->fetchDataUsingCurl('GET', $this->api_path)['data']['data'];
        return view('/layouts/data', [
            'judul'       => $this->judul,
            'breadcrumbs' => $this->breadcrumbs,
            'meta_data'   => $this->meta_data,
            'modul_path'  => $this->modul_path,
            'kolom_id'    => $this->kolom_id,
            'konfig'      => $this->konfig,
            'aksi'        => $this->aksi,
            'tabel'       => $tabel,
        ]);
    }
    public function tampilAudit()
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
            'modul_path'  => $this->modul_path . '/audit',
            'kolom_id'    => 'action',
            'konfig'      => array_merge($audit_konfig, $this->konfig),
            'tabel'       => Audit::GetAuditData($this->nama_tabel)
        ]);
    }
    public function tampilTambah()
    {
        $breadcrumbs = [
            ['title' => 'Tambah', 'icon', 'tambah']
        ];
        return view('/layouts/tambah_ubah', [
            'judul'       => 'Tambah ' . $this->judul,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'  => $this->modul_path,
            'kolom_id'    => $this->kolom_id,
            'konfig'      => $this->konfig,
            'form_action' => '/submittambah/',
        ]);
    }
    public function tampilUbah($id)
    {
        $breadcrumbs = [
            ['title' => 'Ubah', 'icon', 'Ubah']
        ];
        $baris = $this->fetchDataUsingCurl('GET', $this->api_path . '/' . $id)['data']['data'];
        return view('/layouts/tambah_ubah', [
            'judul'       => 'Ubah ' . $this->judul,
            'breadcrumbs' => array_merge($this->breadcrumbs, $breadcrumbs),
            'modul_path'  => $this->modul_path,
            'kolom_id'    => $this->kolom_id,
            'konfig'      => $this->konfig,
            'baris'       => $baris,
            'form_action' => '/submitedit/' . $baris[$this->kolom_id],
        ]);
    }
    public function simpanTambah()
    {
        $postData = $this->getPostData();
        return $this->fetchDataUsingCurl('POST', $this->api_path, $postData, $this->modul_path);
    }
    public function simpanUbah($id)
    {
        $postData = $this->getPostData();
        return $this->fetchDataUsingCurl('PUT', $this->api_path . '/' . $id, $postData, $this->modul_path, $this->judul . ' berhasil diperbarui.');
    }

    public function hapusData($id)
    {
        return $this->fetchDataUsingCurl('DELETE', $this->api_path . '/' . $id, null, $this->modul_path, $this->judul . ' berhasil dihapus.');
    }

     // public function checkNotifications()
    // {
    //     // Get user ID from session
    //     dd(session()->get('user_details'));
    //     $userId = session()->get('user_details')['id'];
    //     $token = session()->get('jwt_token');

    //     // API URL to check notifications
    //     $notif_url = $this->api_url . '/w/notification/' . $userId;

    //     // Initialize cURL session for fetching notifications
    //     $ch = curl_init($notif_url);

    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'Content-Type: application/json',
    //         'Authorization: Bearer ' . $token,
    //     ]);

    //     // Execute the cURL request
    //     $response = curl_exec($ch);
    //     $http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    //     // Check for cURL errors
    //     if ($response === false) {
    //         $error_message = curl_error($ch);
    //         log_message('error', 'cURL Error: ' . $error_message);
    //         return; // Exit method on error
    //     }

    //     // Check HTTP status code
    //     if ($http_status_code !== 200) {
    //         log_message('error', 'HTTP Error: ' . $http_status_code);
    //         return; // Exit method on HTTP error
    //     }

    //     // Decode the JSON response
    //     $data = json_decode($response, true);

    //     // Log the data for debugging purposes
    //     log_message('debug', 'Notification API Response: ' . print_r($data, true));

    //     // Initialize notification count
    //     $notificationCount = 0;

    //     // Check if there are notifications
    //     if (isset($data['data']) && is_array($data['data'])) {
    //         // Count the number of notifications
    //         $notificationCount = count($data['data']);
    //     }

    //     // Store notification count in session or do further processing as needed
    //     session()->set('notification_count', $notificationCount);
    //     session()->set('notif_data', $data['data']);
    // }
}

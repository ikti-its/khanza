<?php
declare(strict_types=1);

namespace App\Core\Database\Special;
use CodeIgniter\Database\Migration;

class Encrypt extends Migration
{
    const string PATH = APPPATH . 'Core/Database/Encrypt/';
    public function up()
    {
        // $config = new \Config\Database()->default;
        // $config['database'] = env('database.default.khanza_db');
        // $this->db = \Config\Database::connect($config);
        // $this->forge = \Config\Database::forge($this->db);

        // $this->db->query('CREATE EXTENSION IF NOT EXISTS pgcrypto;');
        // $this->db->query(file_get_contents(self::PATH . 'rename_original_table.sql'));
        // $this->db->query(file_get_contents(self::PATH . 'create_encrypted_table.sql'));
        // $this->db->query(file_get_contents(self::PATH . 'create_encrypted_view.sql'));
    }
    
    public function down()
    {
        // $config = new \Config\Database()->default;
        // $config['database'] = env('database.default.khanza_db');
        // $this->db = \Config\Database::connect($config);
        // $this->forge = \Config\Database::forge($this->db);

        // $this->db->query(file_get_contents(self::PATH . 'drop_function.sql'));
        // $this->db->query(file_get_contents(self::PATH . 'drop_encrypted_view.sql'));
        // $this->db->query(file_get_contents(self::PATH . 'drop_encrypted_table.sql'));
    }
}
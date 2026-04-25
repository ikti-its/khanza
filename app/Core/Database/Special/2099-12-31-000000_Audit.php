<?php
declare(strict_types=1);

namespace App\Core\Database\Special;
use CodeIgniter\Database\Migration;

class Audit extends Migration
{
    const string PATH = APPPATH . 'Core/Database/Audit/';
    public function up()
    {
        // $config = new \Config\Database()->default;
        // $config['database'] = env('database.default.khanza_db');
        // $this->db = \Config\Database::connect($config);
        // $this->forge = \Config\Database::forge($this->db);

        // $this->db->query('CREATE EXTENSION IF NOT EXISTS pgcrypto;');
        // $this->db->query(file_get_contents(self::PATH . 'create_audit_table.sql'));
        // $this->db->query(file_get_contents(self::PATH . 'create_audit_view.sql'));
    }
    
    public function down()
    {
        // $config = new \Config\Database()->default;
        // $config['database'] = env('database.default.khanza_db');
        // $this->db = \Config\Database::connect($config);
        // $this->forge = \Config\Database::forge($this->db);

        // $this->db->query(file_get_contents(self::PATH . 'drop_audit_table.sql'));
        // $this->db->query(file_get_contents(self::PATH . 'drop_audit_view.sql'));
    }
}
<?php
declare(strict_types=1);

namespace App\Core\Database\Special;
use App\Core\Database\Template\DatabaseTemplate;

final class AuditDatabase extends DatabaseTemplate
{    
    #[\Override()]
    public function up(): void
    {
        // $config = new \Config\Database()->default;
        // $config['database'] = env('database.default.khanza_db');
        // $this->db = \Config\Database::connect($config);
        // $this->forge = \Config\Database::forge($this->db);

        // $this->db->query('CREATE EXTENSION IF NOT EXISTS pgcrypto;');
        // $this->db->query(file_get_contents(self::PATH . 'create_audit_table.sql'));
        // $this->db->query(file_get_contents(self::PATH . 'create_audit_view.sql'));
    }
    
    #[\Override()]
    public function down(): void
    {
        // $config = new \Config\Database()->default;
        // $config['database'] = env('database.default.khanza_db');
        // $this->db = \Config\Database::connect($config);
        // $this->forge = \Config\Database::forge($this->db);

        // $this->db->query(file_get_contents(self::PATH . 'drop_audit_table.sql'));
        // $this->db->query(file_get_contents(self::PATH . 'drop_audit_view.sql'));
    }

    #[\Override()]
    public function dependencies(): array {
        return [];
    }
}
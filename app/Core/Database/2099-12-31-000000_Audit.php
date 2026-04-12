<?php
declare(strict_types=1);

namespace App\Core\Database;
use CodeIgniter\Database\Migration;
use App\Core\Assert;


class Audit extends Migration
{
    const string PATH = APPPATH . 'Core/Database/Audit/';
    public function up()
    {
        $this->db->query(file_get_contents(self::PATH . 'create_audit_table.sql'));
        $this->db->query(file_get_contents(self::PATH . 'create_audit_view.sql'));
    }
    public function down()
    {
        $this->db->query(file_get_contents(self::PATH . 'drop_audit_table.sql'));
        $this->db->query(file_get_contents(self::PATH . 'drop_audit_view.sql'));
    }
}
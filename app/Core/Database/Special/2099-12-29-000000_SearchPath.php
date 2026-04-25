<?php
declare(strict_types=1);

namespace App\Core\Database\Special;
use CodeIgniter\Database\Migration;

class SearchPath extends Migration
{
    public function up()
    {
        $config = new \Config\Database()->default;
        $db_name = env('database.default.khanza_db');
        $config['database'] = $db_name;
        $this->db = \Config\Database::connect($config);
        $this->forge = \Config\Database::forge($this->db);
        
        $schemas =  $this->db->query(
            "SELECT schema_name
            FROM information_schema.schemata
            WHERE schema_name NOT LIKE 'pg_%'
            AND schema_name <> 'information_schema'
            ORDER BY schema_name;"
        )->getResultArray();

        $schema_list = [];
        foreach($schemas as $s){
            $schema_list[] = $s['schema_name'];
        }

        $schema_string = ''.implode(', ',  $schema_list);
        echo $schema_string;
        $this->db->query("
            ALTER DATABASE $db_name
            SET search_path TO $schema_string
        ");


    }
    
    public function down()
    {
        $config = new \Config\Database()->default;
        $db_name = env('database.default.khanza_db');
        $config['database'] = $db_name;
        $this->db = \Config\Database::connect($config);
        $this->forge = \Config\Database::forge($this->db);

        $this->db->query("
            ALTER DATABASE $db_name
            RESET search_path
        ");
    }
}
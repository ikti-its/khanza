<?php
declare(strict_types=1);

namespace App\Core\Database;
use CodeIgniter\Database\Migration;
use App\Core\Controller\Assert;

class Init extends Migration
{
    public function up()
    { 
        $_db = \Config\Database::connect();
        $_forge = \Config\Database::forge($_db);
        $_forge->createDatabase('khanza_db', true);   
        
        $config = new \Config\Database()->default;
        $config['database'] = env('database.default.khanza_db');

        $db = \Config\Database::connect($config);
        $path = APPPATH . 'Core/Database/Backup/';
        
        foreach(['migration', 'function'] as $type) {
            $file = $path . $type . '.sql';
            if(!file_exists($file)) {
                Assert::Unreachable("SQL file for '$type' not found at '$file'");
            }
            $sql = file_get_contents($file);
            $db->query($sql);
        }
    }
    public function down()
    {
        $forge = \Config\Database::forge();
        $forge->dropDatabase('khanza_db');
    }
}
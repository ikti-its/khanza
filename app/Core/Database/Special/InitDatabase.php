<?php
declare(strict_types=1);

namespace App\Core\Database\Special;
use CodeIgniter\Database\Migration;
use App\Core\Controller\Assert;
use CodeIgniter\Database\Exceptions\DatabaseException;

final class InitDatabase extends Migration
{
    #[\Override()]
    public function up()
    { 
        $_db = \Config\Database::connect();
        $_forge = \Config\Database::forge($_db);
        try {
            $_forge->createDatabase('khanza_db', true);
        } catch (DatabaseException $e){
            Assert::Unreachable('There is a problem during db initilization in InitDatabase');
        }
           
        $config = new \Config\Database()->default;
        $config['database'] = env('database.default.khanza_db');

        $db = \Config\Database::connect($config);
        $path = APPPATH . 'Core/Database/Backup/';
        
        foreach(['migration', 'seeder', 'function'] as $type) {
            $file = $path . $type . '.sql';
            if(!file_exists($file)) {
                Assert::Unreachable("SQL file for '$type' not found at '$file'");
            }
            $sql = (string) file_get_contents($file);
            $db->query($sql);
        }
    }
    
    #[\Override()]
    public function down()
    {
        // $forge = \Config\Database::forge();
        // $forge->dropDatabase('khanza_db');
    }

    public function dependencies(): array {
        return [];
    }
}
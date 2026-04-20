<?php
declare(strict_types=1);

namespace App\Core\Database;
use CodeIgniter\Database\Migration;
use App\Core\Controller\Assert;
use App\Core\Database\DatabaseType;

class DatabaseTemplate extends Migration
{
    /**
     * @var array<array<string>>
     */
    protected array $index = [];
    public function __construct(
        protected string $schema,
        protected string $table,
        /**
         * @var array<string, DatabaseType>
         */
        protected array $fields,
        /**
         * @var string|array<string>
         */
        protected string|array $primary_key = '',
        /**
         * @var string|array<string>|array<array<string>>
         */
        protected string|array $unique_key = '',
        /**
         * @var array<int, array{
         *   0: array<string>,
         *   1: string,
         *   2: array<string>,
         * }>|array{
         *   0: array<string>,
         *   1: string,
         *   2: array<string>,
         * }>|
         */
        protected array $foreign_key = [],
        protected bool $data_is_real = false,
        protected string $source = '', 
    ) {
        parent::__construct();
    }
    
    private function setup(){
         
        foreach ($this->fields as $name => $type) {
            $this->fields[$name] = $type->definition();
        }

        $config = new \Config\Database()->default;
        $config['database'] = env('database.default.khanza_db');

        $this->db = \Config\Database::connect($config);
        $this->forge = \Config\Database::forge($this->db);
    }
    private function add_primary_key(): void {
        if($this->primary_key == [])
            Assert::Unreachable("Primary key must be defined");
        foreach ($this->primary_key as $field) {
            if(!array_key_exists($field, $this->fields))
                Assert::Unreachable("Primary key field '$field' is not defined in fields");
            if(in_array($field, $this->unique_key))
                Assert::Unreachable("Primary key field '$field' cannot be in unique key");
            if(in_array($field, $this->index))
                Assert::Unreachable("Primary key field '$field' cannot be in index");
            if($this->fields[$field]['null'])
                Assert::Unreachable("Primary key field '$field' cannot be nullable");
            if(!$this->fields[$field]['auto_increment'] ?? false)
                Assert::Unreachable("Primary key field '$field' must use IDx() type with auto_increment");
        }
        $this->forge->addPrimaryKey($this->primary_key);
    }

    private function add_unique_key(): void {
        foreach ($this->unique_key as $keys) {
            foreach ($keys as $field) {
                if(!array_key_exists($field, $this->fields))
                    Assert::Unreachable("Unique key field '$field' is not defined in fields");
                if(in_array($field, $this->primary_key))
                    Assert::Unreachable("Unique key field '$field' cannot be in primary key");
                if(in_array($field, $this->index))
                    Assert::Unreachable("Unique key field '$field' cannot be in index");
            }
            $this->forge->addUniqueKey($keys);
        }
    }

    private function add_foreign_key(): void {
        foreach ($this->foreign_key as $fk) {
            [$fields, $referenced_table, $referenced_fields, $on_update, $on_delete] = $fk;
            foreach ($fields as $field) {
                if(!array_key_exists($field, $this->fields))
                    Assert::Unreachable("Foreign key field '$field' is not defined in fields");
            }
            $this->forge->addForeignKey($fields, $referenced_table, $referenced_fields, $on_update, $on_delete);
        }
    }

    private function add_index(): void {
        foreach ($this->index as $keys) {
            foreach ($keys as $field) {
                if(!array_key_exists($field, $this->fields))
                    Assert::Unreachable("Index field '$field' is not defined in fields");
                if(in_array($field, $this->primary_key))
                    Assert::Unreachable("Index field '$field' is already a primary key");
                if(in_array($field, $this->unique_key))
                    Assert::Unreachable("Index field '$field' is already a unique key");
            }
            $this->forge->addKey($keys);
        }
    }

    private function read_csv(): void
    {
        $tmp = match (getenv('platform')){
            'windows' => $tmp = 'C:/tmp/',
            'linux'   => $tmp = '//tmp/',
            default   => Assert::Unreachable("Unsupported platform"),
        };
        $tmp .= basename($this->source);
        copy($this->source, $tmp);

        $this->db->query("
            COPY {$this->schema}.{$this->table}
            FROM '{$tmp}'
            WITH (FORMAT csv, HEADER true)
        ");

        unlink($tmp);
    }

    protected function generate_data() {
        return null;
    }

    final public function seed(): void
    {
        if($this->source === '')
            return;
        if(!file_exists($this->source)){
            Assert::Unreachable("Data file '$this->source' does not exist");
        }
        $this->read_csv();
    }

    final public function up(): void
    {
        $this->setup();
        
        $this->db->query("CREATE SCHEMA IF NOT EXISTS " . $this->schema);
        $this->db->query("SET search_path TO " . $this->schema . ", public");

        $this->forge->addField($this->fields);

        $this->add_primary_key();
        $this->add_unique_key();
        $this->add_foreign_key();
        $this->add_index();

        $this->forge->createTable($this->table);
        try {
            $this->seed();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    final public function down(): void
    {
        $this->db->query("SET search_path TO public," . $this->schema);
        $this->forge->dropTable($this->table);
    }
}

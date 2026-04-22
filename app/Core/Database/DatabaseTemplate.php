<?php
declare(strict_types=1);

namespace App\Core\Database;
use CodeIgniter\Database\Migration;
use App\Core\Controller\Assert;

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
         *   0: string|array<string>,
         *   1: string,
         *   2: string|array<string>,
         * }>|array{
         *   0: string|array<string>,
         *   1: string,
         *   2: string|array<string>,
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

    private function validate_primary_key_type(): void {
        if(is_string($this->primary_key)){
            if($this->primary_key === '')
                Assert::Unreachable("Primary key must be defined");
            $this->primary_key = [$this->primary_key]; 
        } else if (is_array($this->primary_key)){
            if($this->primary_key === [])
                Assert::Unreachable("Primary key must be defined");
        } else {
            Assert::Unreachable("Primary key must be a string or an array of strings, not " 
                . gettype($this->primary_key));
        }
    }
    private function validate_primary_key_fields(): void {
       foreach ($this->primary_key as $key) {
            if(!array_key_exists($key, $this->fields))
                Assert::Unreachable("Primary key field '$key' is not defined in fields: "
                    . implode(", ", $this->fields));
            if(array_count_values($this->primary_key)[$key] > 1)
                Assert::Unreachable("Primary key field '$key' is duplicated in primary keys: "
                    . implode(", ", $this->primary_key));
            if($this->fields[$key]['null'])
                Assert::Unreachable("Primary key field '$key' cannot be nullable");
        }
    }
    private function add_primary_key(): void {
        $this->validate_primary_key_type();
        $this->validate_primary_key_fields();
        $this->forge->addPrimaryKey($this->primary_key);
    }

    private function validate_unique_key_type(): void {
        if(is_string($this->unique_key)){
            if($this->unique_key === ''){
                $this->unique_key = [];
            } else {
                $this->unique_key = [[$this->unique_key]]; 
            }
        } else if (TypeHelper::is_array_of_strings($this->unique_key)){
            $this->unique_key = array_map(fn($v) => [$v], $this->unique_key);
        } else if (TypeHelper::is_array_of_array_of_strings($this->unique_key)){
            return; // Already in correct format
        } else {
            Assert::Unreachable("Unique key must be either an empty string, 
                a regular string, an empty array, an array of strings, 
                or an array of array of strings, not " . gettype($this->unique_key));
        }
    }

    private function validate_unique_key_fields(): void {
        foreach ($this->unique_key as $keys) {
            foreach ($keys as $key) {
                if(!array_key_exists($key, $this->fields))
                    Assert::Unreachable("Unique key field '$key' is not defined in fields "
                        . implode(", ", $this->fields));
                if(array_count_values($keys)[$key] > 1)
                    Assert::Unreachable("Unique key field '$key' 
                    is duplicated in unique key pair " . implode(", ", $keys));
            }
            if(empty(array_diff($keys, $this->primary_key)))
                Assert::Unreachable("Unique key fields'" . implode(", ", $keys) . 
                    "' is a subset of the primary keys" . implode(", ", $this->primary_key));
            if(empty(array_diff($this->primary_key, $keys)))
                Assert::Unreachable("Unique key fields'" . implode(", ", $keys) . 
                    "' is a superset of the primary keys" . implode(", ", $this->primary_key));
            if(empty(array_diff($keys, $this->unique_key)))
                Assert::Unreachable("Unique key fields'" . implode(", ", $keys) . 
                    "' is a subset of the unique keys" . implode(", ", $this->unique_key));
        }
    }
    
    private function add_unique_key(): void {
        $this->validate_unique_key_type();
        $this->validate_unique_key_fields();

        foreach ($this->unique_key as $keys) {
            $this->forge->addUniqueKey($keys);
        }
    }

    private function add_foreign_key(): void {
        foreach ($this->foreign_key as $fk) {
            if($fk === []) break;      
            [$fields, $referenced_table, $referenced_fields] = $fk;
            $fields = TypeHelper::convert_string_to_array_of_string($fields);
            foreach ($fields as $field) {
                if(!array_key_exists($field, $this->fields))
                    Assert::Unreachable("Foreign key field '$field' is not defined in fields");
            }
            $this->forge->addForeignKey($fields, $referenced_table, $referenced_fields);
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

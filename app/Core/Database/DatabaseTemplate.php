<?php
declare(strict_types=1);

namespace App\Core\Database;
use CodeIgniter\Database\Migration;
use App\Core\Controller\Assert;
use App\Core\Database\DatabaseType as T;

class DatabaseTemplate extends Migration
{
    public function __construct(
        protected string $schema,
        protected string $table,
        /**
         * @var array<string, DatabaseType>
         */
        protected array $fields,
        protected string $primary_key,
        /**
         * @var array<string|array<string>>
         */
        protected array $unique_key = [],
        /**
         * @var array<int, array{
         *   0: string|array<string>,
         *   1: string,
         *   2: string|array<string>,
         * }>
         */
        protected array $foreign_key = [],
        protected bool $data_is_real = false,
        protected string $source = '', 
        
        /**
         * @var array<array<string>>
         */
        private array $index = [],
    ) {
        parent::__construct();

        foreach ($this->fields as $name => $type) {
            $this->fields[$name] = $type->definition();
        }
    }
    
    private function setup() : void {
        $config = new \Config\Database()->default;
        $config['database'] = env('database.default.khanza_db');

        $this->db = \Config\Database::connect($config);
        $this->forge = \Config\Database::forge($this->db);
    }

    private function add_primary_key(): void {
        $pk = $this->primary_key;
        Assert::True(is_string($pk), 'Primary key must be a string');
        Assert::False($pk === '', 'Primary key must be defined');

        Assert::True(array_key_exists($pk, $this->fields), 
            "Primary key '$pk' is not defined in fields: " 
            . implode(", ", $this->fields));

        Assert::False(isset($this->fields[$pk]['null']),
            "Primary key field '$pk' cannot be nullable");

        // Add more comprehensive checks

        $this->forge->addPrimaryKey($this->primary_key);
    }

    private function add_unique_key(): void {
        $pk = $this->primary_key;
        $uk = $this->unique_key;
        
        Assert::True(is_array($uk), "Unique key must be an array");
        if($uk === []) return;
        foreach($uk as $keys){
            if(is_string($keys)){
                $keys = [$keys];
            } 
            Assert::True(is_array($keys), 
                'Keys in a list of unique keys must either be a string '. 
                'or an array of strings');
            
            foreach ($keys as $key){
                Assert::True(is_string($key), 
                    'Unique key must be an array of strings');
                Assert::True(array_key_exists($key, $this->fields),
                    "Unique key '$key' is not defined in fields "
                    . implode(", ", $this->fields));
                Assert::False($key === $pk, 
                    "Unique key '$key' is the same as the primary key");
                Assert::False(array_count_values($keys)[$key] > 1,
                   "Unique key field '$key' is duplicated in unique key pair " 
                   . implode(", ", $keys));
                // Add more exhaustive checks
            }
        }

        foreach ($this->unique_key as $keys) {
            $this->forge->addUniqueKey($keys);
        }
    }

    private function add_foreign_key(): void {
        $fks = $this->foreign_key;

        Assert::True(is_array($fks), "Foreign key must be of type array, not " 
            . gettype($this->foreign_key));
        if($fks === []) return;
        
        foreach($fks as $fk){
            Assert::True(is_array($fk), "Every foreign key must be an array");
            Assert::True(count($fk) === 3, "Every foreign key must have
                a field, a reference table class, and a reference field");

            [$fields, $ref_table_class, $ref_fields] = $fk;
            
            
            foreach($fields as $field){
                Assert::True(in_array($field, $this->fields), 
                    "Foreign key field $field not found in fields");
                Assert::True($field['type'] === T::FK_AUTO()->definition(),
                    'Foreign key field must be of type T::FK_AUTO');
            }
            
            $ref_table = new $ref_table_class();
            Assert::True($ref_table instanceof self, 
                "Reference table $ref_table_class must extend DatabaseTemplate");
    
            $ref_table_name = $ref_table->schema . '.' . $ref_table->table;

            if(is_string($ref_fields))
                $ref_fields = [$ref_fields];
            foreach($ref_fields as $ref_field){
                Assert::True(in_array($ref_field, $ref_table->fields), 
                    "Foreign key field $ref_field not found in reference table");
            }

            Assert::True(count($fields) === count($ref_fields),
                "The fields " . implode(',', $fields) 
                . "has more columns than the referenced fields" 
                . implode(',', $ref_fields));

            // Add more comprehensive checks
    
            $this->forge->addForeignKey($fields, $ref_table_name, $ref_fields);
        }
    }

    private function set_fk_auto(): void {
        $fks = $this->foreign_key;

        foreach($fks as $fk){
            [$fields, $ref_table_class, $ref_fields] = $fk;
            $ref_table = new $ref_table_class();

            if(is_string($fields))     $fields     = [$fields];
            if(is_string($ref_fields)) $ref_fields = [$ref_fields];

            for($i = 0; $i < count($fields); $i++){    
                $this->fields[$fields[$i]] = $ref_table->fields[$ref_fields[$i]];
            }
        }

    }
    private function add_index(): void {
        foreach ($this->index as $keys) {
            foreach ($keys as $field) {
                Assert::True(array_key_exists($field, $this->fields),
                    "Index field '$field' is not defined in fields");
                Assert::False($field === $this->primary_key,
                    "Index field '$field' is already a primary key");
                // Add more comprehensive checks
            }
            $this->forge->addKey($keys);
        }
    }

    private function read_csv(): void
    {
        $root = match (getenv('platform')){
            'windows' => 'C:',
            'linux'   => '/',
            default   => Assert::Unreachable("Unsupported platform"),
        };
        $reflection = new \ReflectionClass($this);
        $dir = dirname($reflection->getFileName());

        $csv_file = $dir . '/' . $this->source;
        $tmp_file = $root . '/tmp/' . $this->source;
        copy($csv_file, $tmp_file);

        $this->db->query("
            COPY {$this->schema}.{$this->table}
            FROM '{$tmp_file}'
            WITH (FORMAT csv, HEADER true)
        ");

        unlink($tmp_file);
    }

    private function generate_data() {
        return null;
    }

    private function seed(): void
    {
        if($this->source === '')
            return;
        Assert::True(file_exists($this->source),
            "Data file '$this->source' does not exist");

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
        $this->set_fk_auto();
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

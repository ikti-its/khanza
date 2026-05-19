<?php
declare(strict_types=1);

namespace App\Core\Database\Template;
use CodeIgniter\Database\Migration;
use App\Core\Controller\Assert;
use App\Core\Database\Template\SemanticType as ST;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Exception;
use CodeIgniter\Database\RawSql;


class DatabaseTemplate extends Migration
{
    /** @var array<array<string>> */
    private array $index = [];
    
    /** @var array<string, array{
     *     type: string,
     *     null: bool,
     *     constraint?: string|int,
     *     default?: RawSql,
     * }>*/
    private array $fields = [];

    /** @var array<class-string<DatabaseTemplate>, DatabaseTemplate> $ref_class_cache*/
    private static array $ref_class_cache = [];

    protected function __construct(
        protected string $schema = '',
        protected string $table  = '',
        
        /** @var array<non-empty-string, ForgeType>*/
        protected array $field = [],
        /** @var non-empty-string $primary_key */
        protected string $primary_key = '',
        
        /** @var array<non-empty-string|array<non-empty-string>> */
        protected array $unique_key = [],
        /**
         * @var array<int, array{
         *   0: non-empty-string|list<non-empty-string>,
         *   1: class-string<DatabaseTemplate>,
         *   2: non-empty-string|list<non-empty-string>,
         * }>
         */
        protected array $foreign_key = [],
        protected bool $data_is_real = false,
        protected string $source = '', 
    ) {
        parent::__construct();
        foreach ($this->field as $name => $type) {
            $this->fields[$name] = $type->definition();
        }
        $this->set_fk_auto();
    }
    
    private function setup() : void {
        $config = new \Config\Database()->default;
        $config['database'] = env('database.default.khanza_db');

        $this->db = \Config\Database::connect($config);
        $this->forge = \Config\Database::forge($this->db);
    }

    private function add_primary_key(): void {
        $pk = $this->primary_key;

        Assert::True(array_key_exists($pk, $this->fields), 
            "Primary key '$pk' is not defined in fields: " 
            . implode(", ", array_keys($this->fields)));

        Assert::False($this->fields[$pk]['null'],
            "Primary key field '$pk' cannot be nullable.
            Schema : $this->schema, Table : $this->table");

        // Add more comprehensive checks

        $this->forge->addPrimaryKey($this->primary_key);
    }

    private function add_unique_key(): void {
        $pk = $this->primary_key;
        $uk = $this->unique_key;
        
        if($uk === []) return;
        foreach($uk as $keys){
            if(is_string($keys)){
                $keys = [$keys];
            } 

            foreach ($keys as $key){
                Assert::True(array_key_exists($key, $this->fields),
                    "Unique key '$key' is not defined in fields "
                    . implode(", ", array_keys($this->fields)));
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

        if($fks === []) return;
        
        foreach($fks as $fk){
            Assert::True(count($fk) === 3, "Every foreign key must have
                a field, a reference table class, and a reference field");

            [$fields, $ref_table_class, $ref_fields] = $fk;
            
            if(is_string($fields))
                $fields = [$fields];
            foreach($fields as $field){
                Assert::True(in_array($field, array_keys($this->fields)), 
                    "Foreign key field $field not found in fields.");
            }
            
            $ref_table = new $ref_table_class();
            $ref_table_name = $ref_table->schema . '.' . $ref_table->table;

            if(is_string($ref_fields))
                $ref_fields = [$ref_fields];
            foreach($ref_fields as $ref_field){
                Assert::True(in_array($ref_field, array_keys($ref_table->fields)), 
                    "Foreign key field $ref_field not found in reference table");
            }

            Assert::True(count($fields) === count($ref_fields),
                "The fields " . implode(',', $fields) 
                . "has more columns than the referenced fields" 
                . implode(',', $ref_fields));

            // Add more comprehensive checks
            try {
                $this->forge->addForeignKey($fields, $ref_table_name, $ref_fields);
            } catch (Exception $e){
                die($e->getMessage());
            }  
        }
    }

    private function set_fk_auto(): void {
        $fks = $this->foreign_key;

        foreach($fks as $fk){
            [$fields, $ref_table_class, $ref_fields] = $fk;
            $ref_table = self::$ref_class_cache[$ref_table_class] ??= new $ref_table_class();

            if(is_string($fields)) $fields = [$fields];
            foreach($fields as $field){
                $field_def = $this->fields[$field];
                Assert::True($field_def['type'] === ST::FK_AUTO()->definition()['type'],
                    'Foreign key field must be of type T::FK_AUTO'.
                    "Schema : $this->schema, table : $this->table");
            }
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

    private function seed(): void
    {
        if($this->source === '')
            return;
        
        $root = match (getenv('platform')){
            'windows' => 'C:',
            'linux'   => '',
            default   => Assert::Unreachable("Unsupported platform"),
        };
        try {
            $reflection = new \ReflectionClass($this);
        } catch (Exception $e){
            die($e->getMessage());
        }
        $filename = $reflection->getFileName();
        if($filename === false)
            Assert::Unreachable('File name for database not found');
        $dir = dirname($filename);

        $csv_file = $dir . '/' . $this->source;
        $tmp_file = $root . '/tmp/' . $this->source;

        Assert::True(file_exists($csv_file),
            "Data file '$csv_file' does not exist");

        copy($csv_file, $tmp_file);

        $this->db->query("
            COPY {$this->schema}.{$this->table}
            FROM '{$tmp_file}'
            WITH (FORMAT csv, HEADER true)
        ");

        unlink($tmp_file);
    }

    #[\Override()]
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

        try {
            $this->forge->createTable($this->table);
            $this->seed();
        } catch (DatabaseException $e) {
            die($e->getMessage());
        }
    }

    #[\Override()]
    final public function down(): void
    {
        $this->db->query("SET search_path TO public," . $this->schema);
        try {
            $this->forge->dropTable($this->table);
        } catch (DatabaseException $e) {
            die($e->getMessage());
        }
        
    }

    final public function dependencies(): array {
        $fks = $this->foreign_key;
        $dependencies = [];
        foreach($fks as $fk){
            [$_fields, $ref_table_class, $_ref_fields] = $fk;
            Assert::False($ref_table_class === static::class,
                "Foreign key refer to itself : $ref_table_class");
    
            $dependencies[] = $ref_table_class;
        }

        return array_values(array_unique($dependencies));
    }
}

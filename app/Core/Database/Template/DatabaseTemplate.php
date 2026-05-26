<?php
declare(strict_types=1);

namespace App\Core\Database\Template;

/** @mago-expect lint:no-redundant-use */
use App\Core\Database\Template\SemanticType as ST;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

/** @mago-expect analysis:unsafe-instantiation
 * @mago-expect lint:excessive-parameter-list
 * @mago-expect lint:too-many-methods
 * @mago-expect lint:kan-defect
 * @mago-expect lint:cyclomatic-complexity
 */
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

    /**
     * @var array<int, array{
     *   0: list<non-empty-string>,
     *   1: class-string<DatabaseTemplate>,
     *   2: list<non-empty-string>,
     * }>
     */
    public private(set) array $foreign_keys;

    /** @var array<class-string<DatabaseTemplate>, DatabaseTemplate> $ref_class_cache*/
    private static array $ref_class_cache = [];

    public function __construct(
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

        foreach($this->foreign_key as $f){
            [$fields, $ref_table, $ref_fields] = $f;
        
            if (is_string($fields)){
                $fields = [$fields];
            }
            if (is_string($ref_fields)){
                $ref_fields = [$ref_fields];
            }
            $this->foreign_keys[] = [$fields, $ref_table, $ref_fields];
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

        assert(
            array_key_exists($pk, $this->fields),
            "Primary key '{$pk}' is not defined in fields: " . implode(', ', array_keys($this->fields)),
        );

        assert(!$this->fields[$pk]['null'], "Primary key field '{$pk}' cannot be nullable.
            Schema : {$this->schema}, Table : {$this->table}");

        // Add more comprehensive checks

        $this->forge->addPrimaryKey($this->primary_key);
    }

    private function add_unique_key(): void {
        $pk = $this->primary_key;
        $uk = $this->unique_key;

        if ($uk === []) {
            return;
        }
        foreach ($uk as $keys) {
            if (is_string($keys)) {
                $keys = [$keys];
            } 

            foreach ($keys as $key) {
                assert(
                    array_key_exists($key, $this->fields),
                    "Unique key '{$key}' is not defined in fields " . implode(', ', array_keys($this->fields)),
                );
                assert($key !== $pk, "Unique key '{$key}' is the same as the primary key");
                assert(
                    array_count_values($keys)[$key] = 1,
                    "Unique key field '{$key}' is duplicated in unique key pair " . implode(', ', $keys),
                );

                // Add more exhaustive checks
            }
        }

        foreach ($this->unique_key as $keys) {
            $this->forge->addUniqueKey($keys);
        }
    }

    private function add_foreign_key(): void {
        $fks = $this->foreign_keys;

        foreach ($fks as $fk) {
            [$fields, $ref_table_class, $ref_fields] = $fk;
        
            foreach ($fields as $field) {
                assert(
                    in_array($field, array_keys($this->fields), true),
                    "Foreign key field {$field} not found in fields.",
                );
            }

            $ref_table      = new $ref_table_class();
            $ref_table_name = $ref_table->schema . '.' . $ref_table->table;

            foreach ($ref_fields as $ref_field) {
                assert(
                    in_array($ref_field, array_keys($ref_table->fields), true),
                    "Foreign key field {$ref_field} not found in reference table",
                );
            }

            assert(
                count($fields) === count($ref_fields),
                'The fields ' . implode(',', $fields) . 'has more columns than the referenced fields'
                    . implode(',', $ref_fields),
            );

            // Add more comprehensive checks
            try {
                $this->forge->addForeignKey($fields, $ref_table_name, $ref_fields);
            } catch (DatabaseException $e){
                die($e->getMessage());
            }  
        }
    }

    private function set_fk_auto(): void {
        $fks = $this->foreign_keys;

        foreach($fks as $fk){
            [$fields, $ref_table_class, $ref_fields] = $fk;
            if (!isset(self::$ref_class_cache[$ref_table_class])) {
                self::$ref_class_cache[$ref_table_class] = new $ref_table_class();
            }
            $ref_table = self::$ref_class_cache[$ref_table_class];

            foreach ($fields as $field) {
                $field_def = $this->fields[$field];
                assert(
                    $field_def['type'] === ST::FK_AUTO()->definition()['type'],
                    'Foreign key field must be of type T::FK_AUTO' . "Schema : {$this->schema}, table : {$this->table}",
                );
            }

            for($i = 0; $i < count($fields); $i++){
                $original_null = $this->fields[$fields[$i]]['null'];
                $ref_def = $ref_table->fields[$ref_fields[$i]];
                $ref_def['type'] = (string) preg_replace('/\s+GENERATED\s+\w.*$/i', '', $ref_def['type']);
                unset($ref_def['default']);
                $ref_def['null'] = $original_null;
                $this->fields[$fields[$i]] = $ref_def;
            }
        }
    }

    private function add_index(): void {
        foreach ($this->index as $keys) {
            foreach ($keys as $field) {
                assert(array_key_exists($field, $this->fields), "Index field '{$field}' is not defined in fields");
                assert($field !== $this->primary_key, "Index field '{$field}' is already a primary key");

                // Add more comprehensive checks
            }
            $this->forge->addKey($keys);
        }
    }

    private function seed(): void
    {
        if ($this->source === '') {
            return;
        }

        try {
            $reflection = new \ReflectionClass($this);
        } catch (\ReflectionException $e){
            die($e->getMessage());
        }
        $filename = $reflection->getFileName();
        assert($filename !== false, 'File name for database not found');
        
        $dir = dirname($filename);
        $csv_file = $dir . '/' . $this->source;
        assert(file_exists($csv_file), "Data file '{$csv_file}' does not exist");

        $tmp_path = '';
        $tmp_file = null;

        $isWindows = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
        if ($isWindows) {
            $tmp_path = str_replace('\\', '/', $csv_file);
        } else {
            $tmp_file = tmpfile();
            $tmp_path = stream_get_meta_data($tmp_file)['uri'];
            copy($csv_file, $tmp_path);
            chmod($tmp_path, 0o644);
        }

        try {
            $this->db->query("
                COPY {$this->schema}.{$this->table}
                FROM '{$tmp_path}'
                WITH (FORMAT csv, HEADER true)
            ");
        } finally {
            if ($tmp_file !== null) {
                fclose($tmp_file);
            }
        }

        if ($this->primary_key !== '') {
            $seq_result = $this->db->query("
                SELECT pg_get_serial_sequence(
                    '{$this->schema}.{$this->table}',
                    '{$this->primary_key}'
                ) AS seq_name
            ");
            assert($seq_result instanceof \CodeIgniter\Database\BaseResult,
                'Failed to query pg_get_serial_sequence');
            $seq_row = $seq_result->getRowArray();

            if (!empty($seq_row['seq_name'])) {
                $seq_name = $seq_row['seq_name'];
                $this->db->query("
                    SELECT setval(
                        '{$seq_name}',
                        COALESCE(
                            (SELECT MAX({$this->primary_key}::bigint)
                             FROM {$this->schema}.{$this->table}),
                            1
                        )
                    )
                ");
            }
        }
    }

    #[\Override()]
    public function up(): void
    {
        $this->setup();
        $this->db->query('CREATE SCHEMA IF NOT EXISTS ' . $this->schema);
        $this->db->query("SET search_path TO {$this->schema}, public");

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
    public function down(): void
    {
        $this->db->query("SET search_path TO public, {$this->schema}");
        try {
            $this->forge->dropTable($this->table);
        } catch (DatabaseException $e) {
            die($e->getMessage());
        }
        
    }

    public function get_schema(): string
    {
        return $this->schema;
    }

    public function get_table_name(): string
    {
        return $this->table;
    }

    /** @return list<class-string<DatabaseTemplate>> */
    public function dependencies(): array {
        $fks = $this->foreign_key;
        $dependencies = [];
        foreach($fks as $fk){
            [$_fields, $ref_table_class, $_ref_fields] = $fk;
            assert($ref_table_class !== static::class, "Foreign key refer to itself : {$ref_table_class}");

            $dependencies[] = $ref_table_class;
        }

        return array_values(array_unique($dependencies));
    }
}

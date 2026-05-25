<?php
declare(strict_types=1);

namespace App\Core\Model;
use CodeIgniter\Database\BaseResult;
use CodeIgniter\Model;
use App\Core\Database\Template\DatabaseTemplate;

/** @mago-expect lint:excessive-parameter-list */
class ModelTemplate extends Model
{
    protected function __construct(
        protected DatabaseTemplate $database,
        /** @var 'BASE'| 'JOIN'| 'REFS' */
        protected string $type,
        /** @var non-empty-string */
        protected string $schema,
        /** @var non-empty-string */
        protected string $table_name,
        /** @var non-empty-string */
        protected string $primary_key,

        /** @var array<non-empty-string, ValidationType> */
        protected array $fields,
        protected array $join,
    ) {
        $this->table = $this->schema . '.' . $this->table_name;
        $this->allowedFields = array_keys($fields);
        $this->primaryKey = $this->primary_key;

        $config = new \Config\Database()->default;
        $config['database'] = env('database.default.khanza_db');
        parent::__construct(\Config\Database::connect($config));
        
        // $this->setValidationRules($fields);
        
        /*
         * All of the settings below are commented
         * because these are already the default.
         * But it is still included to indicate
         * which properties exist on the Model class
         * DO NOT DELETE NOR UNCOMMENT THE CODE BELOW
         */ 

        // $this->useAutoIncrement = true;
        
        //// CRUD settings
        // $this->returnType        = 'array';
        // $this->useSoftDeletes    = false;
        // $this->allowEmptyInserts = false;
        // $this->updateOnlyChanged = true;

        //// Validation
        // $this->skipValidation       = false;
        // $this->cleanValidationRules = true;
        // $this->validationMessages   = [];
        // $this->validationRules      = [],

        //// Dates
        // $this->useTimestamps = false;
        // $this->dateFormat   = 'datetime';
        // $this->createdField = 'created_at';
        // $this->updatedField = 'updated_at';
        // $this->deletedField = 'deleted_at';
        
        //// Callbacks
        // $this->allowCallbacks = false;
        // $this->beforeInsert = [];
        // $this->afterInsert  = [];
        // $this->beforeUpdate = [];
        // $this->afterUpdate  = [];
        // $this->beforeFind   = [];
        // $this->afterFind    = [];
        // $this->beforeDelete = [];
        // $this->afterDelete  = [];
    }
    /** @return non-empty-string */
    final public function get_primary_key(): string{
        return $this->primary_key;
    }

    /**
     * @return list<array<string, mixed>>
     */
    #[\Override]
    public function findAll(?int $limit = null, int $offset = 0): array
    {
        if (empty($this->join)) {
            /** @var list<array<string, mixed>> */
            return parent::findAll($limit, $offset);
        }

        $fk_lookup = [];
        foreach ($this->database->get_foreign_keys() as $fk) {
            [$fields, $ref_class, $ref_fields] = $fk;
            if(is_string($fields)) $fields = [$fields];
            if(is_string($ref_fields)) $ref_fields = [$ref_fields];

            for ($i = 0; $i < count($fields); $i++) {
                $fk_lookup[$fields[$i]] = [$ref_class, $ref_fields[$i]];
            }
        }

        $main    = 'm';
        $builder = $this->db->table("{$this->table} {$main}");
        $builder->select("{$main}.*");

        $idx = 0;
        foreach ($this->join as $fk_col => $display_cols) {
            if (!isset($fk_lookup[$fk_col])) continue;

            /** @var class-string<\App\Core\Database\Template\DatabaseTemplate> $ref_class */
            [$ref_class, $ref_on] = $fk_lookup[$fk_col];

            $ref_db    = new $ref_class();
            $ref_table = $ref_db->get_schema() . '.' . $ref_db->get_table_name();
            $ref_alias = "j{$idx}";

            foreach ($display_cols as $i => $disp) {
                $as = ($i === 0) ? $fk_col : $disp;
                $builder->select("{$ref_alias}.{$disp} AS {$as}");
            }

            $builder->join(
                "{$ref_table} {$ref_alias}",
                "{$main}.{$fk_col} = {$ref_alias}.{$ref_on}",
                'left'
            );
            $idx++;
        }

        if ($limit !== null && $limit > 0) {
            $builder->limit($limit, $offset);
        }

        $result = $builder->get();
        assert($result instanceof \CodeIgniter\Database\BaseResult,
            "findAll JOIN query failed on table: {$this->table}");

        /** @var list<array<string, mixed>> */
        return $result->getResultArray();
    }

    /** @return array<string, list<list<string>>> */
    public function get_all_options(): array
    {
        if (empty($this->join)) return [];

        $fk_lookup = [];
        foreach ($this->database->get_foreign_keys() as $fk) {
            [$fields, $ref_class, $ref_fields] = $fk;
            $locals = is_string($fields)   ? [$fields]   : $fields;
            $refs   = is_string($ref_fields) ? [$ref_fields] : $ref_fields;
            for ($i = 0; $i < count($locals); $i++) {
                $fk_lookup[$locals[$i]] = [$ref_class, $refs[$i]];
            }
        }

        $options = [];
        foreach ($this->join as $fk_col => $display_cols) {
            if (!isset($fk_lookup[$fk_col])) continue;

            [$ref_class, $ref_id_col] = $fk_lookup[$fk_col];
            $display_col = $display_cols[0];

            $ref_db    = new $ref_class();
            $ref_table = $ref_db->get_schema() . '.' . $ref_db->get_table_name();

            $query = $this->db->query(
                "SELECT {$ref_id_col}, {$display_col} FROM {$ref_table} ORDER BY {$display_col}"
            );
            assert($query instanceof \CodeIgniter\Database\BaseResult,
                "get_all_options query failed for: {$fk_col}");

            $rows = $query->getResultArray();
            $options[$fk_col] = array_map(
                fn(array $row): array => [$row[$display_col], (string)$row[$ref_id_col]],
                $rows
            );
        }

        return $options;
    }

    final public function audit(): array {
        $view = "{$this->schema}.{$this->table_name}_audit_view";
        $sql  = "SELECT * FROM {$view}
            LEFT OUTER JOIN
            (SELECT id, nama FROM sik.pegawai) c
            ON {$view}.changed_by = c.id
            ORDER BY changed_by DESC";

        try {
            $query = $this->db->query($sql);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException) {
            return [];
        }

        if (! $query instanceof BaseResult) return [];
        return $query->getResultArray();
    }
}
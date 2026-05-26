<?php
declare(strict_types=1);

namespace App\Core\Model;
use CodeIgniter\Database\BaseResult;
use CodeIgniter\Model;
use App\Core\Database\Template\DatabaseTemplate;

/** @mago-expect lint:excessive-parameter-list */
class ModelTemplate extends Model
{
    public private(set) DatabaseTemplate $database;
    /** @var 'BASE'| 'JOIN'| 'REFS' */
    public private(set) string $type;
    
    /** @var array<non-empty-string, ValidationType> */
    public private(set) array $fields = [];
    public private(set) array $join = [];
    protected function __construct(
        DatabaseTemplate $database,
        /** @var 'BASE'| 'JOIN'| 'REFS' */
        string $type,
        /** @var non-empty-string */
        string $schema,
        /** @var non-empty-string */
        string $table_name,
        /** @var non-empty-string */
        string $primary_key,

        /** @var array<non-empty-string, ValidationType> */
        array $fields,
        array $join,
    ) {
        $this->database = $database;
        $this->table = "{$this->database->schema}.{$this->database->table}";
        $this->primaryKey = $this->database->primary_key;
        $this->type = $type;
        $this->allowedFields = array_keys($fields);
        $this->join = $join;
        
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

    /** @return array<string, array{0: class-string<DatabaseTemplate>, 1: string}> */
    private function build_fk_lookup(): array
    {
        $lookup = [];
        foreach ($this->database->foreign_keys as $fk) {
            [$fields, $ref_class, $ref_fields] = $fk;
            for ($i = 0; $i < count($fields); $i++) {
                $lookup[$fields[$i]] = [$ref_class, $ref_fields[$i]];
            }
        }
        return $lookup;
    }

    /** @param array<int|string, mixed> $spec */
    private function apply_join_spec(
        \CodeIgniter\Database\BaseBuilder $builder,
        string $fk_col,
        array $spec,
        string $parent_alias,
        DatabaseTemplate $parent_db,
        int &$idx,
    ): void {
        $fk_lookup = $this->build_fk_lookup();
        if (!isset($fk_lookup[$fk_col])) return;

        /** @var class-string<DatabaseTemplate> $ref_class */
        [$ref_class, $ref_on] = $fk_lookup[$fk_col];

        $ref_db    = new $ref_class();
        $ref_table = $ref_db->schema . '.' . $ref_db->table;
        $ref_alias = "j{$idx}";
        $idx++;

        $builder->join(
            "{$ref_table} {$ref_alias}",
            "{$parent_alias}.{$fk_col} = {$ref_alias}.{$ref_on}",
            'left'
        );

        $is_nested = false;
        foreach ($spec as $k => $_) {
            if (is_string($k)) { $is_nested = true; break; }
        }

        if (!$is_nested) {
            foreach ($spec as $i => $disp) {
                $as = ($i === 0) ? $fk_col : $disp;
                $builder->select("{$ref_alias}.{$disp} AS {$as}");
            }
        } else {
            $first_int = true;
            foreach ($spec as $k => $v) {
                if (is_int($k)) {
                    $as = $first_int ? $fk_col : $v;
                    $first_int = false;
                    $builder->select("{$ref_alias}.{$v} AS {$as}");
                } else {
                    $this->apply_join_spec($builder, $k, $v, $ref_alias, $ref_db, $idx);
                }
            }
        }
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

        $main    = 'm';
        $builder = $this->db->table("{$this->table} {$main}");
        $builder->select("{$main}.*");

        $idx = 0;
        foreach ($this->join as $fk_col => $spec) {
            $this->apply_join_spec($builder, $fk_col, $spec, $main, $this->database, $idx);
        }

        if ($limit !== null && $limit > 0) {
            $builder->limit($limit, $offset);
        }

        $result = $builder->get();
        assert($result instanceof BaseResult,
            "findAll JOIN query failed on table: {$this->table}");

        /** @var list<array<string, mixed>> */
        return $result->getResultArray();
    }

    /** @return array<string, list<list<string>>> */
    public function get_all_options(): array
    {
        if (empty($this->join)) return [];

        $fk_lookup = [];
        foreach ($this->database->foreign_keys as $fk) {
            [$fields, $ref_class, $ref_fields] = $fk;
            for ($i = 0; $i < count($fields); $i++) {
                $fk_lookup[$fields[$i]] = [$ref_class, $ref_fields[$i]];
            }
        }

        $options = [];
        foreach ($this->join as $fk_col => $display_cols) {
            if (!isset($fk_lookup[$fk_col])) continue;

            $display_col = isset($display_cols[0]) && is_string($display_cols[0])
                ? $display_cols[0]
                : null;
            if ($display_col === null) continue;

            [$ref_class, $ref_id_col] = $fk_lookup[$fk_col];

            $ref_db    = new $ref_class();
            $ref_table = $ref_db->schema . '.' . $ref_db->table;

            $query = $this->db->query(
                "SELECT {$ref_id_col}, {$display_col} FROM {$ref_table} ORDER BY {$display_col}"
            );
            assert($query instanceof BaseResult,
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

<?php
declare(strict_types=1);

namespace App\Core;
use CodeIgniter\Model;

class ModelTemplate extends Model
{
    /**
     * @param 'BASE'| 'JOIN'| 'REFS' $type
     * @param string $schema
     * @param string $table
     * @param string $primaryKey
     */
    public function __construct(
        protected string $type,
        protected string $schema,
        protected string $table_name,
        protected string|array $primary_key,
        protected array $fields,
    ) {
        parent::__construct();
        $this->table = $this->schema . '.' . $this->table_name;
        $this->allowedFields = array_keys($fields);
        $this->primaryKey = $this->primary_key;

        $config = new \Config\Database()->default;
        $config['database'] = env('database.default.khanza_db');
        $this->db = \Config\Database::connect($config);
        $this->forge = \Config\Database::forge($this->db);
        
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

    final public function get_primary_key(){
        return $this->primary_key;
    }

    final public function audit(){
        $query = $this->db->query(
            "SELECT * FROM sik.{$this->table_name}_audit_view
            LEFT OUTER JOIN 
            (SELECT id, nama FROM sik.pegawai) c
            ON sik.{$this->table_name}_audit_view.changed_by = c.id
            ORDER BY changed_by DESC");
        $results = $query->getResult();

        for($i = 0; $i < count($results); $i++){
            $results[$i] = json_decode(json_encode($results[$i]), true);
        }
        return $results;
    }
}
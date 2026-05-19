<?php
declare(strict_types=1);

namespace App\Core\Model;
use CodeIgniter\Database\BaseResult;
use CodeIgniter\Model;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Controller\Assert;

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

    final public function audit(): array {       
        $sql = "SELECT * FROM sik.{$this->table_name}_audit_view
            LEFT OUTER JOIN 
            (SELECT id, nama FROM sik.pegawai) c
            ON sik.{$this->table_name}_audit_view.changed_by = c.id
            ORDER BY changed_by DESC";
        
        $query = $this->db->query($sql);
        if(!($query instanceof BaseResult))  
            Assert::Unreachable('There is a problem in audit query');  
        
        $results = $query->getResultArray();
        return $results;
    }
}
<?php
declare(strict_types=1);

namespace App\Core;
use CodeIgniter\Database\Migration;

class MigrationTemplate extends Migration
{
    public function __construct(
        protected string $schema,
        protected string $table,
        /**
         * @var array<string, string>
         */
        protected array $fields,
        /**
         * @var array<string>
         */
        protected array $primary_key = [],
        /**
         * @var array<string>
         */
        protected array $unique_key = [],
        /**
         * @var array<string>
         */
        protected array $foreign_key = [],
        /**
         * @var array<string>
         */
        protected array $index = [],
    ) {
        parent::__construct();
    }
    
    final public function setup(){
         
        foreach ($this->fields as $name => $type) {
            $this->fields[$name] = $type->definition();
        }
    }

    final public function up(): void
    {
        $this->setup();
        
        $this->db->query("CREATE SCHEMA IF NOT EXISTS " . $this->schema);
        $this->db->query("SET search_path TO " . $this->schema . ", public");

        $this->forge->addField($this->fields);
        if($this->primary_key !== [])
            $this->forge->addPrimaryKey($this->primary_key);
        if($this->unique_key !== [])
            $this->forge->addUniqueKey($this->unique_key);
        if($this->foreign_key !== [])
            $this->forge->addForeignKey($this->foreign_key);
        if($this->index !== [])
            $this->forge->addKey($this->index);

        // dd($this->fields);
        $this->forge->createTable($this->table);
    }

    final public function down(): void
    {
        $this->forge->dropTable($this->schema . $this->table);
    }
}

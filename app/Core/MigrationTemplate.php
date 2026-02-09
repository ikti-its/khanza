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
         * @var array<string, mixed>
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
        protected array $index = []
    ){
        parent::__construct();
    }

    final public function up(): void
    {
        $this->forge->addField($this->fields);
        if($this->primary_key !== [])
            $this->forge->addPrimaryKey($this->primary_key);
        if($this->unique_key !== [])
            $this->forge->addUniqueKey($this->unique_key);
        if($this->foreign_key !== [])
            $this->forge->addForeignKey($this->foreign_key);
        if($this->index !== [])
            $this->forge->addKey($this->index);

        $this->forge->createTable($this->schema . '.' . $this->table);
    }

    final public function down(): void
    {
        $this->forge->dropTable($this->schema . $this->table);
    }
}

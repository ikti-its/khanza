<?php
declare(strict_types=1);

namespace App\Core\Config;
use CodeIgniter\Database\MigrationRunner;
use Config\Migrations as MigrationsConfig;
use App\Core\Controller\Assert;

final class KhanzaMigrationRunner extends MigrationRunner
{
    private static array $ref_class_cache = [];
    public function __construct(
        MigrationsConfig $config, 
        $db = null, 
        protected $regex = '/\A(\w+Database)\z/',
        private array $versions = [])
    {
        parent::__construct($config, $db);
    }
    
    private static function buildGraph(array $ref_table_classes): array
    {
        $graph = [];
        $classes = [];
        foreach ($ref_table_classes as $ref_table_class)
            $classes[] = $ref_table_class->class;

        $all = [];
        foreach ($classes as $class)
            $all[$class] = true;

        foreach ($classes as $class) {
            $ref_table = self::$ref_class_cache[$class] ??= new $class();
            $deps = $ref_table->dependencies();
            foreach ($deps as $dep) {
                Assert::True(isset($all[$dep]),
                    "Migration dependency not found: $dep -> $class");
            }
            $graph[$class] = $deps;
        }

        return $graph;
    }

    private static function topoSort(array $graph): array
    {
        $visited  = [];
        $visiting = [];
        $result   = [];

        $visit = function ($node) use (&$visit, &$visited, &$visiting, &$result, $graph) {
            // Already processed
            if (isset($visited[$node])) return;

            // Cycle detected
            if (isset($visiting[$node])) {throw new \RuntimeException("Circular dependency detected at $node");}

            $visiting[$node] = true;

            // Visit dependencies first
            foreach ($graph[$node] as $dep) {
                $visit($dep);
            }

            unset($visiting[$node]);
            $visited[$node] = true;
            $result[] = $node;
        };

        foreach (array_keys($graph) as $node) {
            $visit($node);
        }
        return $result;
    }

    private static function assignVersions(array $ordered): array
    {
        $versions = [];
        for($i = 0; $i < count($ordered); $i++) {
            $class = $ordered[$i];
            $versions[$class] = str_pad((string)($i+1), 14, '0', STR_PAD_LEFT);
        }

        return $versions;
    }

    #[\Override]
    public function findMigrations(): array
    {
        $migrations = parent::findMigrations();

        $map = [];
        foreach ($migrations as $m) {
            $map[$m->class] = $m;
        }

        $graph    = self::buildGraph($migrations);
        $ordered  = self::topoSort($graph);
        $versions = self::assignVersions($ordered);
        $this->versions = $versions;

        $result = [];

        foreach ($ordered as $class) {
            $migration = $map[$class];
            $migration->version = $versions[$class];
            $result[$versions[$class]] = $migration;
        }
        
        return $result;
    }

    #[\Override()]
    protected function getMigrationName(string $migration): string
    {
        preg_match($this->regex, $migration, $matches);
        return $matches !== [] ? $matches[1] : '';
    }
}

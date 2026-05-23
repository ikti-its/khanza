<?php
    /**
     * @var int|string $id
     * @var string $column
     * @var string|int|float $value
     * @var 0|1 $req 
     */
?>

<input
    id="<?= $id ?>"
    type="number"
    step="0.1"
    name="<?= $column ?>"
    value="<?= $value ?>"
    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full md:w-1/4 dark:border-gray-600 dark:text-white"
    min="20"
    max="45"
    <?= $req === 1 ? 'required' : ''; ?>
>
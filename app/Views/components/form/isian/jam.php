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
    type="time" 
    name="<?= $column ?>"
    value="<?= $value ?>"
    value="<?= date('H:i:s') ?>"
    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white" 
    maxlength="80" 
    <?= $req  === 1   ? 'required' : ''; ?>
>
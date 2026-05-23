<?php
    /**
     * @var int|string $id
     * @var string $column
     * @var string|int $value
     * @var 0|1 $req 
     */
?>
<input 
    id="<?= $id ?>"
    type="text" 
    name="<?=  $column ?>" 
    value="<?= $value ?>" 
    class="border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full lg:w-1/4 dark:border-gray-600 dark:text-white <?= $value !== '' ? 'bg-gray-200' : ''; ?>"  
    maxlength="80" 
    <?= $req  === 1   ? 'required' : ''; ?>
    <?= $value !== '' ? 'readonly' : ''; ?>
>
<?php
    /**
     * @var int|string $id
     * @var string $column
     * @var bool|int|string $value
     * @var 0|1 $req
     */
?>
<select
    id="<?= $id ?>"
    name="<?= $column ?>"
    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg p-2 w-full md:w-1/4 dark:border-gray-600 dark:text-white"
    <?= $req === 1 ? 'required' : ''; ?>>
    <option value=""  <?= $value === '' || $value === null ? 'selected' : ''; ?>>-- Pilih --</option>
    <option value="1" <?= $value === '1' || $value === 1 || $value === true || $value === 't' ? 'selected' : ''; ?>>Ya</option>
    <option value="0" <?= $value === '0' || $value === 0 || $value === 'f' ? 'selected' : ''; ?>>Tidak</option>
</select>
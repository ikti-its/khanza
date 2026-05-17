<td class="h-px w-64 whitespace-nowrap">
    <div class="px-6 py-3">
        <span class="text-center block text-sm font-semibold text-gray-800 cursor-pointer dark:text-gray-200 hover:underline"
            data-hs-overlay="#hs-vertically-centered-scrollable-modal-<?= $id ?>"
            data-id="<?= $id ?>">
            <?php 
                $isTrue = $elem === true || $elem == 1 || $elem == 'true' || $elem == 't';
                
                if (isset($is_lab) && $is_lab === true) {
                    echo $isTrue ? '<span class="text-red-600 dark:text-red-400">Reaktif</span>' : '<span class="text-green-600 dark:text-green-400">Non Reaktif</span>';
                } else {
                    echo $isTrue ? "Sudah" : "Belum";
                }
            ?>
        </span>
    </div>
</td>
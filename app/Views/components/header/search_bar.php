<?php

/**
 * @var bool|null   $search_server true = penyaringan di server lewat ?q= (ControllerTemplate::$search_columns);
 *                                 false/null = penyaringan baris halaman yang tampil lewat JavaScript (perilaku lama)
 * @var string|null $search_q      kata kunci aktif (mode server)
 */
$search_server = (bool) ($search_server ?? false);
$search_q      = (string) ($search_q ?? '');
?>
<div class="py-4 grid gap-3 md:items-start">
    <div class="sm:col-span-1">
        <label for="hs-as-table-product-review-search" class="sr-only">Cari</label>
        <?php if ($search_server): ?>
            <form method="get" id="mySearchForm" action="" onsubmit="return submitPencarian(this);">
                <?php
                // Bawa parameter GET lain (filter induk, size, dll.); page di-reset ke 1, q diganti input.
                foreach (service('request')->getGet() ?? [] as $k => $v) {
                    if (in_array($k, ['q', 'page'], true) || !is_string($v)) continue;
                    echo '<input type="hidden" name="' . esc($k, 'attr') . '" value="' . esc($v, 'attr') . '">';
                }
                ?>
            <?php endif; ?>
            <div class="relative">
                <input type="text" id="myInput"
                    <?= $search_server
                        ? 'name="q" value="' . esc($search_q, 'attr') . '" oninput="kosongkanPencarian(this)" autocomplete="off"'
                        : 'onkeyup="myFunction()"' ?>
                    class="py-2 px-4 ps-11 block border w-full xl:w-96 border-gray-200
                    rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500
                    disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900
                    dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="<?= $search_server ? 'Cari' : 'Cari' ?>">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                    <img src="<?= base_url('svg/header/search_bar_icon.svg') ?>">
                </div>
            </div>
            <?php if ($search_server): ?>
            </form>
        <?php endif; ?>
    </div>
</div>

<?php if ($search_server): ?>
    <script>
        // Penyaringan dilakukan server (?q=); di sini hanya penyorotan <mark> pada baris yang tampil.
        const KATA_KUNCI_AKTIF = <?= json_encode($search_q, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;

        function submitPencarian(form) {
            const input = form.querySelector('#myInput');
            input.value = input.value.trim();
            if (input.value === '') input.removeAttribute('name'); // daftar utuh tanpa ?q= kosong
            return true;
        }

        // Kotak dikosongkan setelah ada pencarian aktif → kembali ke daftar utuh.
        function kosongkanPencarian(input) {
            if (input.value === '' && KATA_KUNCI_AKTIF !== '') {
                submitPencarian(input.form);
                input.form.submit();
            }
        }

        function sorotKataKunci(keyword) {
            const table = document.getElementById("myTable");
            if (!table || keyword === '') return;
            const filter = keyword.toUpperCase();
            const tr = table.getElementsByTagName("tr");
            for (let i = 1; i < tr.length; i++) {
                const td_list = tr[i].getElementsByTagName("td");
                for (let j = 0; j < td_list.length - 1; j++) {
                    const nested = td_list[j].firstElementChild?.firstElementChild;
                    if (!nested || nested.children.length > 0) continue; // jangan rusak elemen bersarang
                    const text = nested.textContent || '';
                    const index = text.toUpperCase().indexOf(filter);
                    if (index === -1) continue;
                    nested.textContent = '';
                    nested.append(
                        text.substring(0, index),
                        Object.assign(document.createElement('mark'), {
                            textContent: text.substring(index, index + filter.length)
                        }),
                        text.substring(index + filter.length),
                    );
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => sorotKataKunci(KATA_KUNCI_AKTIF));
    </script>
<?php else: ?>
    <script>
        function myFunction() {
            let table = document.getElementById("myTable");
            if (!table) return;

            let input = document.getElementById("myInput");
            let filter = input.value.toUpperCase();
            let tr = table.getElementsByTagName("tr");
            if (!tr || tr.length <= 1) return;

            // Iterate over all table rows (excluding header row)
            for (let i = 1; i < tr.length; i++) {
                let found = false;
                let td_list = tr[i].getElementsByTagName("td");

                // Iterate over all td elements in the row except the last
                for (let j = 0; j < td_list.length - 1; j++) {
                    let td = td_list[j];
                    let nested = td.firstElementChild?.firstElementChild;
                    if (!nested) continue;
                    let text = nested.textContent || nested.innerText;

                    // Reset cell text (remove any old highlights)
                    nested.innerHTML = text;

                    // If column or search input is empty, skip text matching
                    if (filter === "") {
                        continue;
                    }

                    let index = text.toUpperCase().indexOf(filter);
                    if (index !== -1) {
                        nested.innerHTML =
                            text.substring(0, index) +
                            "<mark>" + text.substring(index, index + filter.length) + "</mark>" +
                            text.substring(index + filter.length);
                        found = true;
                    }
                }

                // If search input is empty, show all rows
                if (filter === "") {
                    tr[i].style.display = "";
                } else {
                    // Show or hide row based on search result
                    tr[i].style.display = found ? "" : "none";
                }
            }
        }
    </script>
<?php endif; ?>
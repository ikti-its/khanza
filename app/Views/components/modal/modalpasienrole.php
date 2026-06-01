<?= view('components/modal/modal-table', [
    'modalId'      => 'modalPasienRole',
    'modalTitle'   => 'Pilih Pasien',
    'headers'      => ['No. RM', 'Nama Pasien', 'NIK'],
    'tableId'      => 'pasienRoleTable',
    'searchInputs' => [
        ['id' => 'searchNoRM',   'placeholder' => 'Cari No. RM...'],
        ['id' => 'searchNama',   'placeholder' => 'Cari nama pasien...'],
    ],
    'actions' => [
        ['type' => 'button', 'text' => 'Refresh', 'onclick' => 'open_modalPasienRole()', 'icon' => 'refresh'],
        ['type' => 'link',   'text' => 'Tambah',  'href' => '/masterpasien/tambah-pasien', 'icon' => 'plus'],
    ]
]) ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        initModalList({
            modalId:     'modalPasienRole',
            tableId:     'pasienRoleTable',
            url:         '/role/pasien/modal/list',
            fields:      ['nomor_rm', 'nama', 'nik'],
            searchIds: {
                searchNoRM:  'nomor_rm',
                searchNama:  'nama',
            },
            rowsPerPage: 10,
            onSelect: (item) => {
                document.getElementById('no_rm').value         = item.nomor_rm ?? '';
                document.getElementById('no_rm_display').value = item.nomor_rm ?? '';
                document.getElementById('card_nm_pasien').innerText = item.nama          ?? '-';
                document.getElementById('card_nik').innerText       = item.nik           ?? '-';
                document.getElementById('card_tgl_lahir').innerText = item.tanggal_lahir ?? '-';
                document.getElementById('cardPasien').classList.remove('hidden');
            }
        });
    });
</script>
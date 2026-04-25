<div class="group mt-28 pt-10 items-center py-2 px-2 text-lg font-medium text-white">
    <span>Status </span>
    <p class="text-white mt-1 flex items-center">
        <?php if (session()->has('user_specific_data') && isset(session('user_specific_data')['status']) && session('user_specific_data')['status'] === true) :?>
            <img src="<?= base_url('svg/layouts/dashboard/presensi/hadir.svg')?>"">
            &nbsp; Hadir
        <?php else : ?>
            <img src="<?= base_url('svg/layouts/dashboard/presensi/absen.svg')?>"">
            &nbsp; Belum Absen
        <?php endif; ?>
    </p>
</div>
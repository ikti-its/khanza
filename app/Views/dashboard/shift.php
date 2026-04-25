<div class="group mt-28 pt-10 items-center py-2 px-2 text-lg font-medium text-white">
    <span>Shift</span>
    <p>
        <?php 
            $userData = session('user_specific_data');
            $jam_masuk = isset($userData['jam_masuk']) ? $userData['jam_masuk'] : 'N/A';
            $jam_pulang = isset($userData['jam_pulang']) ? $userData['jam_pulang'] : 'N/A';
        ?> 
        <?= $jam_masuk . ' - ' . $jam_pulang ?>
    </p>
</div>
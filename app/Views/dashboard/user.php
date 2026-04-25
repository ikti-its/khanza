<h1 class="font-bold text-3xl md:text-4xl">
    <span class="text-black">
        <?php
            $userData = session()->get('user_specific_data');

            $nama = '';                    
            if (is_array($userData) && isset($userData['nama']) && !empty(trim($userData['nama']))) {
                $nama = trim($userData['nama']);
            } elseif (isset($userData['email'])) {
                $nama = explode('@', $userData['email'])[0];
            } else {
                $nama = 'Admins';
            }
            
            $firstWord = explode(' ', trim($nama))[0];
            
            echo $firstWord;
        ?>
    </span>
</h1>
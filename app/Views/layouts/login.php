<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>?v=1.0">
    <title>Login</title>

    <style>
        .bg-svg {
            background-image: url('/svg/background.svg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>

<body class="bg-svg">
    <div class="min-h-screen flex items-center justify-center">
        <form action="<?= site_url('/login') ?>" method="POST" class="w-full max-w-md">
            <?= csrf_field() ?>
            <div class="px-8 py-10 bg-white shadow-lg rounded-xl">
                <h2 class="text-3xl font-bold text-center mb-6">
                    Masuk ke akun Anda
                </h2>

                <?php 
                    $error = session()->getFlashdata('error');
                    if ($error) : ?>
                    <div id="warningMessage" class="flex items-center my-2 bg-[#FEE2E2] text-sm font-semibold text-[#DA4141] rounded-lg p-4" role="alert">
                        <?= esc($error) ?>
                    </div>
                <?php endif; ?>

                <div class="mb-6">
                    <label for="email" class="block text-gray-600 mb-1">
                        E-mail
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        autocomplete="email" 
                        value="<?= old('email') ?>" 
                        placeholder="user@example.com" 
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-black" 
                        required 
                    >
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-600 mb-1">
                        Password
                    </label>
                    <input id="password" 
                        name="password" 
                        type="password" 
                        autocomplete="current-password" 
                        value="<?= old('password') ?>" 
                        placeholder="admin12345678" 
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-black " 
                        required
                    >
                </div>
                <div class="text-center">
                    <button type="submit" class="w-full px-6 py-3 bg-teal-800  text-white font-semibold rounded-md hover:bg-teal-600 transition duration-200 ease">
                        Masuk
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
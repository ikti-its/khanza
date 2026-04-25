<div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
    <div class="px-5 py-5 flex flex-col justify-center items-start bg-white rounded-t-xl">
        <img src="<?= base_url('svg/layouts/dashboard/' . $image) ?>" alt="Icon">
    </div>
    <div class="p-4 md:p-6">
        <h3 class="text-xl font-bold text-gray-800 dark:text-neutral-300 dark:hover:text-white">
            <?= $title ?>
        </h3>
        <p class="mt-3 font-medium text-gray-500 dark:text-neutral-500">
            <?= $description ?>
        </p>
    </div>
    <div class="p-4 md:p-6">
        <a href="<?= $url ?>" class="group inline-flex items-center py-2 border border-transparent text-base font-medium rounded-md text-[#1D8676] bg-transparent hover:text-gray-200 transition duration-300">
            <?= $action ?>
            <svg class="ml-3 group-hover:stroke-gray-200 transition duration-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M8.90997 19.9201L15.43 13.4001C16.2 12.6301 16.2 11.3701 15.43 10.6001L8.90997 4.08008" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>
</div>
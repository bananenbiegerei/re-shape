<?php
$logo_big = get_field('logo_big', 'option');
$logo_small = get_field('logo_small', 'option');
?>
<div class="border-b border-gray">
    <div class="bg-white container items-center py-3 mx-4 flex">
        <header class="flex items-center w-full">
            <div class="flex-1">
                <?php include locate_template('template-parts/header-top/logo-big.php'); ?>
                <?php include locate_template('template-parts/header-top/logo-small.php'); ?>
            </div>
            <div>
                <button @click="isActive = !isActive" class="block lg:hidden">
                    <span x-show="!isActive">
                        <?= bb_icon('menu') ?>
                    </span>
                    <span x-show="isActive">
                        <?= bb_icon('close') ?>
                    </span>
                </button>
            </div>
        </header>
    </div>
</div>
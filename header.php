<!DOCTYPE html>
<html <?php language_attributes(); ?> class="h-full no-js" data-theme="wmde">
<?php get_template_part('head'); ?>
<?php
$logo_big = get_field('logo_big', 'option');
$logo_small = get_field('logo_small', 'option');
$args = ['menu_class' => 'menu', 'items_wrap' => '%3$s', 'theme_location' => 'nav', 'container' => false];
?>

<body <?php body_class('flex flex-col min-h-screen'); ?> x-data="{ showMobileNav: false }">
    <a href="#main-content" class="sr-only focus:not-sr-only"><?php _e('Skip to main content'); ?></a>
    <header class="sticky left-0 top-0 w-full bg-white z-50">
        <div class="flex flex-col justify-between flex-wrap lg:flex-row"
            :class="{ 'h-screen': showMobileNav, 'h-auto': !showMobileNav }">
            <div class="flex flex-none lg:flex-1">
                <div class="flex-1">
                    <?php include locate_template('template-parts/header-top/logo-big.php'); ?>
                    <?php include locate_template('template-parts/header-top/logo-small.php'); ?>
                </div>
                <div class="flex items-center">
                    <button class="btn btn-ghost block lg:hidden mx-4" @click="showMobileNav = !showMobileNav">
                        <span x-show="!showMobileNav">
                            <?= bb_icon('menu') ?>
                        </span>
                        <span x-show="showMobileNav">
                            <?= bb_icon('close') ?>
                        </span>
                    </button>
                </div>
            </div>
            <nav class="flex-1 bg-primary lg:bg-transparent lg:flex-none"
                :class="{ 'block': showMobileNav, 'hidden lg:block': !showMobileNav }">
                <?php if (has_nav_menu('nav')): ?>
                <div class="flex items-center justify-center lg:justify-end h-full p-4">
                    <ul class="menu horizontal">
                        <?php wp_nav_menu($args); ?>
                    </ul>
                </div>
                <?php else: ?>
                <div class="border-2 my-2 border-error border-dotted rounded-2xl p-4">
                    <h3>
                        <?php _e('No menu assigned!', BB_TEXT_DOMAIN); ?>
                    </h3> <a class="btn btn-error"
                        href="<?php echo admin_url('nav-menus.php'); ?>"><?php _e('Edit Menus', BB_TEXT_DOMAIN); ?></a>
                </div>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="main-content flex-grow bg-green-200" id="main-content">
        <?php if (is_front_page()) { ?>
        <h1 class="sr-only">
            <?php
            $site_title = get_bloginfo('name');
            echo $site_title;
            ?>
        </h1>
        <?php } ?>

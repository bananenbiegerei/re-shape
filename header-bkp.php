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
    <header class="w-full bg-white z-50 fixed">
        <div class="flex flex-wrap items-center container">
            <div class="flex-1 m-5 lg:m-0 bg-lime-400 flex items-center w-full">
                <div class="flex-1">
                    <?php include locate_template('template-parts/header-top/logo-big.php'); ?>
                    <?php include locate_template('template-parts/header-top/logo-small.php'); ?>
                </div>
                <button class="btn btn-ghost block lg:hidden" @click="showMobileNav = !showMobileNav">
                    <span x-show="!showMobileNav">
                        <?= bb_icon('menu') ?>
                    </span>
                    <span x-show="showMobileNav">
                        <?= bb_icon('close') ?>
                    </span>
                </button>
            </div>
            <div class="basis-full lg:flex-none bg-gray"
                :class="{ 'block py-36 text-center': showMobileNav, 'hidden lg:block': !showMobileNav }">
                <nav class="lg:m-0" role="navigation" aria-label="Main">
                    <?php if (has_nav_menu('nav')): ?>
                    <ul class="menu horizontal px-4 lg:px-0">
                        <?php wp_nav_menu($args); ?>
                    </ul>
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
        </div>
    </header>
    <main class="main-content flex-grow mt-20 lg:mt-24 bg-green-200" id="main-content">
        <?php if (is_front_page()) { ?>
        <h1 class="sr-only">
            <?php
            $site_title = get_bloginfo('name');
            echo $site_title;
            ?>
        </h1>
        <?php } ?>

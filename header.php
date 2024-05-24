<!DOCTYPE html>
<html <?php language_attributes(); ?> class="h-full no-js" data-theme="wmde">
<?php get_template_part('head'); ?>
<?php
$logo_big = get_field('logo_big', 'option');
$logo_small = get_field('logo_small', 'option');
$args = ['menu_class' => 'menu', 'items_wrap' => '%3$s', 'theme_location' => 'nav', 'container' => false];
?>

<body <?php body_class('flex flex-col min-h-screen'); ?>>
    <a href="#main-content" class="sr-only focus:not-sr-only"><?php _e('Skip to main content'); ?></a>
    <header class="sticky top-0 w-full z-50">
        <nav class="bg-gray">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <div>
                    <?php include locate_template('template-parts/header-top/logo-big.php'); ?>
                    <?php include locate_template('template-parts/header-top/logo-small.php'); ?>
                </div>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center md:hidden btn-ghost btn"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto border-t py-8 md:py-0 md:border-none" id="navbar-default">
                    <?php if (has_nav_menu('nav')): ?>
                    <ul class="menu horizontal px-4 lg:px-0">
                        <?php wp_nav_menu($args); ?>
                    </ul>
                    <?php else: ?>
                    <div class="border-2 my-2 border-error border-dotted rounded-2xl p-4">
                        <h3>
                            <?php _e('No menu assigned!', BB_TEXT_DOMAIN); ?>
                        </h3>
                        <a class="btn btn-error" href="<?php echo admin_url('nav-menus.php'); ?>">
                            <?php _e('Edit Menus', BB_TEXT_DOMAIN); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <main class="main-content flex-grow" id="main-content">
        <?php if (is_front_page()) { ?>
        <h1 class="sr-only">
            <?php
            $site_title = get_bloginfo('name');
            echo $site_title;
            ?>
        </h1>
        <?php } ?>

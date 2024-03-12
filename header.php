<!DOCTYPE html>
<html <?php language_attributes(); ?> class="h-full no-js" data-theme="wmde">
<?php get_template_part('head'); ?>

<body <?php body_class('flex flex-col min-h-screen'); ?> x-data="{ isActive: false }">
    <a href="#main-content" class="sr-only focus:not-sr-only"><?php _e('Skip to main content'); ?></a>
    <?php get_template_part('template-parts/header-top/titlebar'); ?>
    <?php get_template_part('template-parts/header-top/navmenu'); ?>
    <main class="main-content flex-grow" id="main-content">
        <?php if (is_front_page()) { ?>
        <h1 class="sr-only">
            <?php
            $site_title = get_bloginfo('name');
            echo $site_title;
            ?>
        </h1>
        <?php } ?>

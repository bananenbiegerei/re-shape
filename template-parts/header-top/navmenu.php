<?php
$args = [
	'menu' => '',
	'container' => '',
	'container_class' => '',
	'container_id' => '',
	'container_aria_label' => '',
	'menu_class' => 'menu',
	'menu_id' => '',
	'echo' => true,
	'fallback_cb' => 'wp_page_menu',
	'before' => '',
	'after' => '',
	'link_before' => '',
	'link_after' => '',
	'items_wrap' => '%3$s',
	'item_spacing' => 'preserve',
	'depth' => 0,
	'walker' => '',
	'theme_location' => 'nav',
]; ?>
<div class="sticky top-0 z-40 bg-gray border-b"
    :class="{ 'bg-red-500 block': isActive, 'bg-lime-500 hidden lg:block': !isActive }">
    <nav class="main-nav container" role="navigation" aria-label="Main">
        <?php if (has_nav_menu('nav')): ?>
        <ul class="menu horizontal">
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
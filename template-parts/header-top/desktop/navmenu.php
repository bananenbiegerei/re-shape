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
<div class="main-nav container hidden lg:block sticky top-0 z-40 bg-white border-b border-primary-900">
	<ul class="menu horizontal">
		<?php wp_nav_menu($args); ?>
		<li class="search-icon-wrapper">
			<div class="search-input-wrapper js-search-input-wrapper">
				<form action="<?php echo home_url('/'); ?>" method="get">
					<?php /* <label for="search">Search in <?php echo home_url('/'); ?></label> */ ?>
					<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
					<input type="submit" alt="Search" value="Suchen" class="mx-2 px-2 rounded border" />
				</form>
			</div>
			<div class="search-icon my-2 js-toggle-search-input"><span class="sr-only">Toggle Search Input</span><?php echo bb_icon('search') ?></div>
		</li>
	</ul>
</div>
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
<div class="hidden lg:block sticky top-0 z-40 bg-gray border-b">
	<div class="main-nav container">
		<ul class="menu horizontal">
			<?php wp_nav_menu($args); ?>
			<li class="absolute right-0 h-full">
				<div class="flex-1 flex justify-end gap-5 items-center h-full pl-12" x-data="{ open: false }">
					<div class="w-full"
						 x-show="open"
						 x-transition:enter="transition ease-out duration-300"
						 x-transition:enter-start="opacity-0 scale-90"
						 x-transition:enter-end="opacity-100 scale-100"
						 x-transition:leave="transition ease-in duration-300"
						 x-transition:leave-start="opacity-100 scale-100"
						 x-transition:leave-end="opacity-0 scale-90"
						 @click.outside="open = false">
						<form class="flex gap-5 form-sm w-full" action="<?php echo home_url('/'); ?>" method="get">
							<input type="text" name="s" id="search" x-ref="searchInput" value="<?php the_search_query(); ?>" />
							<input type="submit" alt="Search" value="Suchen" class="btn btn-sm" />
						</form>
					</div>
					<button class="btn btn-ghost btn-icon-only !text-black"
							x-on:click="open = ! open; $nextTick(() => $refs.searchInput.focus())">
						<span class="sr-only">Toggle Search Input</span><?php echo bb_icon('search', 'icon-sm'); ?>
					</button>
				</div>
			</li>
		</ul>
	</div>
</div>

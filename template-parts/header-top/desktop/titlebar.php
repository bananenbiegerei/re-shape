<div id="titlebar_desktop" class="border-b border-gray-200 hidden lg:block">
	<div class="bg-white container items-center py-3 mx-4 flex">
		<?php get_template_part('template-parts/header-top/titlebar_content'); ?>
		<ul class="flex items-center space-x-2 lg:space-x-5">
			<?php if (get_field('link_fur_spenden', 'option')): ?>
				<li>
					<a
					class="btn btn-red btn-hollow btn-sm btn-icon-left"
					target="_blank"
					href="<?php echo esc_url(get_field('link_fur_spenden', 'option')); ?>">
						<?= bb_icon('heart', 'heartbeat icon-sm') ?>
						<?php pll_e('donate'); ?>
					</a>
				</li>
			<?php endif; ?>
			<?php if (get_field('link_fur_mitmachen', 'option')): ?>
				<li class="hidden lg:block">
					<a
						class="btn btn-ghost btn-sm"
						target="_blank"
						href="<?php echo esc_url(get_field('link_fur_mitmachen', 'option')); ?>">
						<?php pll_e('Mitmachen'); ?>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>	
</div>


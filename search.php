<?php get_header(); ?>
<div class="grid grid-cols-12 container">
	<div class="col-span-12 mb-20">
		<?php if (have_posts()) : ?>
			<h1 class="mt-6 mb-10"><?php printf(__('Suchergebnisse für: %s', 'wmde'), get_search_query()); ?></h1>
			<div class="wp-block-columns is-layout-flex wp-container-15">
				<?php while (have_posts()) :
					the_post();
					$image_id = get_post_thumbnail_id();
				?>
					<div class="wp-block-column is-layout-flow">
						<div class="bb-card-block rounded-3xl mb-10 lg:mb-5 hover:shadow-xl transition scale-100 hover:scale-cards -mx-2 p-2 z-10 hover:z-20 relative " data-post-id="" data-blog-id="29">
							<a href="<?php the_permalink(); ?>" class="flex gap-5 flex-col">
								<div class="">
									<div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-2xl overflow-hidden">
										<?php if ($image_id) : ?>
											<?php echo wp_get_attachment_image($image_id, [400, 0], false, ['class' => 'p-1 w-auto max-h-32']); ?>
										<?php endif; ?>
									</div>
								</div>
								<div class=" space-y-2 px-2 pb-2">
									<h2 class="text-2xl font-alt"><?php the_title(); ?></h2>
									<div class="text-xl font-alt font-normal text-inherit"><?= wp_trim_words(get_the_excerpt(), 7, '...') ?></div>
								</div>
							</a>
						</div>
					</div>
				<?php
				endwhile; ?>
			</div>
		<?php else : ?>
			<h1>Nichts gefunden</h1>
			<p>Es tut uns leid, aber nichts passte zu Ihren Suchbegriffen. Bitte versuchen Sie es noch einmal mit anderen Suchbegriffen.</p>
		<?php endif; ?>

	</div>
</div>
<?php get_footer(); ?>
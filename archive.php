<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="content">
			<?php if (have_posts()) : ?>
				<div class="page-header">
					<h1 class="page-title"><?php single_term_title(); ?></h1>
				</div>
				<dl class="container grid grid-cols-12">
					<?php
					$args = array(
						'post_type' => 'glossary',
						'orderby' => 'title',
						'order' => 'ASC',
						'posts_per_page' => -1
					);
					$query = new WP_Query($args);
					while ($query->have_posts()) : $query->the_post();
						$slug = basename(get_permalink());
						$text = get_field('glossary_description');
						$output = apply_filters('the_content', $text);						
					?>
						<dt id="<?php echo $slug; ?>" class="col-span-12 lg:col-span-4 lg:col-start-2 text-2xl mb-5 font-alt scroll-mt-10" style="scroll-margin-top: 100px;" <?php if($text): echo 'data-info-text="' . wp_strip_all_tags($text) . '"'; endif;?>><?php the_title(); ?></dt>
						<dd class="col-span-12 lg:col-span-6 text-xl mb-5">
							<?php
							
							if ($text) :
								echo wp_kses_post($output);
							endif;
							?>
						</dd>
					<?php endwhile; ?>
				</dl>
			<?php else : ?>
				<?php //get_template_part('template-parts/content', 'none'); 
				?>
			<?php endif; ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>
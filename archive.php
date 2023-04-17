<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="content">
			<?php if (have_posts()) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php single_term_title(); ?></h1>
				</header>
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
					?>
						<dt class="col-span-12 lg:col-span-4 lg:col-start-2"><?php the_title(); ?></dt>
						<dd class="col-span-12 lg:col-span-6">
							<?php
							$text = get_field('glossary_description');
							$output = apply_filters('the_content', $text);
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
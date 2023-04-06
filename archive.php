<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if (have_posts()) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php single_term_title(); ?></h1>
			</header>
			<dl class="glossary-list">
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
					<dt><?php the_title(); ?></dt>
					<dd><?php the_excerpt();?></dd>
				<?php endwhile; ?>

			</dl>
		<?php else : ?>
			<?php //get_template_part('template-parts/content', 'none'); ?>
		<?php endif; ?>
	</main>
</div>
<?php get_footer(); ?>
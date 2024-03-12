<?php get_header(); ?>
<?php while (have_posts()):
	the_post(); ?>
<div class="content bg-error-500 border">
    <?php the_title(); ?>
</div>
<?php
endwhile; ?>
<?php get_footer(); ?>

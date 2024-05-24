<?php get_header(); ?>
<?php get_template_part('template-parts/page-header'); ?>
<div class="mt-20 container flex flex-col space-y-20">
    <?php // First loop to output sticky posts


    $sticky_posts = get_option('sticky_posts');
    $count_sticky_posts = count($sticky_posts);
    if ($count_sticky_posts > 0) {
    	$sticky_args = [
    		'post__in' => $sticky_posts,
    		'ignore_sticky_posts' => 1
    	];
    	$sticky_query = new WP_Query($sticky_args);
    	if ($sticky_query->have_posts()) { ?>
    <div class="lg:grid lg:grid-cols-2 lg:gap-10">
        <?php while ($sticky_query->have_posts()) {
        	$sticky_query->the_post();
        	if ($count_sticky_posts === 1) {
        		get_template_part('template-parts/content-horizontal', get_post_format());
        	} else {
        		get_template_part('template-parts/content-excerpt', get_post_format());
        	}
        } ?>
    </div>
    <?php } // Reset the post data
    	wp_reset_postdata();
    } // Second loop to output normal posts
    $normal_args = ['post__not_in' => $sticky_posts, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1];
    $normal_query = new WP_Query($normal_args);
    if ($normal_query->have_posts()) { ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
        <?php while ($normal_query->have_posts()) {
        	$normal_query->the_post();
        	get_template_part('template-parts/content', get_post_format());
        } ?>
    </div>
    <!-- Add this code for pagination -->
    <div id="pagination" class="pagination">
        <?php echo paginate_links(['total' => $normal_query->max_num_pages, 'prev_text' => __('« Previous'), 'next_text' => __('Next »')]); ?>
    </div>
    <?php } // Reset the post data
    wp_reset_postdata();
    ?>

</div>
<?php get_footer();

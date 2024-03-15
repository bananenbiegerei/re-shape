<?php get_header(); ?>
<?php while (have_posts()): ?>
<?php the_post(); ?>
<?php get_template_part('template-parts/page-header'); ?>
<div class="container flex gap-4 py-24">
    <div class="basis-2/3">
        <?php the_content(); ?>
    </div>
    <div class="basis-1/3 @container/sidebar">
        <?php get_template_part('template-parts/categories-tags'); ?>
        <?php get_template_part('template-parts/related-posts'); ?>
    </div>
</div>
<!-- Comments -->
<div class="bg-gray py-5">
    <div class="max-w-3xl mx-auto px-4">
        <?php if (comments_open() || get_comments_number()): ?>
        <section class="">
            <?php comments_template(); ?>
        </section>
        <?php endif; ?>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
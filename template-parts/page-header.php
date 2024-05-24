<?php
if (is_home()) {
	$home_title = get_field('homepage_title', 'option');
	$home_text = get_field('homepage_excerpt', 'option');
	$home_image = get_field('homepage_image', 'option');
	$home_image_alt_text = get_post_meta($home_image, '_wp_attachment_image_alt', true);
} ?>

<?php if (is_home()) {
	if (!empty($home_image)) {
		$thumbnail_url = wp_get_attachment_image_url($home_image, 'full');
	}
} else {
	$thumbnail_url = get_the_post_thumbnail_url();
} ?>

<?php if (!empty($thumbnail_url)): ?>
<div class="bg-primary rounded-b-3xl min-h-[12rem] py-12">
    <div class="container grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-6">
            <h1 class=""><?php echo is_home() ? $home_title : the_title(); ?></h1>
            <?php include locate_template('template-parts/excerpt-query.php'); ?>
        </div>
        <div class="col-span-12 lg:col-span-6 relativ">
            <div class="aspect-w-16 aspect-h-9">
                <img class="object-cover w-full h-full rounded-lg" src="<?php echo $thumbnail_url; ?>"
                    alt="<?php echo $home_image_alt_text; ?>">
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="bg-primary rounded-b-3xl min-h-[8rem]">
    <div class="container grid grid-cols-12">
        <div class="col-span-12 pt-5">
            <h1><?php the_title(); ?></h1>
            <?php include locate_template('template-parts/excerpt-query.php'); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($logo_small): ?>
<a href="<?php echo home_url(); ?>" aria-labelledby="site-name">
    <?php
    $attachment_id = $logo_small;
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    echo wp_get_attachment_image($attachment_id, $size, false, ['class' => 'h-10 w-auto block lg:hidden m-4']);
    ?>
</a>
<?php else: ?>
<div class="border-2 my-2 border-error border-dotted rounded-2xl p-4">
    <h3>
        <?php _e('No logo assigned (Small)!', BB_TEXT_DOMAIN); ?>
    </h3>
    <a class="btn btn-error" href="<?php echo admin_url('admin.php?page=acf-options'); ?>">
        <?php _e('Edit Logo', BB_TEXT_DOMAIN); ?>
    </a>
</div>
<?php endif; ?>

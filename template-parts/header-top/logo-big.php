<?php if ($logo_big): ?>
<a href="<?php echo home_url(); ?>" class="hidden lg:block" aria-labelledby="site-name">
    <?php
    $attachment_id = $logo_big;
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    echo wp_get_attachment_image($attachment_id, $size, false, ['class' => 'h-10 w-auto lg:block hidden m-4']);
    ?>
</a>
<?php else: ?>
<div class="border-2 my-2 border-error border-dotted rounded-2xl p-4">
    <h3>
        <?php _e('No logo assigned (Big)!', BB_TEXT_DOMAIN); ?>
    </h3>
    <a class="btn btn-error" href="<?php echo esc_url(get_site_url()); ?>/wp-admin/admin.php?page=theme-settings">
        <?php _e('Edit Logo', BB_TEXT_DOMAIN); ?>
    </a>
</div>
<?php endif; ?>
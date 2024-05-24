<?php if (is_home()) {
	if (!empty($home_text)) { ?>
<div class="font-alt text-xl lg:text-2xl font-normal mb-10">
    <?= $home_text ?>
</div>
<?php }
} else {
	 ?>
<?php if (has_excerpt()): ?>
<div class="font-alt text-xl lg:text-2xl font-normal mb-10">
    <?php echo strip_tags(get_the_excerpt()); ?>
</div>
<?php endif; ?>
<?php
} ?>

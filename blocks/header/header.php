<?php
$id = str_replace(' ', '_', esc_attr(get_field('anchor_title')));
$image = get_field('image');
$text = get_field('text');
$text = apply_filters('the_content', $text);
?>
<div id="<?= $id ?>" data-anchor-title="<?= esc_attr(get_field('anchor_title')) ?>" class="bb-header-block pt-64 pb-80 bg-primary">
  <?php
  get_template_part('template-parts/breadcrumbs');

  echo '<div class="">';
  if ($image) :
    echo '<div>' . wp_get_attachment_image($image, $size) . '</div>';
  endif;

  if ($text) :
    echo '<div>' . wp_kses_post($text) . '</div>';
  endif;

  echo '</div>';
  ?>

  <?php /* if (get_field('style')['has_bg_color'] ?? false): ?>
			<span style="background-color: <?= get_field('style')['bg_color'] ?? '' ?>">
			  <?= get_field('headline') ?>
			</span>
		<?php else: ?>
			<?= get_field('headline') ?>
		<?php endif; */ ?>

</div>
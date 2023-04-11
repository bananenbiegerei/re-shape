<?php
$image = get_field('page_header_image');
$text = get_field('page_header_text');
$output = apply_filters('the_content', $text);
?>
<header class="bg-orange-600 rounded-b-lg">
  <div class="grid grid-cols-12 container">
    <?php
    get_template_part('template-parts/breadcrumbs');

    if ($image) :
      echo '<div class="col-span-12 lg:col-span-6">' . wp_get_attachment_image($image, $size) . '</div>';
    endif;
    if ($text) :
      echo '<div class="col-span-12 lg:col-span-6">' . wp_kses_post($output) . '</div>';
    else:
      echo '<div class="col-span-12 lg:col-span-6">' . get_the_title() . '</div>';
    endif;
    ?>
  </div>
</header>
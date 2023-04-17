<?php
$image = get_field('page_header_image');
$text = get_field('page_header_text');
$output = apply_filters('the_content', $text);
if (is_page() || is_404() || is_archive()): ?>
  <header class="bg-orange-600 rounded-b-2xl pt-2 pb-2 mb-10 border-t border-primary-900">
    <div class="grid grid-cols-12 container">
      <?php
      get_template_part('template-parts/breadcrumbs');
      if ($image):
      	echo '<div class="col-span-12 lg:col-span-6 pb-10 pt-10">' . wp_get_attachment_image($image, $size) . '</div>';
      	if ($text):
      		echo '<div class="col-span-12 lg:col-span-6 pb-10 pt-10 flex flex-col	justify-center">' . wp_kses_post($output) . '</div>';
      	endif;
      else:
        echo '<div class="col-span-12 lg:col-span-10 lg:col-start-2 pt-10 pb-5">';
      	if (is_archive()):
      		echo '<h1>Glossar</h1>';
      	elseif ($text):
      		echo wp_kses_post($output);
      	else:
      		echo '<h1>' . get_the_title() . '</h1>';
      	endif;
      	echo '</div>';
      endif;
	?>
    </div>
  </header>
<?php endif; ?>

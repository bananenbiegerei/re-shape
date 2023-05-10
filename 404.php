<?php
get_header(); ?>
<div class="container">
	<?php /*
	<div class="flex flex-shrink-0 justify-center mb-16">
	  <a href="/" class="inline-flex">
		<span class="sr-only">Your Company</span>
		<svg class="h-16 w-auto" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
		<circle cx="20" cy="20" r="20" fill="black"/>
		</svg>
	  </a>
	</div>
	*/ ?>
	<div class="text-center">
		<p>404</p>
		<h1><?php _e('Seite nicht gefunden.', BB_TEXT_DOMAIN); ?></h1>
		<p><?php _e('Leider konnten wir die von Ihnen gesuchte Seite nicht finden.', BB_TEXT_DOMAIN); ?></p>
		<div class="mt-6">
		  <a href="#" class="text-base font-medium text-primary-600 hover:text-primary-500">
			<?php _e('Zurück zur Startseite', BB_TEXT_DOMAIN); ?>
			<span aria-hidden="true"> &rarr;</span>
		  </a>
		</div>
	</div>
</div>

<?php get_footer(); ?>

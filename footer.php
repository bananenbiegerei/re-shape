</main>

<footer class="bg-white wmde-scheme text-primary mt-36" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only"><?php _e('Footer', BB_TEXT_DOMAIN); ?></h2>
    <div class="border-t-2 border-b border-b-gray-200 py-8 mb-12 lg:mb-0">
        <div class="container lg:flex lg:gap-20">
            <div class="flex-none">
                <?php get_template_part('template-parts/social-media-menu'); ?>
            </div>
            <?php if (get_field('kontakt_spendenservice', 'option')): ?>
            <div class="flex-none font-alt">
                <h3 class="text-base text-primary"><?= _e('Spendenservice', BB_TEXT_DOMAIN) ?></h3>
                <?php the_field('kontakt_spendenservice', 'option'); ?>
            </div>
            <?php endif; ?>
            <?php if (get_field('kontakt', 'option')): ?>
            <div class="flex-none font-alt">
                <h3 class="text-base text-primary"><?= _e('Kontakt', BB_TEXT_DOMAIN) ?></h3>
                <?php the_field('kontakt', 'option'); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="container lg:flex lg:items-center lg:h-24">
        <div class="lg:flex-1">
            <?php wp_nav_menu([
            	'container' => 'nav',
            	'menu' => 'footer',
            	'menu_class' => 'flex flex-col lg:flex-row gap-5',
            	'theme_location' => 'footer',
            ]); ?>
        </div>
        <div class="lg:flex-none py-12 lg:py-0">
            <h3 class="mb-0 text-base"><?php _e('Wir befreien Wissen', BB_TEXT_DOMAIN); ?></h3>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
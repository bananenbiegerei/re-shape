</main>

<footer class="bg-primary" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only"><?php _e('Footer', BB_TEXT_DOMAIN); ?></h2>
    <div class="py-8 mb-12 lg:mb-0">
        <div class="container lg:flex lg:gap-20">
            <div class="flex-1">
                <?php get_template_part('template-parts/social-media-menu'); ?>
            </div>
            <div>
                <?php $footer_args = [
                	'container' => 'nav',
                	'menu' => 'footer',
                	'menu_class' => 'flex flex-col lg:flex-row gap-5',
                	'theme_location' => 'footer'
                ]; ?>
                <?php if (has_nav_menu('footer')): ?>
                <?php wp_nav_menu($footer_args); ?>
                <?php else: ?>
                <div class="border-2 my-2 border-error border-dotted rounded-2xl p-4">
                    <h2>
                        <?php _e('No menu assigned!', BB_TEXT_DOMAIN); ?>
                    </h2> <a class="btn btn-error"
                        href="<?php echo admin_url('nav-menus.php'); ?>"><?php _e('Edit Menus', BB_TEXT_DOMAIN); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
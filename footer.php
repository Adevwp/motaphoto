    <!-- FOOTER -->
    <footer class="site-footer">
        <nav class="site-footer__menu">
            <?php wp_nav_menu( // Call footer menu
                array( 'theme_location' => 'footer', 
                'container' => 'ul', // No div 
                'menu_class' => 'site-footer__menu__ul', // custom class 
                ) 
            ); ?>
        </nav>
    </footer>
    
    <!-- Integration of the modal Contact  -->
    <?php get_template_part('template-parts/contact-modal'); ?> 
    
    <!-- Integration of the modal Lightbox  -->
    <?php get_template_part('template-parts/lightbox-modal'); ?>

	<?php wp_footer(); ?>
</body>
</html>
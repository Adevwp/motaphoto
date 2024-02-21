    <!-- FOOTER -->
    <!-- TODO test footer -->

    <footer class="site-footer">
        <nav class="site-footer__menu">
            <?php wp_nav_menu( // Call footer menu
                array( 'theme_location' => 'footer', 
                'container' => 'ul', // No div 
                'menu_class' => 'site-footer__menu__ul', // custom class 
                ) 
            ); ?>

            <p>Tous droits réservés</p>
        </nav>
    </footer>

	<?php wp_footer(); ?>
</body>
</html>
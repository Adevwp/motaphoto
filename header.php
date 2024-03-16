<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

        <!-- HEADER -->
        <header class="site-header">
            <div class="site-header__logo">
                <a href="<?php echo home_url( '/' ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-motaphoto.svg" alt="Logo Nathalie MOTA Photgraphe">
                </a>
            </div>
            <nav class="site-header__menu">
                <?php wp_nav_menu( // Call main menu
                    array( 'theme_location' => 'main', 
                    'container' => 'ul', // No div 
                    'menu_class' => 'site-header__menu__ul', // custom class 
                    ) 
                ); ?>
            </nav>
            </header>
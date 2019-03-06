<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <title>Mon thème WordPress</title>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="container">
            <h1><?php bloginfo('name'); ?></h1>
            <p><?php bloginfo('description'); ?></p>

            <h2><?php the_title(); ?></h2>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><?php bloginfo('name'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
            </button>

        <?php 
        
        wp_nav_menu( array(
            'theme_location'  => 'main-menu',
            'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'navbarSupportedContent',
            'menu_class'      => 'navbar-nav mr-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) ); ?>

        </nav>

        <div class="container">
            <p><?php bloginfo('description'); ?></p>

            <div>
                <?php
                // La boucle permet d'afficher tous les articles ou pages
                while (have_posts()) { the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content();
                } ?>
            </div>            
        </div>

        <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootsrap.min.js"></script>
        <?php wp_footer(); ?>
    </body>
</html>
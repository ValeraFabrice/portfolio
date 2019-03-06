<?php

// get_header est remplacé par header.php
get_header(); ?>

<div class="wrap">
    <?php if ( is_home() && ! is_front_page() ) : ?>
    <header class="page-header">
        <h1 class="page-title"><?php single_post_title(); ?></h1>
    </header>
    <?php else : ?>
    <header class="page-header">
        <h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
    </header>
    <?php endif; ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        

            <div><?php

            // VOICI COMMENT NOUS FAISONS APPEL A UN WIDGET PRE-EXISTANT
            the_widget('WP_Widget_Calendar');
            ?></div>
            <div><?php the_widget('WP_Widget_Calendar'); ?></div>
            <div><?php the_widget('WP_Widget_Links'); ?></div>
            <div><?php the_widget('WP_Widget_Pages'); ?></div>
            <div><?php the_widget('WP_Widget_Text'); ?></div>

            <div><?php

            ?></div>

            <div><?php dynamic_sidebar('ma_zone_customisee');
            // VOICI COMMENT NOUS FAISONS APPEL A UN WIDGET QUE NOUS AVON CREE!
            ?></div>

            <?php
            if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) :
                    // ceci fait référence dans la boucle à chaque post existant dans votre base de données
                    the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/post/content', get_post_format() );

                endwhile;

                the_posts_pagination(
                    array(
                        'prev_text'          => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
                        'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
                    )
                );

            else :

                get_template_part( 'template-parts/post/content', 'none' );

            endif;
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php

// get footer est remplacé par footer.php
get_footer();
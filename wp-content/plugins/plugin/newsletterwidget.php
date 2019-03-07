<?php

class Newsletter_Widget extends WP_Widget{

    public function __construct() {

        parent::__construct('id_newsletter', 'Newsletter', array('description'=>'ceci est un formulaire permettant de s inscrire à la newsletter d un site web'));
    }

    // La fonction widget permet la gestion de l'affichage sur mon site web du widget en question !!!
    public function widget($args, $instance){
        echo $args['before_widget'];
        echo $args['before_title'];
        echo apply_filters('widget_title', $instance['title']);
        echo $args['after_title'];

        ?>
        <form action="" method="post">
            <p>
                <label for="newsletter_email">Votre email :</label>
                <input id="newsletter_email" name="newsletter_email" type="email" />
            </p>
            <input type="submit"/>
        </form>
        
        <?php
    }

    // La fonction form permet de manipuler et de mettre en place les paramètres / option de mon widget fraichement créé

    public function form($instance){
        $title = isset($instance['title']) ? $instance['title'] : '';

        // nous utilisons la fonction get_field_id() pour générer un attribut id
        // nous utilisons la fonction get_field_name() pour générer un attribut name
        // ce sont des methodes définies dans la classe WP_WIDGET (logiquement il y a un attribut field_id et un attribut field_name)
        ?>

        <p>
        <label for="<?php echo $this->get_field_name('title'); ?>">
            <?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/>
        </p>

        <?php
    }
}

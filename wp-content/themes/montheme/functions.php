<?php

// une fonction pour afficher un message
function display_hello()
{
    echo 'Bonjour ceci est mon salut !';
}

// add_action permet de créer dans la base de données un objet de type
// argument 1 (widget_init) qui suit les règles de création de l'arg 2
// la fonction add_sidebar
// On crée donc ci-dessous un widget de type sidebar ! précisez au moins id et nom
add_action('widgets_init', 'add_sidebar');
function add_sidebar()
{
    register_sidebar(array(
        'id' => 'ma_zone_customisee',
        'name' => 'Zone du haut',
        'description' => 'Cette zone apparaît au dessus dans mon site',
        'before_widget' => '<aside>',
        'after_widget' => '</aside>',
        'before_title' => '<h1>',
        'after_title' => '</h1>'

    ));

}

// CREATION DE MENU
// add_action s'utilise de la même manière
// ici on crée un menu principal
// On vérifie dans le tableau de bord qu'il est bien créé <!DOCTYPE html>
add_action('init','add_menu');
function add_menu()
{
    register_nav_menu('main_menu', 'Mon Menu Principal');
}
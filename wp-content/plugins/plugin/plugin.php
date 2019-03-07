<?php
/*
Plugin Name: Mon Plugin
Plugin URI: www.bbr.com
Description: Voici un plugin bien sympathique
Version: 0.1
Author: Valéra Fabrice
Author URI: www.bbr.com
License: GPL2
*/

Class Plugin{

    public function __construct(){

        include_once plugin_dir_path(__FILE__).'/page_title.php';
        new Page_Title();
        include_once plugin_dir_path(__FILE__).'/newsletter.php';
        new Newsletter();
        // Des que le plugin est activé, la fonction static install() est exécute. Elle va donc créer la table wp_newsletter_email pour stocker les mails des abonnésà à la newsletter dans la base de données wordpress
        
        register_activation_hook(__FILE__,array('Newsletter', 'install'));
        register_uninstall_hook(__FILE__,array('Newsletter', 'uninstall'));
    }

}

new Plugin();
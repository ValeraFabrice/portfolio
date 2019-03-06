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
        // add filter prend en 1er argument le type de variable sur lequel j'applique mon filtre, en 2eme argument je mets le filtre en question et enfin en 3eme argument le niveau d'importance (ordre) dans lequel le filtre sera exécuté
        add_filter('wp_title', array($this, 'modify_page_title'), 20);
    }

    public function modify_page_title($title){

        return $title.' - powered by my Plugin';
    }


}

new Plugin();
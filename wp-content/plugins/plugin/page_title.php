<?php

Class Page_Title{

    public function __construct(){

        add_filter('the_title', array($this, 'modify_page_title'), 20);
    }

    public function modify_page_title($title){

        return $title.' ';
    }

}

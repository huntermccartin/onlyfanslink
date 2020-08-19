<?php
  //add scripts
  function ofl_add_scripts(){
    // Add Main css
    wp_enqueue_style('ofl-main-style', plugins_url(). '/onlyfanslink/css/style.css');
    // Add Main js
    wp_enqueue_script('ofl-main-style', plugins_url(). '/onlyfanslink/js/main.js');
  }


    add_action('wp_enqueue_scripts', 'ofl_add_scripts');

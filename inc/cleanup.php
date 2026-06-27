<?php

//Task ID: P5-13


// remove esisiting comment support
add_action('init', function () {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
});



// disable emojis
add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
});



// disable embeds
add_action('init', function () {
    wp_deregister_script('wp-embed');
});



// disable pingbacks
add_filter('xmlrpc_enabled', '__return_false');



//hide comments menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
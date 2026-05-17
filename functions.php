<?php

require_once get_template_directory() . '/inc/cpts.php';


add_filter('acf/settings/save_json', function () {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});




function desyne_enqueue_assets() {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    wp_enqueue_style(
        'desyne-style',
        $theme_uri . '/assets/dist/style.css',
        [],
        filemtime($theme_dir . '/assets/dist/style.css')
    );

    wp_enqueue_script_module(
        'desyne-main',
        $theme_uri . '/assets/dist/main.js',
        [],
        filemtime($theme_dir . '/assets/dist/main.js')
    );
}
add_action('wp_enqueue_scripts', 'desyne_enqueue_assets');
<?php


require_once get_template_directory() . '/inc/cpts.php';

require_once get_template_directory() . '/inc/seo.php';

require_once get_template_directory() . '/inc/admin.php';


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




// add_action('wp_footer', function () {
//     if (is_admin()) return;

//     global $template, $post, $wp_query;

//     echo '<pre style="position:fixed;bottom:0;left:0;right:0;z-index:999999;background:#000;color:#fff;padding:16px;font-size:12px;max-height:40vh;overflow:auto;">';
//     echo 'template: ' . esc_html($template ?? 'none') . "\n";
//     echo 'is_single: ' . (is_single() ? 'yes' : 'no') . "\n";
//     echo 'is_singular: ' . (is_singular() ? 'yes' : 'no') . "\n";
//     echo 'is_page: ' . (is_page() ? 'yes' : 'no') . "\n";
//     echo 'is_404: ' . (is_404() ? 'yes' : 'no') . "\n";
//     echo 'post ID: ' . esc_html($post->ID ?? 'none') . "\n";
//     echo 'post type: ' . esc_html(get_post_type($post) ?: 'none') . "\n";
//     echo 'post title: ' . esc_html(get_the_title($post) ?: 'none') . "\n";
//     echo 'queried object ID: ' . esc_html(get_queried_object_id()) . "\n";
//     echo '</pre>';
// });
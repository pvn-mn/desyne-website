<?php

// P3-16 — Remove admin menu items for non-admin users

add_action('admin_menu', function () {
    if (!current_user_can('editor')) {
        return;
    }

    remove_menu_page('rank-math');
    remove_menu_page('tools.php');
    remove_menu_page('edit-comments.php');
}, 999);



//misc task - decluttering (parent menu)

// add_action('admin_menu', function () {
//     add_menu_page(
//         'Desyne Content',
//         'Desyne',
//         'edit_posts',
//         'desyne-content',
//         '',
//         'dashicons-layout',
//         25
//     );
// });



// Custom admin menu order

add_filter('custom_menu_order', '__return_true');

add_filter('menu_order', function ($menu_order) {
    $custom_order = [
        'index.php',
        'separator1',

        'edit.php',
        'upload.php',
        'edit.php?post_type=page',
        'edit-comments.php',

        'separator2',

        'edit.php?post_type=testimonial',
        'edit.php?post_type=faq',
        'edit.php?post_type=feature',
        'edit.php?post_type=screenshot_carousel',
        'edit.php?post_type=download_cta',
        'edit.php?post_type=tool',
        'edit.php?post_type=desyne_template',
        'edit.php?post_type=tutorial',
        'edit.php?post_type=about_stat',

        'separator-last',
    ];

    $ordered = [];

    foreach ($custom_order as $item) {
        if (($key = array_search($item, $menu_order, true)) !== false) {
            $ordered[] = $item;
            unset($menu_order[$key]);
        }
    }

    return array_merge($ordered, $menu_order);
});
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

add_action('admin_menu', function () {
    add_menu_page(
        'Desyne Content',
        'Desyne',
        'edit_posts',
        'desyne-content',
        '',
        'dashicons-layout',
        25
    );
});
<?php

add_action('init', function () {
    register_post_type('testimonial', [
        'label' => 'Testimonials',
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => ['slug' => 'testimonials'],
    ]);

    register_post_type('faq', [
        'label' => 'FAQs',
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-editor-help',
        'rewrite' => ['slug' => 'faqs'],
    ]);

    register_post_type('feature', [
        'label' => 'Features',
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-star-filled',
        'rewrite' => ['slug' => 'features'],
    ]);

    register_post_type('screenshot_carousel', [
        'label' => 'Screenshot Carousel',
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'thumbnail'],
        'menu_icon' => 'dashicons-images-alt2',
        'rewrite' => ['slug' => 'screenshot-carousel'],
    ]);

    register_post_type('download_cta', [
        'label' => 'Download_CTA',
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'thumbnail'],
        'menu_icon' => 'dashicons-download',
        'rewrite' => ['slug' => 'download-cta'],
    ]);

    // register_post_type('how_it_works', [
    //     'label' => 'How It Works',
    //     'public' => true,
    //     'show_in_rest' => true,
    //     'supports' => ['title', 'editor', 'thumbnail'],
    //     'menu_icon' => 'dashicons-list-view',
    //     'rewrite' => ['slug' => 'how-it-works'],
    // ]);

    register_post_type('tool', [
    'label' => 'Tools',
    'public' => true,
    'show_in_rest' => true,
    'supports' => ['title', 'thumbnail'],
    'menu_icon' => 'dashicons-admin-tools',
    'rewrite' => ['slug' => 'tools'],
]);
});
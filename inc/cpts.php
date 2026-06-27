<?php

add_action('init', function () {
    register_post_type('testimonial', [
        'label' => 'Testimonials',
        'public' => true,
        'show_in_menu' => 'desyne-content',
        'show_in_rest' => true,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => ['slug' => 'testimonials'],
    ]);

    register_post_type('faq', [
        'label' => 'FAQs',
        'public' => true,
        'show_in_menu' => 'desyne-content',
        'show_in_rest' => true,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-editor-help',
        'rewrite' => ['slug' => 'faqs'],
    ]);

    register_post_type('feature', [
        'label' => 'Features',
        'public' => true,
        'show_in_menu' => 'desyne-content',
        'show_in_rest' => true,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-star-filled',
        'rewrite' => ['slug' => 'features'],
    ]);

    register_post_type('screenshot_carousel', [
        'label' => 'Screenshot Carousel',
        'public' => true,
        'show_in_menu' => 'desyne-content',
        'show_in_rest' => true,
        'supports' => ['title', 'thumbnail'],
        'menu_icon' => 'dashicons-images-alt2',
        'rewrite' => ['slug' => 'screenshot-carousel'],
    ]);

    register_post_type('download_cta', [
        'label' => 'Download_CTA',
        'public' => true,
        'show_in_menu' => 'desyne-content',
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
    'show_in_menu' => 'desyne-content',
    'show_in_rest' => true,
    'supports' => ['title', 'thumbnail'],
    'menu_icon' => 'dashicons-admin-tools',
    'rewrite' => ['slug' => 'tools'],
]);

    // wordpress taxonomy - to share ACF 'feature details' with home and feature page:
    register_taxonomy('feature_location', ['feature'], [
    'labels' => [
        'name'          => __('Feature Locations', 'custom-theme'),
        'singular_name' => __('Feature Location', 'custom-theme'),
    ],
    'public'            => true,
    'hierarchical'      => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
    'rewrite'           => ['slug' => 'feature-location'],
]);


    /**
     * Templates CPT + Taxonomies
     */

    register_post_type('desyne_template', [
        'labels' => [
            'name' => 'Templates',
            'singular_name' => 'Template',
            'add_new_item' => 'Add New Template',
            'edit_item' => 'Edit Template',
        ],
        'public' => true,
        'show_in_menu' => 'desyne-content',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-layout',
        'supports' => ['title', 'thumbnail', 'excerpt'],
        'has_archive' => false,
        'rewrite' => ['slug' => 'templates'],
    ]);

    register_taxonomy('template_type', ['desyne_template'], [
        'labels' => [
            'name' => 'Template Types',
            'singular_name' => 'Template Type',
        ],
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite' => ['slug' => 'template-type'],
    ]);

    register_taxonomy('template_tag', ['desyne_template'], [
        'labels' => [
            'name' => 'Template Tags',
            'singular_name' => 'Template Tag',
        ],
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => false,
        'rewrite' => ['slug' => 'template-tag'],
    ]);

    /**
     * Tutorials CPT + Taxonomy
     */

    register_post_type('tutorial', [
        'labels' => [
            'name' => 'Tutorials',
            'singular_name' => 'Tutorial',
            'add_new_item' => 'Add New Tutorial',
            'edit_item' => 'Edit Tutorial',
        ],
        'public' => true,
        'show_in_menu' => 'desyne-content',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],        'has_archive' => false,
        'rewrite' => ['slug' => 'tutorials'],
    ]);

    register_taxonomy('tutorial_category', ['tutorial'], [
        'labels' => [
            'name' => 'Tutorial Categories',
            'singular_name' => 'Tutorial Category',
        ],
        'public' => true,
        'show_in_menu' => 'desyne-content',
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'tutorial-category'],
    ]);

    
    /**
     * About Us CPT
     */

    register_post_type('about_stat', [
        'label' => 'About Stats',
        'public' => true,
        'show_in_menu' => 'desyne-content',
        'show_in_rest' => true,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-chart-bar',
        'rewrite' => ['slug' => 'about-stat'],
    ]);

    // wordpress taxonomy - to share ACF 'testimonial details' with home and about us page:
    register_taxonomy('testimonial_location', ['testimonial'], [
        'labels' => [
            'name' => __('Testimonial Locations', 'custom-theme'),
            'singular_name' => __('Testimonial Location', 'custom-theme'),
        ],
        'public' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'testimonial-location'],
    ]);


    // wordpress taxonomy - to share ACF 'faq details' with faq page & etc..
    register_taxonomy('faq_location', ['faq'], [
    'labels' => [
        'name'          => __('FAQ Locations', 'custom-theme'),
        'singular_name' => __('FAQ Location', 'custom-theme'),
        'add_new_item'  => __('Add FAQ Location', 'custom-theme'),
    ],
    'public'            => true,
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
    'rewrite'           => ['slug' => 'faq-location'],
    ]);


});
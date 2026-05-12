<?php

add_action('init', function () {
    register_post_type('testimonial', [
        'label' => 'Testimonials',
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => ['slug' => 'testimonials'],
    ]);

    register_post_type('faq', [
        'label' => 'FAQs',
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor'],
        'menu_icon' => 'dashicons-editor-help',
        'rewrite' => ['slug' => 'faqs'],
    ]);

    register_post_type('feature', [
        'label' => 'Features',
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'menu_icon' => 'dashicons-star-filled',
        'rewrite' => ['slug' => 'features'],
    ]);
});
<?php

/**
 * Desyne custom SEO schema.
 */




// 1. P3-08 — FAQPage Schema

add_action('wp_head', 'desyne_output_faq_schema');

function desyne_output_faq_schema() {

    // can interchange slug ('faq') with page id (pages-> FAQ -> 353)
    if (!is_front_page() && !is_page('faq')) {
        return;
    }

    $faq_query = new WP_Query([
        'post_type'      => 'faq',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ]);

    if (!$faq_query->have_posts()) {
        return;
    }

    $faq_items = [];

    while ($faq_query->have_posts()) {
        $faq_query->the_post();

        $question = get_the_title();
        $answer   = get_field('answer');

        if (!$question || !$answer) {
            continue;
        }

        $faq_items[] = [
            '@type' => 'Question',
            'name'  => wp_strip_all_tags($question),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => wp_kses_post($answer),
            ],
        ];
    }

    wp_reset_postdata();

    if (empty($faq_items)) {
        return;
    }

    $schema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $faq_items,
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}

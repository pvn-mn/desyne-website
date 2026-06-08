<?php
/**
 * Title: About Collage
 * Slug: custom-theme/about-collage
 * Categories: desyne
 */

$page_id = get_queried_object_id();

$top_image   = get_field('about_collage_top_image', $page_id);
$left_image  = get_field('about_collage_left_image', $page_id);
$right_image = get_field('about_collage_right_image', $page_id);
?>

<section class="bg-[linear-gradient(to_bottom,#ffffff_0%,#ffffff_54%,#dff1ee_54%,#dff1ee_100%)] pt-12 pb-0">
<div class="relative mx-auto h-[600px] max-w-6xl px-6">

    <?php 
    if ( ! empty( $top_image['ID'] ) ) {
        echo wp_get_attachment_image(
            $top_image['ID'],
            'large',
            false,
            [
                'class' => 'absolute left-1/2 top-0 z-20 w-[500px] -translate-x-1/2 rounded-[28px] object-cover',
                'alt'   => $top_image['alt'] ?: 'About collage top image',
            ]
        );
    }

    if ( ! empty( $left_image['ID'] ) ) {
        echo wp_get_attachment_image(
            $left_image['ID'],
            'large',
            false,
            [
                'class' => 'absolute left-0 top-[145px] z-30 w-[460px] rounded-[28px] object-cover',
                'alt'   => $left_image['alt'] ?: 'About collage left image',
            ]
        );
    }

    if ( ! empty( $right_image['ID'] ) ) {
        echo wp_get_attachment_image(
            $right_image['ID'],
            'large',
            false,
            [
                'class' => 'absolute right-0 top-[265px] z-10 w-[460px] rounded-[28px] object-cover',
                'alt'   => $right_image['alt'] ?: 'About collage right image',
            ]
        );
    }
    ?>

</div>

</section>
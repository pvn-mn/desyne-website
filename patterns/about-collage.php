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

        <?php if ($top_image) : ?>
            <img
                src="<?php echo esc_url($top_image['url']); ?>"
                alt="<?php echo esc_attr($top_image['alt'] ?: 'About collage top image'); ?>"
                class="absolute left-1/2 top-0 z-20 w-[500px] -translate-x-1/2 rounded-[28px] object-cover"
                loading="lazy"
            />
        <?php endif; ?>

        <?php if ($left_image) : ?>
            <img
                src="<?php echo esc_url($left_image['url']); ?>"
                alt="<?php echo esc_attr($left_image['alt'] ?: 'About collage left image'); ?>"
                class="absolute left-0 top-[145px] z-30 w-[460px] rounded-[28px] object-cover"
                loading="lazy"
            />
        <?php endif; ?>

        <?php if ($right_image) : ?>
            <img
                src="<?php echo esc_url($right_image['url']); ?>"
                alt="<?php echo esc_attr($right_image['alt'] ?: 'About collage right image'); ?>"
                class="absolute right-0 top-[265px] z-10 w-[460px] rounded-[28px] object-cover"
                loading="lazy"
            />
        <?php endif; ?>

    </div>

</section>
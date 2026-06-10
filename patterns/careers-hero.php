<?php
/**
 * Title: Careers Hero
 * Slug: custom-theme/careers-hero
 * Categories: desyne
 */

$page_id = get_queried_object_id();

$heading     = function_exists('get_field') ? get_field('hero_heading', $page_id) : '';
$subheading  = function_exists('get_field') ? get_field('hero_subheading', $page_id) : '';
$button_text = function_exists('get_field') ? get_field('hero_primary_button_text', $page_id) : '';
$button_url  = function_exists('get_field') ? get_field('hero_primary_button_url', $page_id) : '';
$hero_image  = function_exists('get_field') ? get_field('hero_image', $page_id) : '';

$image_url = '';
$image_alt = '';

if (is_array($hero_image)) {
    $image_url = $hero_image['url'] ?? '';
    $image_alt = $hero_image['alt'] ?? '';
} elseif (is_numeric($hero_image)) {
    $image_url = wp_get_attachment_image_url($hero_image, 'full');
    $image_alt = get_post_meta($hero_image, '_wp_attachment_image_alt', true);
} elseif (is_string($hero_image)) {
    $image_url = $hero_image;
}

if (!$heading) {
    $heading = 'Level up your career and life with Desyne';
}
?>

<section class="bg-white pt-20 md:pt-28">
    <div class="mx-auto max-w-7xl px-6 text-center">
        <div class="mx-auto max-w-4xl">
            <h1 class="text-4xl font-bold leading-[1.05] tracking-tight text-neutral-950 md:text-6xl">
                <?php echo esc_html($heading); ?>
            </h1>

            <?php if ($subheading) : ?>
                <p class="mx-auto mt-5 max-w-xl text-sm leading-6 text-neutral-700 md:text-base">
                    <?php echo esc_html($subheading); ?>
                </p>
            <?php endif; ?>

            <?php if ($button_text && $button_url) : ?>
                <div class="mt-7">
                    <a
                        href="<?php echo esc_url($button_url); ?>"
                        class="inline-flex items-center justify-center rounded-md bg-[#BFDCCB] px-6 py-3 text-sm font-semibold text-neutral-950 transition hover:bg-[#A9CDB8]"
                    >
                        <?php echo esc_html($button_text); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($image_url) : ?>
            <div class="mx-auto mt-12 max-w-4xl">
                <img
                    src="<?php echo esc_url($image_url); ?>"
                    alt="<?php echo esc_attr($image_alt ?: $heading); ?>"
                    class="mx-auto h-auto w-full"
                    loading="eager"
                >
            </div>
        <?php endif; ?>
    </div>
</section>
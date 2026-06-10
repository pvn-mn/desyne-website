<?php
/**
 * Title: Careers Feature Showcase
 * Slug: custom-theme/careers-feature-showcase
 * Categories: custom-theme
 */

$features = new WP_Query([
    'post_type'      => 'feature',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'tax_query'      => [
        [
            'taxonomy' => 'feature_location',
            'field'    => 'slug',
            'terms'    => ['careers-page'],
        ],
    ],
    'meta_key'       => 'display_order',
    'orderby'        => [
        'meta_value_num' => 'ASC',
        'date'           => 'ASC',
    ],
]);
?>

<?php if ($features->have_posts()) : ?>
    <section>
        <?php
        $index = 0;

        while ($features->have_posts()) :
            $features->the_post();

            $post_id = get_the_ID();

            $feature_title = function_exists('get_field') ? get_field('feature_title', $post_id) : '';
            $description   = function_exists('get_field') ? get_field('feature_description', $post_id) : '';
            $icon          = function_exists('get_field') ? get_field('feature_icon', $post_id) : '';

            $title = $feature_title ?: get_the_title();

            $icon_url = '';
            $icon_alt = '';

            if (is_array($icon)) {
                $icon_url = $icon['url'] ?? '';
                $icon_alt = $icon['alt'] ?? '';
            } elseif (is_numeric($icon)) {
                $icon_url = wp_get_attachment_image_url($icon, 'full');
                $icon_alt = get_post_meta($icon, '_wp_attachment_image_alt', true);
            } elseif (is_string($icon)) {
                $icon_url = $icon;
            }
            ?>

            <?php if ($index === 0) : ?>

                <div class="bg-white">
					<div class="mx-auto grid max-w-5xl items-center gap-12 px-6 py-20 md:grid-cols-2 md:gap-16 md:py-28">                        <div>
                            <h2 class="max-w-md text-4xl font-bold leading-tight tracking-tight text-neutral-950 md:text-5xl">
                                <?php echo esc_html($title); ?>
                            </h2>
                        </div>

                        <?php if ($description) : ?>
                            <div class="max-w-xl text-sm leading-7 text-neutral-700">
                                <?php echo wp_kses_post(wpautop($description)); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php else : ?>

                <div class="bg-[#F8F3EE]">
                    <div class="mx-auto grid max-w-5xl items-center gap-12 px-6 py-20 md:grid-cols-2 md:gap-16 md:py-28">
                        <div>

							<!-- " - styling -->
                            <div class="mb-5 text-5xl font-bold leading-none text-[#6554C0]">”</div>

                            <h2 class="max-w-md text-3xl font-bold leading-tight tracking-tight text-neutral-950 md:text-4xl">
                                <?php echo esc_html($title); ?>
                            </h2>

                            <?php if ($description) : ?>
                                <div class="mt-6 max-w-md text-sm leading-7 text-neutral-700">
                                    <?php echo wp_kses_post(wpautop($description)); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($icon_url) : ?>
                            <div class="flex justify-center md:justify-end">
                                <img
                                    src="<?php echo esc_url($icon_url); ?>"
                                    alt="<?php echo esc_attr($icon_alt ?: $title); ?>"
                                    class="h-auto w-full max-w-xl rounded-2xl shadow-xl"
                                    loading="lazy"
                                >
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endif; ?>

            <?php
            $index++;
        endwhile;

        wp_reset_postdata();
        ?>
    </section>
<?php endif; ?>
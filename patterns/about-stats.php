<?php
/**
 * Title: About Stats
 * Slug: custom-theme/about-stats
 * Categories: desyne
 */

$stats = new WP_Query([
    'post_type' => 'about_stat',
    'posts_per_page' => -1,
    'meta_key' => 'display_order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
]);
?>

<section class="m-0 bg-[#F9E45C] py-24">

    <div class="mx-auto max-w-6xl px-6">

        <div class="grid grid-cols-2 gap-6 md:grid-cols-4">

            <?php while ($stats->have_posts()) : $stats->the_post(); ?>

                <?php
                $value = get_field('stat_value');
                $label = get_field('stat_label');
                ?>

                <div class="aspect-[1.6/1] rounded-[999px] bg-white p-8 text-center">
                    <div class="mb-2 text-4xl font-bold text-black">
                        <?php echo esc_html($value); ?>
                    </div>

                    <div class="text-sm text-neutral-600">
                        <?php echo esc_html($label); ?>
                    </div>

                </div>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        </div>

    </div>

</section>
<?php
/**
 * Title: About Testimonials
 * Slug: custom-theme/about-testimonials
 * Categories: desyne
 */

$testimonials = new WP_Query([
    'post_type'      => 'testimonial',
    'posts_per_page' => -1,
    'meta_key'       => 'display_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
    'tax_query'      => [
        [
            'taxonomy' => 'testimonial_location',
            'field'    => 'slug',
            'terms'    => 'about-page',
        ],
    ],
]);
?>

<section class="bg-white pb-24">

    <div class="mx-auto max-w-7xl px-6">

        <div class="mb-12 text-center">
            <h2 class="text-5xl font-bold tracking-tight text-black">
                Client Reviews
            </h2>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            <?php if ($testimonials->have_posts()) : ?>

                <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>

                    <?php
                    $rating = get_field('rating');
                    $review_date = get_field('review_date');
                    $review_title = get_field('review_title');
                    $testimonial_text = get_field('testimonial_text');
                    $person_name = get_field('person_name');
                    $helpful_count = get_field('helpful_count');
                    ?>

                    <article class="rounded-[28px] border border-neutral-200 bg-white p-6 shadow-sm">

                        <div class="mb-4 flex items-center justify-between gap-4">

                            <?php
                            $rating_value = max(0, min(5, (int) $rating));
                            ?>

                            <?php if ($rating_value > 0) : ?>
                                <div class="text-sm font-semibold text-black">
                                    <?php echo esc_html(str_repeat('★', $rating_value)); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($review_date) : ?>
                                <div class="text-sm text-neutral-500">
                                    <?php echo esc_html($review_date); ?>
                                </div>
                            <?php endif; ?>

                        </div>

                        <?php if ($review_title) : ?>
                            <h3 class="mb-3 text-xl font-bold tracking-tight text-black">
                                <?php echo esc_html($review_title); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($testimonial_text) : ?>
                            <p class="mb-6 text-base leading-7 text-neutral-600">
                                <?php echo esc_html($testimonial_text); ?>
                            </p>
                        <?php endif; ?>

                        <div class="flex items-center justify-between pt-5">

                            <?php if ($person_name) : ?>
                                <div class="font-semibold text-black">
                                    <?php echo esc_html($person_name); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($helpful_count !== null && $helpful_count !== '') : ?>
                                <div class="text-sm text-neutral-500">
                                    Helpful <?php echo esc_html($helpful_count); ?>
                                </div>
                            <?php endif; ?>

                        </div>

                    </article>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        </div>

    </div>

</section>
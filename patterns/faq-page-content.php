<?php
/**
 * Title: FAQ Page Content
 * Slug: custom-theme/faq-page-content
 * Categories: desyne
 */

$faqs = new WP_Query([
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'tax_query'      => [
        [
            'taxonomy' => 'faq_location',
            'field'    => 'slug',
            'terms'    => 'faq-page',
        ],
    ],
    'orderby' => 'date',
    'order'   => 'ASC',
]);
?>



<section class="bg-white px-6 pt-20 pb-16 md:pt-28 md:pb-24">
    <div class="mx-auto max-w-3xl text-center">
        <h1 class="text-4xl font-bold tracking-tight text-neutral-950 md:text-5xl">
            Frequently asked questions
        </h1>
    </div>

    <?php if ($faqs->have_posts()) : ?>
        <div
            class="mx-auto mt-12 max-w-3xl"
            x-data="{ open: 0 }"
        >
            <?php
            $index = 0;

            while ($faqs->have_posts()) :
                $faqs->the_post();

                $post_id = get_the_ID();

                $question = function_exists('get_field') ? get_field('question', $post_id) : '';
                $answer   = function_exists('get_field') ? get_field('answer', $post_id) : '';

                $question = $question ?: get_the_title();
                $answer   = $answer ?: get_the_content();
                ?>

                <div class="border-b border-neutral-200 py-5">
                    <button
                    type="button"
                    class="flex w-full items-center justify-between gap-6 text-left"
                    @click="open = open === <?php echo esc_attr($index); ?> ? null : <?php echo esc_attr($index); ?>"
                    >
                    <span class="text-base font-bold text-black md:text-lg">
                        <?php echo esc_html($question); ?>
                    </span>

                    <span
                        class="shrink-0 text-xl leading-none text-black transition-transform"
                        :class="{ 'rotate-180': open === <?php echo esc_attr($index); ?> }"
                    >
                    ⌄
                    </span>
                    </button>

                    <div
                        x-show="open === <?php echo esc_attr($index); ?>"
                        x-collapse
                        class="pt-4"
                    >
                        <div class="max-w-2xl text-sm leading-7 text-neutral-600">
                            <?php echo wp_kses_post(wpautop($answer)); ?>
                        </div>
                    </div>
                </div>

                <?php
                $index++;
            endwhile;

            wp_reset_postdata();
            ?>
        </div>
    <?php endif; ?>

    <p class="mt-10 text-center text-sm text-neutral-500">
        Still have more questions?
        <a href="#" class="font-medium text-neutral-950 underline underline-offset-4">
            Find answers in our help center.
        </a>
    </p>
</section>
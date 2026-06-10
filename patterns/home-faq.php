<!-- faqs CPT -->

<?php
/**
 * Title: Home FAQ
 * Slug: custom-theme/home-faq
 * Categories: desyne
 */

$faqs = new WP_Query([
  'post_type'      => 'faq',
  'post_status'    => 'publish',
  'posts_per_page' => 5,
  'tax_query'      => [
    [
      'taxonomy' => 'faq_location',
      'field'    => 'slug',
      'terms'    => ['home-page'],
    ],
  ],
  'meta_key'       => 'display_order',
  'orderby'        => 'meta_value_num',
  'order'          => 'ASC',
]);
?>

<section class="bg-white py-16 md:py-24">
  <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-6 md:px-12 lg:grid-cols-[360px_1fr] lg:gap-20 lg:px-20">
    
    <div>
      <h2 class="text-4xl font-bold leading-tight tracking-tight text-black md:text-5xl">
        Frequently Asked Questions
      </h2>
    </div>

    <div class="divide-y divide-neutral-200" x-data="{ open: 0 }">
      <?php if ($faqs->have_posts()) : ?>
        <?php
        $index = 0;
        while ($faqs->have_posts()) :
          $faqs->the_post();

          $question = get_field('question') ?: get_the_title();
          $answer = get_field('answer');
        ?>

          <article class="py-6">
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
              <p class="max-w-2xl text-sm leading-6 text-neutral-600 md:text-base md:leading-7">
                <?php echo esc_html($answer); ?>
              </p>
            </div>
          </article>

        <?php
          $index++;
        endwhile;
        wp_reset_postdata();
        ?>
      <?php else : ?>
        <div class="rounded-2xl bg-neutral-100 p-10 text-center text-neutral-500">
          Add FAQ entries in WordPress admin to display this section.
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>
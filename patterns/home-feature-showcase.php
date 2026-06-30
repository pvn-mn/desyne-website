<!-- features CPT -->



<?php
/**
 * Title: Home Feature Showcase
 * Slug: custom-theme/home-feature-showcase
 * Categories: desyne
 */

$features = new WP_Query([
  'post_type'      => 'feature',
  'post_status'    => 'publish',
  'posts_per_page' => 3,
  'meta_key'       => 'display_order',
  'orderby'        => 'meta_value_num',
  'order'          => 'ASC',
  'tax_query'      => [
      [
          'taxonomy' => 'feature_location',
          'field'    => 'slug',
          'terms'    => 'home-page',
      ],
  ],
]);
?>

<section class="bg-white py-4 md:py-8">
  <div class="mx-auto max-w-7xl px-6">
    <?php if ($features->have_posts()) : ?>
      <div class="space-y-14 md:space-y-20">
        <?php
        $index = 0;

        while ($features->have_posts()) :
          $features->the_post();

          $title = get_field('feature_title');

          $points = [
            [
              'title'       => get_field('point_1_title'),
              'description' => get_field('point_1_description'),
            ],
            [
              'title'       => get_field('point_2_title'),
              'description' => get_field('point_2_description'),
            ],
            [
              'title'       => get_field('point_3_title'),
              'description' => get_field('point_3_description'),
            ],
          ];

          $button_text = get_field('button_text');
          $button_url = get_field('button_url');
          $image = get_field('feature_icon');
          $button_color = get_field('button_color') ?: '#5d946f';

          $is_reversed = $index % 2 !== 0;
        ?>

          <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-20">

            <div class="<?php echo $is_reversed ? 'lg:order-2' : 'lg:order-1'; ?>">
              <div class="relative h-[240px] overflow-hidden rounded-3xl bg-neutral-100 shadow-sm md:h-[360px]">
                <?php if ($image) : ?>
                  <img
                    src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($title ?: get_the_title()); ?>"
                    class="h-full w-full object-cover"
                  >
                <?php else : ?>
                  <div class="flex h-full min-h-[320px] items-center justify-center p-8 text-center text-lg font-bold text-neutral-400 md:min-h-[440px]">
                    <?php echo esc_html($title ?: get_the_title()); ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <div class="<?php echo $is_reversed ? 'lg:order-1' : 'lg:order-2'; ?>">
              <div class="max-w-xl font-poppins">

                <h2 class="text-[22px] font-bold leading-[1.15] tracking-normal text-black md:text-[26px]">
                  <?php echo esc_html($title ?: get_the_title()); ?>
                </h2>

                <div class="mt-6 space-y-5">
                  <?php foreach ($points as $point) : ?>
                    <?php if ($point['title'] || $point['description']) : ?>
                      <div>
                        <?php if ($point['title']) : ?>
                          <h3 class="text-[12px] font-bold leading-[1.2] tracking-normal text-black">
                            <?php echo esc_html($point['title']); ?>
                          </h3>
                        <?php endif; ?>

                        <?php if ($point['description']) : ?>
                          <p class="mt-2 text-[12px] font-normal leading-[1.5] tracking-normal text-[#444444]">
                            <?php echo esc_html($point['description']); ?>
                          </p>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>

                <?php if ($button_text) : ?>
                  <a
                    href="<?php echo esc_url($button_url ?: '#'); ?>"
                    class="mt-8 inline-flex rounded-md px-7 py-3 text-[12px] font-bold text-white"
                    style="background-color: <?php echo esc_attr($button_color); ?>;"
                  >
                    <?php echo esc_html($button_text); ?>
                  </a>
                <?php endif; ?>

              </div>
            </div>

          </div>

        <?php
          $index++;
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
    <?php else : ?>
      <div class="rounded-2xl bg-neutral-100 p-10 text-center text-neutral-500">
        Add Feature entries in WordPress admin to display this section.
      </div>
    <?php endif; ?>
  </div>
</section>
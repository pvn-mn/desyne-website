<!-- screenshot_carousel CPT, reused - from 'Template gallery row' to create masonry js layout -->


<?php
/**
 * Title: Home Template Selection
 * Slug: custom-theme/home-template-selection
 * Categories: desyne
 */

$template_selection = new WP_Query([
  'post_type'      => 'screenshot_carousel',
  'post_status'    => 'publish',
  'name'           => 'template-selection',
  'posts_per_page' => 1,
]);

$categories = [
  'Flyers',
  'IG Posts',
  'Posters',
  'Logos',
  'Pintrest',
  'Twitter',
  'Pintrest',
  'Whatsapp',
];

$category_classes = [
  'bg-[#C0DFC7] text-black',
  'bg-[#C7E7F5] text-black',
  'bg-[#FFF1A8] text-black',
  'bg-[#F8BBD0] text-black',
  'bg-[#C8A27A] text-black',
  'bg-[#CCEFEB] text-black',
  'bg-[#E5E5E5] text-black',
  'bg-[#FFD0A6] text-black',
];
?>

<section class="relative overflow-hidden bg-white py-4 md:py-12">
  <div class="mx-auto max-w-7xl px-6 text-center">

    <h2 class="mx-auto max-w-xl font-poppins text-2xl font-bold text-black md:text-3xl">
      15000+ Templates to provoke your hidden creativity
    </h2>

    <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
      <?php foreach ($categories as $index => $category) : ?>
        <button
          type="button"
          class="rounded-md px-5 py-2 text-sm font-bold <?php echo esc_attr($category_classes[$index % count($category_classes)]); ?>"
        >
          <?php echo esc_html($category); ?>
        </button>
      <?php endforeach; ?>
    </div>

    <div class="relative mt-12 overflow-hidden">
      <?php if ($template_selection->have_posts()) : ?>
        <?php while ($template_selection->have_posts()) : $template_selection->the_post(); ?>

          <?php if (has_post_thumbnail()) : ?>
            <?php
              echo get_the_post_thumbnail(
                get_the_ID(),
                'full',
                [
                  'class' => 'mx-auto w-full max-w-6xl rounded-xl object-cover',
                  'alt'   => esc_attr(get_the_title()),
                ]
              );
            ?>
          <?php endif; ?>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

      <div class="pointer-events-none absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-white via-white/90 to-transparent"></div>
    </div>

    <a href="#" class="relative z-10 inline-flex rounded-md bg-[#df3d77] px-7 py-3 text-sm font-bold text-white">
      Explore More Features
    </a>

  </div>
</section>
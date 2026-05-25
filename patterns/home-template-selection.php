<!-- screenshot_carousel CPT, reused - from 'Template gallery row' to create masonry js layout -->


<?php
/**
 * Title: Home Template Selection
 * Slug: custom-theme/home-template-selection
 * Categories: desyne
 */

$templates = new WP_Query([
  'post_type'      => 'screenshot_carousel',
  'post_status'    => 'publish',
  'posts_per_page' => 12,
  'meta_key'       => 'display_order',
  'orderby'        => 'meta_value_num',
  'order'          => 'ASC',
]);

$categories = [
  'Flyers',
  'Instagram',
  'Posters',
  'Logos',
  'Banners',
  'Stories',
];

$card_classes = [
  'row-span-2 h-[260px]',
  'row-span-3 h-[360px]',
  'row-span-2 h-[260px]',
  'row-span-4 h-[460px]',
  'row-span-3 h-[360px]',
  'row-span-2 h-[260px]',
  'row-span-4 h-[460px]',
  'row-span-2 h-[260px]',
  'row-span-3 h-[360px]',
  'row-span-2 h-[260px]',
  'row-span-4 h-[460px]',
  'row-span-3 h-[360px]',
];
?>

<section class="relative overflow-hidden bg-white py-20 md:py-28">
  <div class="mx-auto max-w-7xl px-6 text-center">
    <h2 class="mx-auto max-w-2xl text-4xl font-black leading-tight tracking-tight text-black md:text-5xl">
      15000+ Templates to provoke your hidden creativity
    </h2>

    <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
      <?php foreach ($categories as $category) : ?>
        <button
          type="button"
          class="rounded-md bg-neutral-100 px-5 py-2 text-sm font-bold text-neutral-700"
        >
          <?php echo esc_html($category); ?>
        </button>
      <?php endforeach; ?>
    </div>

    <div class="relative mt-12">
      <div class="grid auto-rows-[80px] grid-cols-2 gap-4 overflow-hidden md:grid-cols-4 lg:grid-cols-6">
        <?php if ($templates->have_posts()) : ?>
          <?php
          $i = 0;
          while ($templates->have_posts()) :
            $templates->the_post();

            $title = get_field('screenshot_title');
            $image = get_field('screenshot_image');
            $class = $card_classes[$i % count($card_classes)];
          ?>
            <article class="overflow-hidden rounded-xl bg-neutral-100 shadow-lg <?php echo esc_attr($class); ?>">
              <?php if ($image) : ?>
                <img
                  src="<?php echo esc_url($image['url']); ?>"
                  alt="<?php echo esc_attr($title ?: get_the_title()); ?>"
                  class="h-full w-full object-cover"
                >
              <?php else : ?>
                <div class="flex h-full w-full items-center justify-center p-4 text-center text-sm font-bold text-neutral-500">
                  <?php echo esc_html($title ?: get_the_title()); ?>
                </div>
              <?php endif; ?>
            </article>
          <?php
            $i++;
          endwhile;
          wp_reset_postdata();
          ?>
        <?php else : ?>
          <?php for ($i = 0; $i < 12; $i++) : ?>
            <article class="rounded-xl bg-neutral-100 shadow-lg <?php echo esc_attr($card_classes[$i % count($card_classes)]); ?>"></article>
          <?php endfor; ?>
        <?php endif; ?>
      </div>

      <div class="pointer-events-none absolute inset-x-0 bottom-0 h-48 bg-gradient-to-t from-white via-white/90 to-transparent"></div>
    </div>

    <a href="#" class="relative z-10 mt-10 inline-flex rounded-md bg-[#df3d77] px-7 py-3 text-sm font-bold text-white">
      Explore More Features
    </a>
  </div>
</section>
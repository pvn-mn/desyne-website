<!-- screenshot_carousel CPT -->

<?php
/**
 * Title: Home Template Gallery Row
 * Slug: custom-theme/home-template-gallery-row
 * Categories: desyne
 */

$cards = new WP_Query([
  'post_type'      => 'screenshot_carousel',
  'post_status'    => 'publish',
  'posts_per_page' => 8,
  'meta_key'       => 'display_order',
  'orderby'        => 'meta_value_num',
  'order'          => 'ASC',
]);
?>

<section class="relative mx-auto max-w-7xl overflow-hidden px-0 pb-4 pt-20 lg:px-6">
  <div
    class="
      flex items-end gap-4 overflow-x-auto overflow-y-hidden px-6
      snap-x snap-mandatory scroll-smooth
      lg:justify-start
      [-webkit-overflow-scrolling:touch]
      [scrollbar-width:none]
      [&::-webkit-scrollbar]:hidden
    "
  >
      <?php if ($cards->have_posts()) : ?>
        <?php
        $i = 0;

        $sizes = [
          'h-56',
          'h-64',
          'h-80',
          'h-72',
          'h-40',
          'h-60',
          'h-56',
          'h-30',
        ];

        $tag_colors = [
          'bg-[#F8C8DC]', // Pink
          'bg-[#FCE38A]', // Yellow
          'bg-[#BDEFF0]', // Blue
          'bg-[#E5E7EB]', // Grey
          'bg-[#FFD6A5]', // Orange
          'bg-[#CBECCB]', // Green
          'bg-[#D8C4F8]', // Violet
          'bg-[#A8D5BA]', // Dark Green
        ];

        while ($cards->have_posts()) :
          $cards->the_post();

          $title = get_field('screenshot_title');
          $image = get_field('screenshot_image');
          $size_class = $sizes[$i % count($sizes)];
          $tag_color = $tag_colors[$i % count($tag_colors)];
          $i++;
        ?>

  <article class="relative w-40 shrink-0 snap-start pt-5">

    <!-- title tag -->
    <div class="absolute left-1/2 top-0 z-10 flex h-[30px] w-[100px] -translate-x-1/2 items-center justify-center rounded-[5px] <?php echo esc_attr($tag_color); ?> px-3 text-center shadow-sm">
      <span class="truncate font-poppins text-[12px] font-bold leading-[1] text-[#5F7777]">
        <?php echo esc_html($title ?: get_the_title()); ?>
      </span>
    </div>

    <!-- template row -->
    <div class="overflow-hidden rounded-xl bg-white shadow-2xl <?php echo esc_attr($size_class); ?>">
      <?php if ($image) : ?>
        <img
          src="<?php echo esc_url($image['url']); ?>"
          alt="<?php echo esc_attr($title ?: get_the_title()); ?>"
          draggable="false"
          class="pointer-events-none h-full w-full select-none object-cover"
        >
      <?php else : ?>
        <div class="pointer-events-none flex h-full w-full items-center justify-center bg-neutral-100 p-4 text-center text-sm font-bold text-neutral-500">
          <?php echo esc_html($title ?: get_the_title()); ?>
        </div>
      <?php endif; ?>
    </div>

  </article>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <?php for ($i = 0; $i < 6; $i++) : ?>
          <article class="h-64 w-40 shrink-0 snap-start rounded-xl bg-neutral-100 shadow-2xl"></article>
        <?php endfor; ?>
      <?php endif; ?>
  </div>
</section>
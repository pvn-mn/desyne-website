<!-- 

Tools CPT entries:

Background Remover
Color Match
Image Cropper
Text Effects
Brand Kit
Photo Enhancer 
(Tool 07)
....
(Tool 12)

-->

<?php
/**
 * Title: Home Tools Grid
 * Slug: custom-theme/home-tools-grid
 * Categories: desyne
 */

$tools = new WP_Query([
  'post_type'      => 'tool',
  'post_status'    => 'publish',
  'posts_per_page' => 12,
  'meta_key'       => 'display_order',
  'orderby'        => 'meta_value_num',
  'order'          => 'ASC',
]);
?>

<section class="bg-white pt-7 pb-14 md:pt-7 pb-14">
  <div class="mx-auto max-w-7xl px-20">
    <h2 class="max-w-xl text-2xl font-semibold leading-tight tracking-tight text-black md:text-4xl">
      Creative tools. Stunning graphics.
    </h2>

    <div class="mt-12 grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-6">
      <?php if ($tools->have_posts()) : ?>
        <?php while ($tools->have_posts()) : $tools->the_post(); ?>
          <?php
          $title = get_field('tool_title') ?: get_the_title();

          // $icon not provided entry in Tools CPT as figma left icon vacant
          $icon = get_field('tool_icon');
          ?>

          <article class="flex aspect-square flex-col items-center justify-center rounded-2xl bg-neutral-100 p-5 text-center">
            <?php if ($icon) : ?>
              <img
                src="<?php echo esc_url($icon['url']); ?>"
                alt="<?php echo esc_attr($title); ?>"
                class="mb-4 h-14 w-14 object-contain"
              >
            <?php endif; ?>

            <h3 class="text-sm font-bold text-neutral-700 pt-20">
              <?php echo esc_html($title); ?>
            </h3>
          </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <div class="col-span-full rounded-2xl bg-neutral-100 p-10 text-center text-neutral-500">
          Add Tool entries in WordPress admin to display this section.
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

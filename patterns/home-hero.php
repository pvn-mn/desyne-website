<!-- Page Hero ACF fields on Home page -->

<?php
/**
 * Title: Home Hero
 * Slug: custom-theme/home-hero
 * Categories: desyne
 */

$home_id = get_option('page_on_front');

$label = get_field('hero_label', $home_id);
$heading = get_field('hero_heading', $home_id);
$subheading = get_field('hero_subheading', $home_id);
$primary_text = get_field('hero_primary_button_text', $home_id);
$primary_url = get_field('hero_primary_button_url', $home_id);
$secondary_text = get_field('hero_secondary_button_text', $home_id);
$secondary_url = get_field('hero_secondary_button_url', $home_id);
?>

<section class="mx-auto max-w-6xl px-6 pb-16 pt-20 text-center">
  <?php if ($label) : ?>
    <p class="mb-5 text-sm font-semibold text-neutral-500">
      <?php echo esc_html($label); ?>
    </p>
  <?php endif; ?>

  <h1 class="mx-auto max-w-4xl text-5xl font-black leading-none tracking-tight text-black md:text-7xl lg:text-8xl">
    <?php echo esc_html($heading ?: 'Create mind-blowing designs in seconds.'); ?>
  </h1>

  <p class="mx-auto mt-7 max-w-2xl text-base leading-7 text-neutral-600 md:text-lg">
    <?php echo esc_html($subheading ?: 'Create professional graphics, social posts, banners, and branded content with ready-made templates and easy editing tools.'); ?>
  </p>

  <div class="mt-9 flex flex-wrap items-center justify-center gap-4">
    <?php if ($primary_text) : ?>
      <a href="<?php echo esc_url($primary_url ?: '#'); ?>" class="rounded-md bg-[#ccefeb] px-7 py-3 text-sm font-bold text-black">
        <?php echo esc_html($primary_text); ?>
      </a>
    <?php endif; ?>

    <?php if ($secondary_text) : ?>
      <a href="<?php echo esc_url($secondary_url ?: '#'); ?>" class="rounded-md border border-black bg-white px-7 py-3 text-sm font-bold text-black">
        <?php echo esc_html($secondary_text); ?>
      </a>
    <?php endif; ?>
  </div>
</section>
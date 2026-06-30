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

<section class="mx-auto max-w-6xl px-6 pt-20 text-center">
  <?php if ($label) : ?>
    <p class="mb-5 text-sm font-semibold text-neutral-500">
      <?php echo esc_html($label); ?>
    </p>
  <?php endif; ?>

  <h1 class="mx-auto max-w-[720px] text-center font-poppins text-[72px] font-extrabold leading-[0.93] tracking-normal text-[#000000]">
      <?php echo esc_html($heading ?: 'already in metabox'); ?>
  </h1>

  <p class="mx-auto mt-7 max-w-[480px] text-center font-poppins text-[16px] font-light leading-[1.5] tracking-normal text-[#444444]">
      <?php echo esc_html($subheading ?: 'already in metabox'); ?>
  </p>

  <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
      <?php if ($primary_text) : ?>
        <a href="<?php echo esc_url($primary_url ?: '#'); ?>" class="rounded-md bg-[#C0DFC7] px-5 py-2.5 text-[10px] font-bold text-black">
          <?php echo esc_html($primary_text); ?>
        </a>
      <?php endif; ?>

      <?php if ($secondary_text) : ?>
        <a href="<?php echo esc_url($secondary_url ?: '#'); ?>" class="rounded-md border border-black bg-white px-5 py-2.5 text-[10px] font-bold text-black">
          <?php echo esc_html($secondary_text); ?>
        </a>
      <?php endif; ?>
  </div>

</section>
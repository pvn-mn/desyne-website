<!-- is this fron ACF form fields 'site links' as it also has 'App store' and 'Goggle play' -->


<?php
/**
 * Title: Home Download CTA
 * Slug: custom-theme/home-download-cta
 * Categories: desyne
 */

$download_cta = new WP_Query([
  'post_type'      => 'download_cta',
  'post_status'    => 'publish',
  'posts_per_page' => 1,
]);

$heading = '';
$subheading = '';
$app_store_url = '#';
$play_store_url = '#';
$phone_image = null;

if ($download_cta->have_posts()) {
  $download_cta->the_post();

  $heading = get_field('download_heading');
  $subheading = get_field('download_subheading');
  $app_store_url = get_field('app_store_url') ?: '#';
  $play_store_url = get_field('play_store_url') ?: '#';
  $phone_image = get_field('phone_mockup_image');

  wp_reset_postdata();
}
?>

<section class="overflow-hidden bg-[#dcefed] py-14 md:py-22">
  <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-6 md:px-12 lg:grid-cols-2 lg:pr-20">
    
    <div>
      <h2 class="max-w-xl text-3xl font-bold font-['DM_Serif_Display'] text-[#254047] leading-tight tracking-tight md:text-6xl">
        <?php echo esc_html($heading ?: 'Personalise a professional design in minutes.'); ?>
      </h2>

      <p class="mt-4 max-w-md text-base leading-7 text-neutral-700 md:text-lg">
        <?php echo esc_html($subheading ?: 'Access templates, graphics, photos, and editing tools from your phone whenever inspiration strikes.'); ?>
      </p>

<div class="mt-6 flex flex-wrap items-center gap-4">

    <a
        href="<?php echo esc_url($play_store_url); ?>"
        target="_blank"
        rel="noopener noreferrer"
    >
        <img
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/googleplay.svg'); ?>"
            alt="Get it on Google Play"
            class="h-14 w-auto transition-transform duration-200 hover:scale-105"
        >
    </a>

    <a
        href="<?php echo esc_url($app_store_url); ?>"
        target="_blank"
        rel="noopener noreferrer"
    >
        <img
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/appstore.svg'); ?>"
            alt="Download on the App Store"
            class="h-14 w-auto transition-transform duration-200 hover:scale-105"
        >
    </a>

</div>
    </div>

    <div class="relative h-[320px] md:h-[420px]">
      <?php if ($phone_image) : ?>

<img
  src="<?php echo esc_url($phone_image['url']); ?>"
  alt="<?php echo esc_attr($heading ?: 'Mobile app preview'); ?>"
  class="absolute left-1/3 top-6 z-10 h-[400px] -translate-x-[40%] rounded-[2.5rem] object-contain md:h-[500px]"
>

      <?php else : ?>
        <div class="absolute left-1/2 top-6 z-10 h-[340px] w-[180px] -translate-x-[35%] rounded-[2.5rem] bg-white shadow-xl md:h-[460px] md:w-[245px]"></div>
        <div class="absolute left-1/2 top-[60px] z-0 h-[315px] w-[165px] -translate-x-[5%] rotate-[-12deg] rounded-[2.5rem] bg-white/70 shadow-xl md:h-[430px] md:w-[230px]"></div>
      <?php endif; ?>
    </div>    
  </div>
</section>
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
  <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-6 md:px-12 lg:grid-cols-2 lg:px-20">
    
    <div>
      <h2 class="max-w-xl text-3xl font-bold leading-tight tracking-tight text-black md:text-5xl">
        <?php echo esc_html($heading ?: 'Personalise a professional design in minutes.'); ?>
      </h2>

      <p class="mt-4 max-w-md text-base leading-7 text-neutral-700 md:text-lg">
        <?php echo esc_html($subheading ?: 'Access templates, graphics, photos, and editing tools from your phone whenever inspiration strikes.'); ?>
      </p>

      <div class="mt-6 flex flex-wrap gap-4">
        <a
          href="<?php echo esc_url($play_store_url); ?>"
          class="inline-flex items-center rounded-md bg-black px-5 py-3 text-sm font-bold text-white"
        >
          Google Play
        </a>

        <a
          href="<?php echo esc_url($app_store_url); ?>"
          class="inline-flex items-center rounded-md bg-black px-5 py-3 text-sm font-bold text-white"
        >
          App Store
        </a>
      </div>
    </div>

    <div class="relative h-[320px] md:h-[420px]">
      <?php if ($phone_image) : ?>

        <img
        src="<?php echo esc_url($phone_image['url']); ?>"
        alt="<?php echo esc_attr($heading ?: 'Mobile app preview'); ?>"
        class="absolute left-1/3 top-6 z-10 h-[340px] -translate-x-[65%] rounded-[2.5rem] object-contain md:h-[460px]"
        >

        <img
        src="<?php echo esc_url($phone_image['url']); ?>"
        alt=""
        aria-hidden="true"
        class="absolute left-1/3 top-[72px] z-0 h-[310px] -translate-x-[15%] rotate-[30deg] rounded-[2.5rem] object-contain opacity-90 md:h-[410px]"
        >
        
      <?php else : ?>
        <div class="absolute left-1/2 top-6 z-10 h-[340px] w-[180px] -translate-x-[35%] rounded-[2.5rem] bg-white shadow-xl md:h-[460px] md:w-[245px]"></div>
        <div class="absolute left-1/2 top-[60px] z-0 h-[315px] w-[165px] -translate-x-[5%] rotate-[-12deg] rounded-[2.5rem] bg-white/70 shadow-xl md:h-[430px] md:w-[230px]"></div>
      <?php endif; ?>
    </div>    
  </div>
</section>
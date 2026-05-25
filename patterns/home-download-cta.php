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

<section class="overflow-hidden bg-[#dcefed] py-14 md:py-20">
  <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-6 md:px-12 lg:grid-cols-2 lg:px-20">
    
    <div>
      <h2 class="max-w-xl text-3xl font-bold leading-tight tracking-tight text-black md:text-5xl">
        <?php echo esc_html($heading ?: 'Personalise a professional design in minutes.'); ?>
      </h2>

      <p class="mt-6 max-w-md text-base leading-7 text-neutral-700 md:text-lg">
        <?php echo esc_html($subheading ?: 'Access templates, graphics, photos, and editing tools from your phone whenever inspiration strikes.'); ?>
      </p>

      <div class="mt-8 flex flex-wrap gap-4">
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

    <div class="relative min-h-[360px] md:min-h-[480px]">
      <?php if ($phone_image) : ?>

        <img
        src="<?php echo esc_url($phone_image['url']); ?>"
        alt="<?php echo esc_attr($heading ?: 'Mobile app preview'); ?>"
        class="absolute left-1/3 top-10 z-10 h-[320px] -translate-x-[65%] rounded-[2rem] object-contain md:h-[440px]"
        >

        <img
        src="<?php echo esc_url($phone_image['url']); ?>"
        alt=""
        aria-hidden="true"
        class="absolute left-1/3 top-20 z-0 h-[300px] -translate-x-[15%] rotate-[30deg] rounded-[2rem] object-contain opacity-90 md:h-[400px]"
        >
        
      <?php else : ?>
        <div class="absolute left-1/2 top-10 z-10 h-[320px] w-[170px] -translate-x-[35%] rounded-[2rem] bg-white shadow-xl md:h-[440px] md:w-[230px]"></div>
        <div class="absolute left-1/2 top-16 z-0 h-[300px] w-[160px] -translate-x-[5%] rotate-[-12deg] rounded-[2rem] bg-white/70 shadow-xl md:h-[420px] md:w-[220px]"></div>
      <?php endif; ?>
    </div>    
  </div>
</section>
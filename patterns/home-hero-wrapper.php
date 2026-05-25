<!-- new pattern/ file - home-hero and home-template-gallery-row sharing same background -->


<?php
/**
 * Title: Home Hero Wrapper
 * Slug: custom-theme/home-hero-wrapper
 * Categories: desyne
 */
?>



<section class="relative overflow-hidden bg-white pt-24">

    <!-- scatter dot background -->
  <div class="pointer-events-none absolute inset-0 z-0">
    <span class="absolute left-[6%] top-[8%] h-6 w-6 rounded-full bg-pink-200"></span>
    <span class="absolute right-[14%] top-[23%] h-8 w-8 rounded-full bg-cyan-200"></span>
    <span class="absolute left-[11%] top-[84%] h-5 w-5 rotate-45 bg-yellow-200"></span>
    <span class="absolute right-[8%] top-[62%] h-7 w-7 rounded-full border-2 border-purple-200"></span>
    <span class="absolute left-[45%] top-[38%] h-4 w-4 rotate-45 bg-green-200"></span>
    <span class="absolute right-[31%] top-[71%] h-10 w-10 rounded-full border border-pink-200"></span>  
  </div>


  <div class="relative z-10">
    <?php get_template_part('patterns/home-hero'); ?>
    <?php get_template_part('patterns/home-template-gallery-row'); ?>
  </div>
</section>
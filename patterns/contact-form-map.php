<?php
/**
 * Title: Contact Form Map
 * Slug: custom-theme/contact-form-map
 * Categories: desyne
 */
?>

<section class="bg-white py-14">
  <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
    <h2 class="text-center text-3xl font-bold text-slate-900">
      Contact Us
    </h2>

    <div class="mt-10 grid grid-cols-1 gap-8 lg:grid-cols-2">
      <div class="rounded-xl border border-slate-200 p-6">
        <?php echo do_shortcode('[contact-form-7 id="123" title="Contact form"]'); ?>
      </div>

      <div class="overflow-hidden rounded-xl border border-slate-200">
        <iframe
          src="https://www.google.com/maps/embed?pb="
          width="100%"
          height="420"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>
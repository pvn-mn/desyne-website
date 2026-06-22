<?php
/**
 * Title: Contact Section
 * Slug: custom-theme/contact-section
 * Categories: desyne
 */
?>

<section class="relative overflow-hidden bg-white py-20 sm:py-24 lg:py-28">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">

    <div class="mx-auto max-w-2xl text-center">
      <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">
        Contact
      </p>

      <h1 class="mt-4 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
        Get in touch
      </h1>

      <p class="mt-6 text-lg leading-8 text-slate-600">
        Have a question about Desyne? Send us a message and we’ll get back to you.
      </p>
    </div>

    <div class="mx-auto mt-14 max-w-2xl rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
      <?php echo do_shortcode('[contact-form-7 id="c3d2bca" title="Contact"]'); ?>
    </div>

  </div>
</section>
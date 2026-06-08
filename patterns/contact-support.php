<?php
/**
 * Title: Contact Support
 * Slug: custom-theme/contact-support
 * Categories: desyne
 */

$categories = [
  'Getting Started',
  'Creating and Editing Designs',
  'Site Navigation & Visual Assets',
  'Billing and Licensing Questions',
  'Desyne for Mobile',
  'Help with printing out your designs',
  'Getting Started',
  'Creating and Editing Designs',
  'Site Navigation & Visual Assets',
];
?>

<section class="bg-white py-12 sm:py-16">
  <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 text-center">
    <h1 class="text-4xl font-bold tracking-tight text-black sm:text-5xl">
      Desyne Support
    </h1>

    <div class="mx-auto mt-8 max-w-3xl">
      <div class="flex h-11 items-center rounded-full border border-slate-200 bg-white px-5 shadow-md">
        <span class="mr-3 text-slate-400">⌕</span>
        <input
          type="search"
          placeholder="Search Help Articles..."
          class="w-full border-0 bg-transparent text-sm text-slate-600 placeholder:text-slate-400 focus:outline-none"
        />
      </div>
    </div>

    <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($categories as $category) : ?>
        <a href="#" class="border border-blue-100 px-6 py-5 text-sm font-medium text-blue-600 transition hover:border-blue-300 hover:bg-blue-50">
          <?php echo esc_html($category); ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
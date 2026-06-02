<?php
/**
 * Title: About Hero
 * Slug: custom-theme/about-hero
 * Categories: desyne
 */

$page_id = get_queried_object_id();

$heading = get_field('hero_heading', $page_id);
$subheading = get_field('hero_subheading', $page_id);
?>

<section class="pt-20 text-center">

    <div class="mx-auto max-w-4xl px-6">

        <?php if ($heading) : ?>
            <h1 class="mb-6 text-5xl font-bold tracking-tight text-black md:text-7xl">
                <?php echo esc_html($heading); ?>
            </h1>
        <?php endif; ?>

        <?php if ($subheading) : ?>
            <p class="mx-auto max-w-2xl text-lg leading-8 text-neutral-600">
                <?php echo esc_html($subheading); ?>
            </p>
        <?php endif; ?>

    </div>

</section>
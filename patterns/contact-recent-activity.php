<?php
/**
 * Title: Contact Recent Activity
 * Slug: custom-theme/contact-recent-activity
 * Categories: desyne
 */

$recent_query = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 4,
  'post_status' => 'publish',
]);
?>

<section class="bg-white py-14">
  <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
    <h2 class="text-center text-3xl font-bold text-slate-800">
      Recent activity
    </h2>

    <div class="mt-10 divide-y divide-slate-200">
      <?php if ($recent_query->have_posts()) : ?>
        <?php while ($recent_query->have_posts()) : $recent_query->the_post(); ?>
          <article class="py-5">
            <a href="<?php the_permalink(); ?>" class="block">
              <h3 class="text-base font-bold text-slate-800"><?php the_title(); ?></h3>
              <p class="mt-1 text-sm text-slate-500">
                <?php echo esc_html(wp_trim_words(get_the_excerpt(), 12)); ?>
              </p>
            </a>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php else : ?>
        <?php for ($i = 0; $i < 4; $i++) : ?>
          <article class="py-5">
            <h3 class="text-base font-bold text-slate-800">What is Desyne?</h3>
            <p class="mt-1 text-sm text-slate-500">Is VisitaCreate easy to use for beginners?</p>
          </article>
        <?php endfor; ?>
      <?php endif; ?>
    </div>

    <a href="#" class="mt-6 inline-block text-sm font-medium text-blue-600">
      See more
    </a>
  </div>
</section>
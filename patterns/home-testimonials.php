<!-- testimonials CPT -->

<?php
/**
 * Title: Home Testimonials
 * Slug: custom-theme/home-testimonials
 * Categories: desyne
 */

$testimonials = new WP_Query([
  'post_type'      => 'testimonial',
  'post_status'    => 'publish',
  'posts_per_page' => 3,
  'meta_key'       => 'display_order',
  'orderby'        => 'meta_value_num',
  'order'          => 'ASC',
]);
?>

<section class="bg-white py-16 md:py-24">
  <div class="mx-auto max-w-7xl px-6 md:px-12 lg:px-20">
    <div class="mb-10 flex items-end justify-between gap-6">
      <h2 class="max-w-xl text-3xl font-bold leading-tight tracking-tight text-black md:text-5xl">
        Hear It Straight From Our Customers
      </h2>

      <a href="#" class="hidden text-sm font-bold text-neutral-500 md:inline-flex">
        View all →
      </a>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
      <?php if ($testimonials->have_posts()) : ?>
        <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
          <?php
          $person_name = get_field('person_name') ?: get_the_title();
          $person_role = get_field('person_role');
          $photo = get_field('photo');
          $rating = (int) get_field('rating');
          $testimonial_text = get_field('testimonial_text');
          ?>

          <article class="rounded-2xl bg-white p-8 text-center shadow-lg ring-1 ring-black/5">
            <?php if ($photo) : ?>
              <img
                src="<?php echo esc_url($photo['url']); ?>"
                alt="<?php echo esc_attr($person_name); ?>"
                class="mx-auto mb-5 h-14 w-14 rounded-full object-cover"
              >
            <?php endif; ?>

            <div class="mb-5 text-4xl font-black leading-none text-[#df3d77]">“</div>

            <?php if ($testimonial_text) : ?>
              <p class="mx-auto min-h-[96px] max-w-sm text-sm leading-6 text-neutral-600">
                <?php echo esc_html($testimonial_text); ?>
              </p>
            <?php endif; ?>

            <div class="mt-6 flex justify-center gap-1 text-sm text-[#f5a623]">
              <?php for ($i = 1; $i <= 5; $i++) : ?>
                <span><?php echo $i <= $rating ? '★' : '☆'; ?></span>
              <?php endfor; ?>
            </div>

            <h3 class="mt-5 text-base font-bold text-black">
              <?php echo esc_html($person_name); ?>
            </h3>

            <?php if ($person_role) : ?>
              <p class="mt-1 text-sm text-neutral-500">
                <?php echo esc_html($person_role); ?>
              </p>
            <?php endif; ?>
          </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <div class="col-span-full rounded-2xl bg-neutral-100 p-10 text-center text-neutral-500">
          Add Testimonial entries in WordPress admin to display this section.
        </div>
      <?php endif; ?>
    </div>

    <a href="#" class="mt-8 inline-flex text-sm font-bold text-neutral-500 md:hidden">
      View all →
    </a>
  </div>
</section>
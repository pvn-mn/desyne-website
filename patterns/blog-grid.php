<?php
/**
 * Title: Blog Grid
 * Slug: custom-theme/blog-grid
 * Categories: desyne
 */

$query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
]);
?>

<section class="py-20">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="overflow-hidden rounded-3xl bg-white shadow-sm">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', [
                                    'class' => 'h-64 w-full object-cover',
                                ]); ?>
                            <?php endif; ?>
                        </a>

                        <div class="p-6">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                            ?>
                                <p class="mb-3 text-xs font-semibold uppercase tracking-wide">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </p>
                            <?php endif; ?>

                            <h2 class="text-xl font-semibold">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <div class="mt-4 flex items-center gap-3 text-sm">
                                <span><?php the_author(); ?></span>
                                <span>•</span>
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date('F j, Y')); ?>
                                </time>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
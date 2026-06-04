<?php
/**
 * Title: Single Post Content
 * Slug: desyne/single-post-content
 * Categories: desyne
 */
?>

<main class="py-20">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <article class="mx-auto max-w-4xl px-6 lg:px-8">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) :
                ?>
                    <p class="mb-4 text-xs font-semibold uppercase tracking-wide">
                        <?php echo esc_html($categories[0]->name); ?>
                    </p>
                <?php endif; ?>

                <h1 class="text-4xl font-semibold md:text-6xl">
                    <?php the_title(); ?>
                </h1>

                <div class="mt-6 flex items-center gap-3 text-sm">
                    <span><?php the_author(); ?></span>
                    <span>•</span>
                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                        <?php echo esc_html(get_the_date('F j, Y')); ?>
                    </time>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="mt-10 overflow-hidden rounded-3xl">
                        <?php the_post_thumbnail('full', [
                            'class' => 'w-full object-cover',
                        ]); ?>
                    </div>
                <?php endif; ?>

                <div class="prose mt-12 max-w-none">
                    <?php the_content(); ?>
                </div>
            </article>

        <?php endwhile; ?>
    <?php endif; ?>
</main>
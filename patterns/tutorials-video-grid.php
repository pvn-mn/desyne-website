<?php
/**
 * Title: Tutorials Video Grid
 * Slug: custom-theme/tutorials-video-grid
 * Categories: desyne
 */

$tutorials = new WP_Query([
	'post_type'      => 'tutorial',
	'posts_per_page' => 6,
	'meta_key'       => 'display_order',
	'orderby'        => 'meta_value_num',
	'order'          => 'ASC',
]);
?>

<section class="pb-24">
	<div class="mx-auto max-w-7xl px-6">

		<h2 class="mb-8 text-3xl font-bold tracking-tight text-black">
			Get Started
		</h2>

		<div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

			<?php if ($tutorials->have_posts()) : ?>

				<?php while ($tutorials->have_posts()) : $tutorials->the_post(); ?>

					<?php
					$youtube_url = get_field('youtube_url');
					$duration = get_field('duration');
					$views = get_field('view_count');
					$thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
					$terms = get_the_terms(get_the_ID(), 'tutorial_category');
					$category_name = $terms && !is_wp_error($terms) ? $terms[0]->name : 'Tutorial';
					$link = get_permalink();
					?>

					<article class="overflow-hidden rounded-[28px] border border-neutral-200 bg-white">

						<a href="<?php echo esc_url($link); ?>" class="block group">

							<div class="relative aspect-video overflow-hidden bg-neutral-100">

								<?php if ($thumbnail) : ?>
									<img
										src="<?php echo esc_url($thumbnail); ?>"
										alt="<?php echo esc_attr(get_the_title()); ?>"
										class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
									/>
								<?php endif; ?>

								<span class="absolute left-4 top-4 rounded-full bg-white px-3 py-1 text-xs font-semibold text-black">
									<?php echo esc_html($category_name); ?>
								</span>

								<?php if ($duration) : ?>
									<span class="absolute bottom-4 right-4 rounded-full bg-black px-3 py-1 text-xs font-semibold text-white">
										<?php echo esc_html($duration); ?>
									</span>
								<?php endif; ?>

							</div>

							<div class="p-5">
								<h3 class="text-xl font-bold tracking-tight text-black">
									<?php the_title(); ?>
								</h3>

								<?php if ($views) : ?>
									<p class="mt-3 text-sm text-neutral-500">
										<?php echo esc_html($views); ?> views
									</p>
								<?php endif; ?>
							</div>

						</a>

					</article>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>

				<p>No tutorials found.</p>

			<?php endif; ?>

		</div>

	</div>
</section>
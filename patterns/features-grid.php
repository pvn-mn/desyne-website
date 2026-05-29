<?php
/**
 * Title: Features Grid
 * Slug: custom-theme/features-grid
 * Categories: desyne
 */

$features = new WP_Query([
	'post_type'      => 'feature',
	'posts_per_page' => -1,
	'meta_key'       => 'display_order',
	'orderby'        => 'meta_value_num',
	'order'          => 'ASC',
	'tax_query'      => [
		[
			'taxonomy' => 'feature_location',
			'field'    => 'slug',
			'terms'    => 'features-page',
		],
	],
]);
?>

<section class="pb-24">

	<div class="mx-auto max-w-7xl px-6">

		<div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

			<?php if ($features->have_posts()) : ?>

				<?php while ($features->have_posts()) : $features->the_post(); ?>

					<?php
					$title = get_field('feature_title');
					$description = get_field('feature_description');
					$icon = get_field('feature_icon');
					?>

					<article class="rounded-[28px] border border-neutral-200 bg-white p-5">

						<?php if ($icon) : ?>

							<div class="mb-5 overflow-hidden rounded-[24px] bg-neutral-100">

								<img
									src="<?php echo esc_url($icon['url']); ?>"
									alt="<?php echo esc_attr($title); ?>"
									class="h-auto w-full object-cover"
								/>

							</div>

						<?php endif; ?>

						<h3 class="mb-3 text-2xl font-bold tracking-tight text-black">
							<?php echo esc_html($title); ?>
						</h3>

						<p class="text-base leading-7 text-neutral-600">
							<?php echo esc_html($description); ?>
						</p>

					</article>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>

				<p>No features found.</p>

			<?php endif; ?>

		</div>

	</div>

</section>
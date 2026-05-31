<?php
/**
 * Title: Tutorials Category Grid
 * Slug: custom-theme/tutorials-category-grid
 * Categories: desyne
 */

$categories = get_terms([
	'taxonomy'   => 'tutorial_category',
	'hide_empty' => false,
	'orderby'    => 'name',
	'order'      => 'ASC',
]);
?>

<section class="pb-20">
	<div class="mx-auto max-w-7xl px-6">

		<h2 class="mb-8 text-3xl font-bold tracking-tight text-black">
			Explore all tutorial categories
		</h2>

		<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-5">

			<?php if (!empty($categories) && !is_wp_error($categories)) : ?>

				<?php foreach ($categories as $category) : ?>

					<?php
					$description = get_field('category_short_description', 'tutorial_category_' . $category->term_id);
					$card_color = get_field('category_card_color', 'tutorial_category_' . $category->term_id);
					$card_color = $card_color ?: '#F4F4F5';
					?>

					<a
						href="<?php echo esc_url(get_term_link($category)); ?>"
						class="group min-h-[190px] rounded-[28px] p-5 transition hover:-translate-y-1"
						style="background-color: <?php echo esc_attr($card_color); ?>;"
					>
						<div class="flex h-full flex-col justify-between">

							<div>
								<h3 class="text-xl font-bold tracking-tight text-black">
									<?php echo esc_html($category->name); ?>
								</h3>

								<?php if ($description) : ?>
									<p class="mt-3 text-sm leading-6 text-neutral-700">
										<?php echo esc_html($description); ?>
									</p>
								<?php endif; ?>
							</div>

							<div class="mt-6 flex items-center justify-between">
								<span class="text-sm font-medium text-neutral-700">
									0/<?php echo esc_html($category->count); ?>
								</span>

								<span class="flex h-9 w-9 items-center justify-center rounded-full bg-white text-black transition group-hover:translate-x-1">
									→
								</span>
							</div>

						</div>
					</a>

				<?php endforeach; ?>

			<?php else : ?>

				<p>No tutorial categories found.</p>

			<?php endif; ?>

		</div>

	</div>
</section>
<?php
/**
 * Title: Tutorials Template Showcase
 * Slug: custom-theme/tutorials-template-showcase
 * Categories: desyne
 */

$templates = new WP_Query([
	'post_type'      => 'desyne_template',
	'posts_per_page' => 8,
	'orderby'        => 'date',
	'order'          => 'DESC',
]);
?>

<section class="pb-28">
	<div class="mx-auto max-w-7xl px-6">

		<div class="mb-8 text-center">
			<h2 class="mx-auto max-w-3xl text-4xl font-bold tracking-tight text-black md:text-5xl">
				Highlight what's remarkable about your business
			</h2>
		</div>

		<div class="mb-8 flex justify-center gap-3">
			<span class="rounded-full bg-black px-5 py-2 text-sm font-semibold text-white">Social Media</span>
			<span class="rounded-full bg-neutral-100 px-5 py-2 text-sm font-semibold text-black">Marketing</span>
			<span class="rounded-full bg-neutral-100 px-5 py-2 text-sm font-semibold text-black">Online Ads</span>
		</div>

		<div class="flex gap-5 overflow-x-auto pb-2">

			<?php if ($templates->have_posts()) : ?>

				<?php while ($templates->have_posts()) : $templates->the_post(); ?>

					<?php $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>

					<a
						href="<?php echo esc_url(get_permalink()); ?>"
						class="block min-w-[240px] overflow-hidden rounded-[28px] bg-neutral-100"
					>
						<?php if ($thumbnail) : ?>
							<img
								src="<?php echo esc_url($thumbnail); ?>"
								alt="<?php echo esc_attr(get_the_title()); ?>"
								class="h-[320px] w-full object-cover"
							/>
						<?php endif; ?>
					</a>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>

				<p>No templates found.</p>

			<?php endif; ?>

		</div>

	</div>
</section>
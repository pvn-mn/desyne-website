<?php
/**
 * Title: Tutorials Format Row
 * Slug: custom-theme/tutorials-format-row
 * Categories: desyne
 */

$formats = [
	'A4',
	'Banner',
	'Logo',
	'Twitter Header',
	'Instagram Story',
	'Business Card',
	'Poster',
	'Flyer',
];
?>

<section class="pb-24">
	<div class="mx-auto max-w-7xl px-6">

		<div class="mb-8 flex items-center justify-between gap-6">
			<h2 class="text-3xl font-bold tracking-tight text-black">
				Design your story for
			</h2>

			<a href="<?php echo esc_url(home_url('/templates/')); ?>" class="text-sm font-semibold text-black">
				Show more →
			</a>
		</div>

		<div class="flex gap-4 overflow-x-auto pb-2">

			<?php foreach ($formats as $format) : ?>

				<a
					href="<?php echo esc_url(home_url('/templates/')); ?>"
					class="flex min-w-[140px] flex-col items-center justify-center rounded-[24px] border border-neutral-200 bg-white px-5 py-6 text-center"
				>
					<div class="mb-4 h-12 w-12 rounded-2xl bg-neutral-100"></div>

					<span class="text-sm font-semibold text-black">
						<?php echo esc_html($format); ?>
					</span>
				</a>

			<?php endforeach; ?>

		</div>

	</div>
</section>
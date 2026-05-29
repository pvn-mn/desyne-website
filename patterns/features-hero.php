<?php
/**
 * Title: Features Hero
 * Slug: custom-theme/features-hero
 * Categories: desyne
 */

$page_id = get_queried_object_id();

$label = get_field('hero_label', $page_id);
$heading = get_field('hero_heading', $page_id);
$subheading = get_field('hero_subheading', $page_id);
$primary_text = get_field('hero_primary_button_text', $page_id);
$primary_url = get_field('hero_primary_button_url', $page_id);
$secondary_text = get_field('hero_secondary_button_text', $page_id);
$secondary_url = get_field('hero_secondary_button_url', $page_id);
$hero_image = get_field('hero_image', $page_id);
?>

<section class="mx-auto max-w-6xl px-6 pb-16 pt-20 text-center">

	<?php if ($label) : ?>
		<p class="mb-5 text-sm font-semibold text-neutral-500">
			<?php echo esc_html($label); ?>
		</p>
	<?php endif; ?>

	<h1 class="mx-auto max-w-4xl text-5xl font-black leading-none tracking-tight text-black md:text-7xl lg:text-8xl">
		<?php echo esc_html($heading ?: 'Powerful features for modern creators.'); ?>
	</h1>

	<?php if ($subheading) : ?>
		<p class="mx-auto mt-7 max-w-2xl text-base leading-7 text-neutral-600 md:text-lg">
			<?php echo esc_html($subheading); ?>
		</p>
	<?php endif; ?>

	<div class="mt-9 flex flex-wrap items-center justify-center gap-4">

		<?php if ($primary_text) : ?>
			<a
				href="<?php echo esc_url($primary_url ?: '#'); ?>"
				class="rounded-md bg-[#ccefeb] px-7 py-3 text-sm font-bold text-black"
			>
				<?php echo esc_html($primary_text); ?>
			</a>
		<?php endif; ?>

		<?php if ($secondary_text) : ?>
			<a
				href="<?php echo esc_url($secondary_url ?: '#'); ?>"
				class="rounded-md border border-black bg-white px-7 py-3 text-sm font-bold text-black"
			>
				<?php echo esc_html($secondary_text); ?>
			</a>
		<?php endif; ?>

	</div>

</section>
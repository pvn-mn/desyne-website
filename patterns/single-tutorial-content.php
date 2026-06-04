<?php
/**
 * Title: Single Tutorial Content
 * Slug: custom-theme/single-tutorial-content
 * Categories: desyne
 */

$youtube_url = get_field('youtube_url');
$duration = get_field('duration');
$views = get_field('view_count');
$terms = get_the_terms(get_the_ID(), 'tutorial_category');
$category_name = $terms && !is_wp_error($terms) ? $terms[0]->name : 'Tutorial';

$content = apply_filters('the_content', get_the_content());

preg_match_all('/<h2[^>]*>(.*?)<\/h2>/i', $content, $matches);

$toc_items = [];

if (!empty($matches[1])) {
	foreach ($matches[1] as $index => $heading) {
		$clean_heading = wp_strip_all_tags($heading);
		$id = sanitize_title($clean_heading);

		$toc_items[] = [
			'id' => $id,
			'title' => $clean_heading,
		];

		$content = preg_replace(
			'/<h2([^>]*)>' . preg_quote($heading, '/') . '<\/h2>/i',
			'<h2$1 id="' . esc_attr($id) . '">' . $heading . '</h2>',
			$content,
			1
		);
	}
}

function desyne_get_youtube_embed_url($url) {
	if (!$url) {
		return '';
	}

	preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\?\/]+)/', $url, $matches);

	if (empty($matches[1])) {
		return '';
	}

	return 'https://www.youtube.com/embed/' . esc_attr($matches[1]);
}

$youtube_embed_url = desyne_get_youtube_embed_url($youtube_url);
?>

<section class="py-12 md:py-16">

	<div class="mx-auto max-w-7xl px-6">

		<nav class="mb-8 text-sm text-neutral-500">
			<a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-black">Home</a>
			<span class="mx-2">/</span>
			<a href="<?php echo esc_url(home_url('/tutorials/')); ?>" class="hover:text-black">Tutorials</a>
			<span class="mx-2">/</span>
			<span class="text-black"><?php the_title(); ?></span>
		</nav>

		<div class="mx-auto max-w-4xl text-center">

			<div class="mb-5 flex justify-center gap-3 text-sm">
				<span class="rounded-full bg-neutral-100 px-4 py-2 font-semibold text-black">
					<?php echo esc_html($category_name); ?>
				</span>

				<?php if ($duration) : ?>
					<span class="rounded-full bg-neutral-100 px-4 py-2 font-semibold text-black">
						<?php echo esc_html($duration); ?>
					</span>
				<?php endif; ?>

				<?php if ($views) : ?>
					<span class="rounded-full bg-neutral-100 px-4 py-2 font-semibold text-black">
						<?php echo esc_html($views); ?> views
					</span>
				<?php endif; ?>
			</div>

			<h1 class="text-4xl font-bold tracking-tight text-black md:text-6xl">
				<?php the_title(); ?>
			</h1>

			<?php if (has_excerpt()) : ?>
				<p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-neutral-600">
					<?php echo esc_html(get_the_excerpt()); ?>
				</p>
			<?php endif; ?>

		</div>

		<?php if ($youtube_embed_url) : ?>
			<div class="mx-auto mt-12 max-w-5xl overflow-hidden rounded-[32px] bg-black">
				<div class="aspect-video">
					<iframe
						src="<?php echo esc_url($youtube_embed_url); ?>"
						title="<?php echo esc_attr(get_the_title()); ?>"
						class="h-full w-full"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen
					></iframe>
				</div>
			</div>
		<?php endif; ?>

	</div>

</section>

<section class="pb-24">
	<div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-6 lg:grid-cols-[280px_1fr]">

		<?php if (!empty($toc_items)) : ?>

			<aside class="hidden lg:block">
				<div
					x-data="{ active: '' }"
					class="sticky top-28 rounded-[28px] border border-neutral-200 bg-white p-5"
				>
					<p class="mb-4 text-sm font-bold uppercase tracking-wide text-neutral-400">
						On this page
					</p>

					<nav class="space-y-2">
						<?php foreach ($toc_items as $item) : ?>
							<a
								href="#<?php echo esc_attr($item['id']); ?>"
								class="block rounded-xl px-3 py-2 text-sm font-medium text-neutral-600 hover:bg-neutral-100 hover:text-black"
							>
								<?php echo esc_html($item['title']); ?>
							</a>
						<?php endforeach; ?>
					</nav>
				</div>
			</aside>

		<?php endif; ?>

		<article class="tutorial-content max-w-3xl">

			<?php echo $content; ?>

		</article>

	</div>
</section>
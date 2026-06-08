<?php
/**
 * Title: 404 Content
 * Slug: custom-theme/404-content
 * Categories: desyne
 */
?>

<!-- wp:group {"tagName":"main","className":"min-h-[70vh] bg-white"} -->
<main class="wp-block-group min-h-[70vh] bg-white">
	<!-- wp:group {"className":"mx-auto flex max-w-5xl flex-col items-center px-6 py-24 text-center md:py-32"} -->
	<div class="wp-block-group mx-auto flex max-w-5xl flex-col items-center px-6 py-24 text-center md:py-32">

		<!-- wp:paragraph {"className":"mb-4 inline-flex rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700"} -->
		<p class="mb-4 inline-flex rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">404 error</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"className":"max-w-3xl text-4xl font-bold tracking-tight text-slate-950 md:text-6xl"} -->
		<h1 class="wp-block-heading max-w-3xl text-4xl font-bold tracking-tight text-slate-950 md:text-6xl">
			This page seems to have disappeared.
		</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"mt-6 max-w-2xl text-base leading-7 text-slate-600 md:text-lg"} -->
		<p class="mt-6 max-w-2xl text-base leading-7 text-slate-600 md:text-lg">
			The link may be broken, the page may have moved, or the design you were looking for is no longer available.
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row"} -->
		<div class="wp-block-group mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"rounded-full"} -->
				<div class="wp-block-button rounded-full">
					<a class="wp-block-button__link wp-element-button rounded-full bg-slate-950 px-7 py-3 text-white hover:bg-slate-800" href="/">
						Go to homepage
					</a>
				</div>
				<!-- /wp:button -->

            <!-- wp:button {"className":"rounded-full"} -->
				<div class="wp-block-button rounded-full">
					<a class="wp-block-button__link wp-element-button rounded-full bg-slate-950 px-7 py-3 text-white hover:bg-slate-800" href="/templates">
						Browse templates
					</a>
				</div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->
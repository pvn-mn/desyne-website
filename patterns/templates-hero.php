<?php
/**
 * Title: Templates Hero
 * Slug: custom-theme/templates-hero
 * Categories: desyne
 */

$page_id = get_queried_object_id();

$heading = function_exists('get_field')
    ? get_field('templates_hero_heading', $page_id)
    : '';

$placeholder = function_exists('get_field')
    ? get_field('templates_search_placeholder', $page_id)
    : '';

$suggested_terms = get_terms([
    'taxonomy' => 'template_tag',
    'hide_empty' => true,
    'number' => 3,
]);

$heading = $heading ?: 'Find Graphic Design Templates for Every Need';
$placeholder = $placeholder ?: 'Search for posters, flyers, or logo templates...';
?>

<section
    class="bg-white pt-20 pb-10"
    x-data
>
    <div class="mx-auto max-w-5xl px-4 text-center">
        <h1 class="mx-auto max-w-3xl text-4xl font-extrabold leading-tight text-slate-900 md:text-5xl">
            <?php echo esc_html($heading); ?>
        </h1>

        <div class="mx-auto mt-8 max-w-2xl">
            <label class="relative block">
                <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400">
                    🔍
                </span>

                <input
                    type="search"
                    placeholder="<?php echo esc_attr($placeholder); ?>"
                    class="w-full rounded-full border border-slate-200 bg-white py-4 pl-12 pr-5 text-sm shadow-md outline-none transition focus:border-teal-300 focus:ring-2 focus:ring-teal-100"
                    x-model="$store.templates.search"
                />
            </label>
        </div>

        <?php if (!empty($suggested_terms) && !is_wp_error($suggested_terms)) : ?>
            <div class="mt-4 flex flex-wrap items-center justify-center gap-3 text-xs">
                <span class="text-slate-500">Try:</span>

                <?php foreach ($suggested_terms as $term) : ?>
                    <button
                        type="button"
                        class="rounded-full bg-teal-100 px-5 py-1.5 font-semibold text-teal-900 transition hover:bg-teal-200"
                        x-on:click="$store.templates.tag = '<?php echo esc_js($term->slug); ?>'"
                    >
                        <?php echo esc_html($term->name); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
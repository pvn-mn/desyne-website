<?php
/**
 * Title: Templates Browser
 * Slug: custom-theme/templates-browser
 * Categories: desyne
 */

$types = get_terms([
    'taxonomy' => 'template_type',
    'hide_empty' => true,
]);

$tags = get_terms([
    'taxonomy' => 'template_tag',
    'hide_empty' => true,
]);

$template_query = new WP_Query([
    'post_type' => 'desyne_template',
    'post_status' => 'publish',
    'posts_per_page' => 24,
    'orderby' => 'date',
    'order' => 'DESC',
]);

$total_templates = wp_count_posts('desyne_template')->publish ?? 0;
?>

<section
    class="bg-white pb-24"
    x-data
    x-init="
        if (!$store.templates) {
            Alpine.store('templates', {
                search: '',
                type: 'all',
                tag: 'all',
                sidebarOpen: false
            })
        }
    "
>
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 md:grid-cols-[220px_1fr]">

        <aside class="border-r border-slate-200 pr-4">
            <div class="mb-6 flex items-start justify-between md:block">
                <div>
                    <h2 class="text-sm font-semibold text-slate-900">Browse by category</h2>
                    <p class="mt-1 text-xs text-slate-500">
                        <?php echo esc_html(number_format_i18n($total_templates)); ?> items
                    </p>
                </div>

                <button
                    type="button"
                    class="rounded-md border px-3 py-1 text-xs md:hidden"
                    x-on:click="$store.templates.sidebarOpen = !$store.templates.sidebarOpen"
                >
                    Filter
                </button>
            </div>

            <nav
                class="space-y-1"
                x-bind:class="$store.templates.sidebarOpen ? 'block' : 'hidden md:block'"
            >
                <button
                    type="button"
                    class="block w-full rounded-md px-4 py-2 text-left text-sm transition"
                    x-bind:class="$store.templates.type === 'all' ? 'bg-green-100 text-green-800 font-semibold' : 'text-slate-700 hover:bg-slate-100'"
                    x-on:click="$store.templates.type = 'all'"
                >
                    All Templates
                </button>

                <?php if (!empty($types) && !is_wp_error($types)) : ?>
                    <?php foreach ($types as $type) : ?>
                        <button
                            type="button"
                            class="block w-full rounded-md px-4 py-2 text-left text-sm transition"
                            x-bind:class="$store.templates.type === '<?php echo esc_js($type->slug); ?>' ? 'bg-green-100 text-green-800 font-semibold' : 'text-slate-700 hover:bg-slate-100'"
                            x-on:click="$store.templates.type = '<?php echo esc_js($type->slug); ?>'"
                        >
                            <?php echo esc_html($type->name); ?>
                        </button>
                    <?php endforeach; ?>
                <?php endif; ?>
            </nav>
        </aside>

        <div>
            <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
                <h2 class="text-sm font-bold text-slate-900">All Templates</h2>

                <div class="rounded-md border border-slate-200 px-4 py-2 text-xs text-slate-500">
                    1-<?php echo esc_html(min(24, (int) $total_templates)); ?>
                    of <?php echo esc_html(number_format_i18n($total_templates)); ?>
                </div>
            </div>

            <div class="mb-8 flex gap-3 overflow-x-auto pb-2">
                <button
                    type="button"
                    class="shrink-0 rounded-full px-5 py-2 text-xs font-semibold transition"
                    x-bind:class="$store.templates.tag === 'all' ? 'bg-green-600 text-white' : 'bg-slate-100 text-slate-800 hover:bg-slate-200'"
                    x-on:click="$store.templates.tag = 'all'"
                >
                    All
                </button>

                <?php if (!empty($tags) && !is_wp_error($tags)) : ?>
                    <?php foreach ($tags as $tag) : ?>
                        <button
                            type="button"
                            class="shrink-0 rounded-full px-5 py-2 text-xs font-semibold transition"
                            x-bind:class="$store.templates.tag === '<?php echo esc_js($tag->slug); ?>' ? 'bg-green-600 text-white' : 'bg-slate-100 text-slate-800 hover:bg-slate-200'"
                            x-on:click="$store.templates.tag = '<?php echo esc_js($tag->slug); ?>'"
                        >
                            <?php echo esc_html($tag->name); ?>
                        </button>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if ($template_query->have_posts()) : ?>
                <div class="grid grid-cols-2 gap-x-6 gap-y-9 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                    <?php while ($template_query->have_posts()) : $template_query->the_post(); ?>
                        <?php
                        $post_id = get_the_ID();

                        $type_terms = get_the_terms($post_id, 'template_type');
                        $tag_terms = get_the_terms($post_id, 'template_tag');

                        $type_slugs = !empty($type_terms) && !is_wp_error($type_terms)
                            ? wp_list_pluck($type_terms, 'slug')
                            : [];

                        $tag_slugs = !empty($tag_terms) && !is_wp_error($tag_terms)
                            ? wp_list_pluck($tag_terms, 'slug')
                            : [];

                        $label = !empty($type_terms) && !is_wp_error($type_terms)
                            ? $type_terms[0]->name
                            : get_the_title();
                        ?>

                        <article
                            class="group"
                            data-title="<?php echo esc_attr(strtolower(get_the_title())); ?>"
                            data-types="<?php echo esc_attr(implode(' ', $type_slugs)); ?>"
                            data-tags="<?php echo esc_attr(implode(' ', $tag_slugs)); ?>"
                            x-show="
                                (
                                    !$store.templates.search ||
                                    $el.dataset.title.includes($store.templates.search.toLowerCase())
                                ) &&
                                (
                                    $store.templates.type === 'all' ||
                                    $el.dataset.types.includes($store.templates.type)
                                ) &&
                                (
                                    $store.templates.tag === 'all' ||
                                    $el.dataset.tags.includes($store.templates.tag)
                                )
                            "
                        >
                            <a href="<?php the_permalink(); ?>" class="block">
                                <div class="aspect-[4/5] overflow-hidden rounded-lg bg-slate-100">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large', [
                                            'class' => 'h-full w-full object-cover transition duration-300 group-hover:scale-105',
                                            'loading' => 'lazy',
                                        ]); ?>
                                    <?php else : ?>
                                        <div class="flex h-full w-full items-center justify-center text-xs text-slate-400">
                                            No image
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <h3 class="mt-3 text-center text-sm font-medium text-slate-950">
                                    <?php echo esc_html($label); ?>
                                </h3>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="rounded-xl border border-dashed border-slate-300 p-10 text-center text-sm text-slate-500">
                    No templates found. Add entries under Templates.
                </div>
            <?php endif; ?>

            <div class="mt-16 flex items-center justify-center">
                <a
                    href="<?php echo esc_url(get_post_type_archive_link('desyne_template') ?: '#'); ?>"
                    class="rounded-md border border-teal-500 px-12 py-3 text-sm font-semibold text-teal-600 transition hover:bg-teal-50"
                >
                    Next
                </a>
            </div>
        </div>
    </div>
</section>
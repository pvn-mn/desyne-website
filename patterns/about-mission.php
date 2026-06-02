<?php
/**
 * Title: About Mission
 * Slug: custom-theme/about-mission
 * Categories: desyne
 */

$page_id = get_queried_object_id();

$mission = get_field('mission_statement', $page_id);
?>

<section class="m-0 bg-[#dff1ee] py-24">
    
    <div class="mx-auto max-w-5xl px-6 text-center">

        <p class="text-4xl font-medium leading-tight tracking-tight text-black md:text-6xl">
            <?php echo esc_html($mission); ?>
        </p>

    </div>

</section>
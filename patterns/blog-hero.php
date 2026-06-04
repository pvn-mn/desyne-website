<?php
/**
 * Title: Blog Hero
 * Slug: desyne/blog-hero
 * Categories: desyne
 */
?>

<section class="relative overflow-hidden bg-white py-20 lg:py-28">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-2 lg:px-8">
        <div>
            <span class="mb-6 inline-flex rounded-full bg-[#F3F0FF] px-4 py-2 text-sm font-medium text-[#6C4DFF]">
                Blog
            </span>

            <h1 class="max-w-xl text-5xl font-semibold tracking-tight text-[#171717] md:text-6xl lg:text-7xl">
                Stories, Tips, and Insights
            </h1>

            <p class="mt-6 max-w-lg text-lg leading-8 text-[#6B7280]">
                Discover design inspiration, productivity tips, and the latest updates from Desyne.
            </p>

            <form class="mt-8 flex max-w-md gap-3 rounded-full bg-[#F5F5F5] p-2">
                <input
                    type="email"
                    placeholder="Enter your email"
                    class="min-w-0 flex-1 bg-transparent px-5 text-sm outline-none placeholder:text-[#9CA3AF]"
                />

                <button
                    type="submit"
                    class="rounded-full bg-[#171717] px-6 py-3 text-sm font-medium text-white"
                >
                    Subscribe
                </button>
            </form>
        </div>

        <div class="relative min-h-[420px]">
            <div class="absolute left-8 top-0 h-56 w-44 overflow-hidden rounded-[2rem] bg-[#F4F4F5] shadow-sm md:h-64 md:w-52"></div>
            <div class="absolute right-10 top-10 h-72 w-56 overflow-hidden rounded-[2rem] bg-[#EDE9FE] shadow-sm md:h-80 md:w-64"></div>
            <div class="absolute bottom-0 left-28 h-64 w-52 overflow-hidden rounded-[2rem] bg-[#FCE7F3] shadow-sm md:h-72 md:w-60"></div>
        </div>
    </div>
</section>
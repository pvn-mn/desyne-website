<?php
/**
 * Title: Login Page
 * Slug: custom-theme/login-page
 * Categories: desyne
 */
?>

<section class="min-h-screen bg-white">
  <div class="grid min-h-screen lg:grid-cols-[32%_68%]">
    <div class="flex flex-col justify-center bg-[#F8F8F8] px-8 py-12 md:px-12 lg:px-16">
      <div class="mb-12 flex items-center gap-3">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#6B5AED] text-xl font-bold text-white">D</div>
        <span class="text-2xl font-bold text-neutral-950">Desyne</span>
      </div>

      <div class="max-w-sm">
        <h1 class="text-4xl font-bold leading-tight tracking-tight text-neutral-950 md:text-5xl">Design it your way</h1>
        <ul class="mt-10 space-y-5 text-sm leading-6 text-neutral-700">
          <li class="flex gap-3"><span class="font-bold text-neutral-950">✓</span><span>6000+ professionally designed templates</span></li>
          <li class="flex gap-3"><span class="font-bold text-neutral-950">✓</span><span>Posters & Flyers in one click</span></li>
          <li class="flex gap-3"><span class="font-bold text-neutral-950">✓</span><span>Brand Kits with your own colors, logos, and fonts</span></li>
          <li class="flex gap-3"><span class="font-bold text-neutral-950">✓</span><span>Background remover and sticker maker</span></li>
          <li class="flex gap-3"><span class="font-bold text-neutral-950">✓</span><span>Free fonts, backgrounds and objects</span></li>
        </ul>
      </div>
    </div>

    <div class="relative overflow-hidden bg-neutral-900">
      <div class="absolute inset-0 bg-black/55"></div>

      <div class="relative flex min-h-screen items-center justify-center px-6">
        <div class="w-full max-w-md rounded-3xl border border-white/10 bg-black/60 p-8 text-white backdrop-blur-md md:p-10">
          <h2 class="text-center text-3xl font-bold">Log in or sign up<br>in seconds</h2>

          <p class="mt-3 text-center text-sm text-white/70">
            Use your email or another service to continue with Desyne.
          </p>

          <div class="mt-8 space-y-3">
            <button type="button" class="flex w-full items-center justify-center rounded-xl border border-white/20 px-4 py-3 text-sm font-medium transition hover:bg-white/10">Continue with Google</button>
            <button type="button" class="flex w-full items-center justify-center rounded-xl border border-white/20 px-4 py-3 text-sm font-medium transition hover:bg-white/10">Continue with Facebook</button>
            <button type="button" class="flex w-full items-center justify-center rounded-xl border border-white/20 px-4 py-3 text-sm font-medium transition hover:bg-white/10">Continue with Email</button>
          </div>

          <div class="mt-6 text-center">
            <button type="button" class="text-sm text-white/80 underline underline-offset-4">Continue another way</button>
          </div>

          <p class="mt-8 text-center text-xs leading-5 text-white/50">
            By continuing, you agree to Desyne's <a href="#" class="underline">Terms of Use</a>
            and acknowledge you've read our <a href="#" class="underline">Privacy Policy</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

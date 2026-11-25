<?php
/**
 * Template Name: پرداخت
 * قالب اختصاصی صفحه پرداخت و تسویه‌حساب — استودیوی فناوری هایتک
 */
get_header();
?>

<main class="flex-grow py-12 lg:py-16">
  <div class="max-w-5xl mx-auto px-4 sm:px-6">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
    ?>
      <section class="rounded-3xl bg-white/[0.02] border border-cyberGold-400/25 p-6 sm:p-10 space-y-8">

        <header class="pb-6 border-b border-white/[0.08] flex flex-col sm:flex-row sm:items-center justify-between gap-4">
          <div>
            <span class="text-xs font-mono uppercase tracking-widest text-cyberCyan-400 block mb-2">SECURE CHECKOUT // HIITECH</span>
            <h1 class="text-2xl sm:text-3xl font-black text-white">
              <?php the_title(); ?>
            </h1>
          </div>
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-400/30 text-xs text-emerald-300 self-start sm:self-auto">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span>اتصال امن و رمزنگاری‌شده</span>
          </div>
        </header>

        <div class="payment-main text-slate-200 text-sm sm:text-base leading-7">
          <?php the_content(); ?>
        </div>

      </section>
    <?php
        endwhile;
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>

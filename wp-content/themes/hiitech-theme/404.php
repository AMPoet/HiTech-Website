<?php
/**
 * صفحه خطای ۴۰۴ — قالب استودیوی فناوری هایتک (HiiTECH Studio)
 */
get_header();
?>

<main class="flex-grow py-16 lg:py-24">
  <div class="max-w-4xl mx-auto px-4 sm:px-6">
    <div class="tilt-card-container">
      <article class="tilt-card card-featured-gold p-8 sm:p-12 text-center" data-tilt>
        <div class="tilt-glare"></div>
        <div class="tilt-content flex flex-col items-center">

          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cyberCyan-500/[0.08] border border-cyberCyan-400/25 mb-6">
            <span class="w-2 h-2 rounded-full bg-cyberGold-400 animate-ping"></span>
            <span class="text-xs font-mono tracking-widest text-cyberCyan-300">ERROR 404 // NOT FOUND</span>
          </div>

          <?php
          $img_404_path = get_template_directory() . '/404.png';
          if ( file_exists( $img_404_path ) ) :
          ?>
            <img
              src="<?php echo esc_url( get_template_directory_uri() . '/404.png' ); ?>"
              alt="صفحه مورد نظر یافت نشد"
              width="640"
              height="358"
              class="w-full max-w-md h-auto mx-auto mb-8 rounded-2xl border border-white/10"
            />
          <?php else : ?>
            <div class="cyber-h1-gradient text-7xl sm:text-8xl font-black font-mono tracking-tight mb-4">404</div>
          <?php endif; ?>

          <h1 class="text-2xl sm:text-4xl font-black text-white mb-4">
            محتوای مورد نظر یافت نشد!
          </h1>
          <p class="text-sm sm:text-base text-slate-300/85 max-w-lg leading-7 mb-8">
            صفحه‌ای که به دنبال آن هستید ممکن است حذف شده، آدرس آن تغییر کرده یا موقتاً در دسترس نباشد. می‌توانید از فرم جستجو استفاده کنید یا به صفحه اصلی هایتک بازگردید.
          </p>

          <!-- فرم جستجوی سریع -->
          <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="w-full max-w-md flex items-center gap-2 mb-8">
            <input
              type="search"
              name="s"
              value="<?php echo esc_attr( get_search_query() ); ?>"
              placeholder="جستجو در سایت هایتک..."
              class="flex-1 px-4 py-3 rounded-full bg-obsidian-950/90 border border-white/10 text-xs sm:text-sm text-white placeholder-slate-400 focus:outline-none focus:border-cyberGold-400"
            />
            <button type="submit" class="btn-cyber-glass px-5 py-3 rounded-full text-xs sm:text-sm font-semibold shrink-0">
              جستجو
            </button>
          </form>

          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-cyber-gold px-8 py-3.5 rounded-full text-sm inline-flex items-center gap-2">
            <span>بازگشت به صفحه نخست</span>
            <span>←</span>
          </a>

        </div>
      </article>
    </div>
  </div>
</main>

<?php get_footer(); ?>

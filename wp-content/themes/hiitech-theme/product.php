<?php
/**
 * Template Name: قالب محصول صفحه اصلی
 * کارت نمایش محصول با استایل سه‌بعدی هایتک
 */
?>
<div class="tilt-card-container h-full">
  <article <?php post_class( 'tilt-card p-5 sm:p-6 h-full flex flex-col justify-between group' ); ?> data-tilt>
    <div class="tilt-glare"></div>

    <a href="<?php the_permalink(); ?>" class="tilt-content flex flex-col h-full justify-between">
      <div>
        <figure class="mb-5 rounded-2xl overflow-hidden border border-white/10 bg-obsidian-950 aspect-[4/3] flex items-center justify-center">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'indexp', array( 'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105' ) ); ?>
          <?php else : ?>
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-900 to-[#06090e] text-slate-600">
              <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
              </svg>
            </div>
          <?php endif; ?>
        </figure>

        <h3 class="text-base sm:text-lg font-extrabold text-white group-hover:text-cyberGold-400 leading-snug mb-4 transition-colors">
          <?php the_title(); ?>
        </h3>
      </div>

      <div class="pt-4 border-t border-white/[0.07] flex items-center justify-between gap-3">
        <div class="text-sm sm:text-base font-bold text-cyberGold-400">
          <?php
          if ( function_exists( 'woocommerce_template_loop_price' ) ) {
              woocommerce_template_loop_price();
          } else {
              echo '<span class="text-xs text-slate-400">مشاهده جزئیات</span>';
          }
          ?>
        </div>

        <span class="w-10 h-10 rounded-xl bg-cyberCyan-500/15 border border-cyberCyan-400/30 text-cyberCyan-300 group-hover:bg-cyberGold-400 group-hover:text-obsidian-950 group-hover:border-cyberGold-400 flex items-center justify-center transition-all shrink-0" aria-label="مشاهده محصول">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </span>
      </div>
    </a>
  </article>
</div>

<?php
/**
 * Template Name: قالب نوشته صفحه اصلی
 * کارت نمایش مقاله با استایل سه‌بعدی هایتک
 */
$categories = get_the_category();
$cat_name   = ! empty( $categories ) ? $categories[0]->name : 'وبلاگ هایتک';
?>
<div class="tilt-card-container h-full">
  <article <?php post_class( 'tilt-card p-6 sm:p-7 h-full flex flex-col justify-between group' ); ?> data-tilt>
    <div class="tilt-glare"></div>

    <a href="<?php the_permalink(); ?>" class="tilt-content flex flex-col h-full justify-between">
      <div>
        <?php if ( has_post_thumbnail() ) : ?>
          <figure class="mb-5 rounded-2xl overflow-hidden border border-white/10 bg-obsidian-950 h-48">
            <?php the_post_thumbnail( 'indexa', array( 'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105' ) ); ?>
          </figure>
        <?php endif; ?>

        <div class="flex items-center justify-between gap-2 mb-3">
          <span class="text-[11px] font-semibold text-cyberCyan-300 bg-cyberCyan-500/10 border border-cyberCyan-400/25 px-3 py-1 rounded-full">
            <?php echo esc_html( $cat_name ); ?>
          </span>
          <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="text-[11px] text-slate-400">
            <?php echo esc_html( get_the_date() ); ?>
          </time>
        </div>

        <h3 class="text-lg sm:text-xl font-extrabold text-white group-hover:text-cyberGold-400 leading-snug mb-3 transition-colors">
          <?php the_title(); ?>
        </h3>

        <p class="text-xs sm:text-sm text-slate-300/85 leading-7 mb-5">
          <?php echo esc_html( wp_trim_words( get_the_excerpt(), 24, ' ...' ) ); ?>
        </p>
      </div>

      <div class="pt-4 border-t border-white/[0.07] flex items-center justify-between">
        <span class="text-xs sm:text-sm font-bold text-cyberGold-400 group-hover:text-cyberGold-300 inline-flex items-center gap-1.5 transition">
          <span>ادامه مطلب</span>
          <span>←</span>
        </span>
        <span class="text-[11px] text-slate-500 font-mono">HIITECH</span>
      </div>
    </a>
  </article>
</div>

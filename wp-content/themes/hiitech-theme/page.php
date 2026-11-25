<?php
/**
 * قالب نمایش برگه‌های ثابت (Page) — استودیوی فناوری هایتک
 */
get_header();
?>

<main class="flex-grow py-12 lg:py-16">
  <div class="max-w-4xl mx-auto px-4 sm:px-6">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            if ( function_exists( 'hiitech_set_post_views' ) ) {
                hiitech_set_post_views( get_the_ID() );
            }
            $page_url   = urlencode( get_permalink() );
            $page_title = urlencode( get_the_title() );
    ?>
      <article <?php post_class( 'rounded-3xl bg-white/[0.02] border border-white/[0.08] p-6 sm:p-10 space-y-8' ); ?>>

        <div>
          <?php hiitech_breadcrumbs(); ?>
        </div>

        <header class="space-y-4">
          <h1 class="text-2xl sm:text-4xl font-black text-white leading-tight">
            <?php the_title(); ?>
          </h1>

          <?php if ( has_excerpt() ) : ?>
            <div class="p-4 sm:p-5 rounded-2xl bg-cyberGold-400/[0.06] border border-cyberGold-400/25 text-xs sm:text-sm text-slate-200 leading-7">
              <strong class="text-cyberGold-400 ml-1">چکیده:</strong>
              <?php echo esc_html( wp_trim_words( get_the_excerpt(), 40, ' ...' ) ); ?>
            </div>
          <?php endif; ?>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
          <figure class="rounded-2xl overflow-hidden border border-white/10 bg-obsidian-950">
            <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto object-cover' ) ); ?>
          </figure>
        <?php endif; ?>

        <!-- اشتراک‌گذاری -->
        <div class="flex flex-wrap items-center justify-between gap-3 py-3.5 px-4 rounded-2xl bg-obsidian-950/80 border border-white/[0.07]">
          <span class="text-xs font-semibold text-slate-300">اشتراک‌گذاری این صفحه:</span>
          <div class="flex items-center gap-2">
            <a href="https://t.me/share/url?url=<?php echo $page_url; ?>&text=<?php echo $page_title; ?>" rel="nofollow noopener" target="_blank" class="px-3 py-1.5 rounded-xl bg-white/[0.04] hover:bg-cyberCyan-500/20 border border-white/10 text-xs text-slate-200 hover:text-cyberCyan-300 transition">تلگرام</a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $page_url; ?>" rel="nofollow noopener" target="_blank" class="px-3 py-1.5 rounded-xl bg-white/[0.04] hover:bg-cyberCyan-500/20 border border-white/10 text-xs text-slate-200 hover:text-cyberCyan-300 transition">لینکدین</a>
            <a href="https://twitter.com/intent/tweet?url=<?php echo $page_url; ?>&text=<?php echo $page_title; ?>" rel="nofollow noopener" target="_blank" class="px-3 py-1.5 rounded-xl bg-white/[0.04] hover:bg-cyberCyan-500/20 border border-white/10 text-xs text-slate-200 hover:text-cyberCyan-300 transition">ایکس (توییتر)</a>
          </div>
        </div>

        <div id="matn-single" class="text-slate-200 text-sm sm:text-base leading-8 space-y-5 [&>h2]:text-xl [&>h2]:font-extrabold [&>h2]:text-white [&>h2]:pt-3 [&>h3]:text-lg [&>h3]:font-bold [&>h3]:text-cyberGold-300 [&_a]:text-cyberCyan-400 [&_a:hover]:underline">
          <?php the_content(); ?>
        </div>

      </article>
    <?php
        endwhile;
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>

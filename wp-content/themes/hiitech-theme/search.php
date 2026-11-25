<?php
/**
 * صفحه نمایش نتایج جستجو — قالب هایتک
 */
get_header();
?>

<main class="flex-grow py-12 lg:py-16">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 space-y-10">

    <!-- هدر جستجو -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-6 border-b border-white/[0.07]">
      <div>
        <span class="text-xs font-semibold text-cyberCyan-400 block mb-2">نتایج جستجو در سایت هایتک</span>
        <h1 class="text-2xl sm:text-4xl font-black text-white">
          جستجو برای: <span class="text-cyberGold-400">«<?php echo esc_html( get_search_query() ); ?>»</span>
        </h1>
      </div>

      <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="w-full md:w-80 flex items-center gap-2">
        <input
          type="search"
          name="s"
          value="<?php echo esc_attr( get_search_query() ); ?>"
          placeholder="جستجوی مجدد..."
          class="flex-1 px-4 py-2.5 rounded-full bg-white/[0.04] border border-white/10 text-xs sm:text-sm text-white placeholder-slate-400 focus:outline-none focus:border-cyberGold-400"
        />
        <button type="submit" class="btn-cyber-gold px-5 py-2.5 rounded-full text-xs font-bold shrink-0">
          بگرد
        </button>
      </form>
    </div>

    <!-- نتایج -->
    <?php if ( have_posts() ) : ?>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        while ( have_posts() ) :
            the_post();
            if ( 'product' === get_post_type() ) {
                get_template_part( 'product' );
            } else {
                get_template_part( 'post' );
            }
        endwhile;
        ?>
      </div>

      <div class="pt-4">
        <?php hiitech_pagination(); ?>
      </div>
    <?php else : ?>
      <article class="p-10 sm:p-14 rounded-3xl bg-white/[0.02] border border-white/10 text-center space-y-5">
        <h2 class="text-xl sm:text-2xl font-extrabold text-white">محتوای مورد نظر یافت نشد!</h2>
        <p class="text-xs sm:text-sm text-slate-400 max-w-md mx-auto leading-7">
          نتیجه‌ای برای عبارت واردشده پیدا نشد. لطفاً کلیدواژه دیگری را امتحان کنید یا به صفحه اصلی بازگردید.
        </p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-cyber-gold px-7 py-3 rounded-full text-xs sm:text-sm inline-block">
          بازگشت به صفحه نخست
        </a>
      </article>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>

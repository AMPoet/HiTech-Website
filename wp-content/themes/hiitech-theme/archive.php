<?php
/**
 * Template Name: بایگانی نوشته‌ها
 * صفحه دسته‌بندی‌ها، برچسب‌ها و آرشیو مقالات هایتک
 */
get_header();
?>

<main class="flex-grow py-12 lg:py-16">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 space-y-10">

    <!-- هدر بایگانی نوشته‌ها -->
    <div class="pb-6 border-b border-white/[0.07]">
      <div class="mb-3">
        <?php hiitech_breadcrumbs(); ?>
      </div>
      <span class="text-xs font-semibold text-cyberGold-400 block mb-2">آرشیو مقالات و یادداشت‌های هایتک</span>
      <h1 class="text-3xl sm:text-4xl font-black text-white">
        <?php
        if ( is_category() || is_tag() ) {
            single_term_title( '', true );
        } else {
            the_archive_title();
        }
        ?>
      </h1>
    </div>

    <!-- گرید نوشته‌ها -->
    <?php if ( have_posts() ) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        while ( have_posts() ) :
            the_post();
            get_template_part( 'post' );
        endwhile;
        ?>
      </div>

      <!-- صفحه‌بندی -->
      <div class="pt-4">
        <?php hiitech_pagination(); ?>
      </div>
    <?php else : ?>
      <div class="p-10 rounded-3xl bg-white/[0.02] border border-white/10 text-center space-y-4">
        <p class="text-slate-300 text-sm sm:text-base">نوشته‌ای در این بخش ثبت نشده است.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-cyber-gold px-6 py-2.5 rounded-full text-xs sm:text-sm inline-block">
          بازگشت به صفحه اصلی
        </a>
      </div>
    <?php endif; ?>

    <!-- توضیحات دسته‌بندی -->
    <?php if ( get_the_archive_description() ) : ?>
      <section class="p-6 sm:p-8 rounded-3xl bg-white/[0.02] border border-white/[0.08] text-sm text-slate-300 leading-8">
        <?php the_archive_description( '<div id="matn-single" class="space-y-4">', '</div>' ); ?>
      </section>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>

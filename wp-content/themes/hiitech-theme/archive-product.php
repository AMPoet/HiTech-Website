<?php
/**
 * Template Name: بایگانی محصولات
 * صفحه فروشگاه و دسته‌بندی محصولات در قالب هایتک
 */
get_header();
?>

<main class="flex-grow py-12 lg:py-16">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 space-y-10">

    <!-- هدر بایگانی محصولات -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-6 border-b border-white/[0.07]">
      <div>
        <div class="mb-3">
          <?php hiitech_breadcrumbs(); ?>
        </div>
        <span class="text-xs font-semibold text-cyberCyan-400 block mb-2">فروشگاه و محصولات دیجیتال</span>
        <h1 class="text-3xl sm:text-4xl font-black text-white">
          <?php
          if ( function_exists( 'is_product_category' ) && is_product_category() ) {
              single_cat_title( 'محصولات ', true );
          } else {
              echo esc_html( post_type_archive_title( '', false ) ?: 'فروشگاه هایتک' );
          }
          ?>
        </h1>
      </div>
    </div>

    <!-- گرید محصولات -->
    <?php if ( have_posts() ) : ?>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        while ( have_posts() ) :
            the_post();
            get_template_part( 'product' );
        endwhile;
        ?>
      </div>

      <!-- صفحه‌بندی -->
      <div class="pt-4">
        <?php hiitech_pagination(); ?>
      </div>
    <?php else : ?>
      <div class="p-10 rounded-3xl bg-white/[0.02] border border-white/10 text-center space-y-4">
        <p class="text-slate-300 text-sm sm:text-base">محصولی در این دسته‌بندی یافت نشد.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-cyber-gold px-6 py-2.5 rounded-full text-xs sm:text-sm inline-block">
          بازگشت به صفحه اصلی
        </a>
      </div>
    <?php endif; ?>

    <!-- توضیحات دسته‌بندی با قابلیت باز و بسته شدن (مشاهده بیشتر) -->
    <?php
    $archive_desc = ( function_exists( 'is_product_category' ) && is_product_category() ) ? term_description() : get_the_archive_description();
    if ( ! empty( $archive_desc ) ) :
    ?>
      <section class="p-6 sm:p-8 rounded-3xl bg-white/[0.02] border border-white/[0.08]">
        <div id="matn-single" class="text-sm text-slate-300 leading-8 space-y-4 overflow-hidden transition-all duration-300 max-h-44">
          <?php echo wp_kses_post( $archive_desc ); ?>
        </div>
        <div class="mt-4 pt-4 border-t border-white/[0.06] text-center">
          <button type="button" id="toggle-btn" class="btn-cyber-glass px-5 py-2 rounded-full text-xs font-semibold text-cyberGold-300">
            مشاهده بیشتر
          </button>
        </div>
      </section>
      <script>
        (function () {
          const btn = document.getElementById('toggle-btn');
          const box = document.getElementById('matn-single');
          if (!btn || !box) return;
          btn.addEventListener('click', function () {
            const expanded = box.classList.toggle('max-h-44');
            btn.textContent = expanded ? 'مشاهده بیشتر' : 'بستن توضیحات';
          });
        })();
      </script>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>

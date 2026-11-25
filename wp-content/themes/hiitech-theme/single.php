<?php
/**
 * صفحه نمایش نوشته تکی (Single Post) — قالب هایتک
 */
get_header();
?>

<main class="flex-grow py-12 lg:py-16">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 space-y-10">

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            if ( function_exists( 'hiitech_set_post_views' ) ) {
                hiitech_set_post_views( get_the_ID() );
            }

            $post_url   = urlencode( get_permalink() );
            $post_title = urlencode( get_the_title() );
            $categories = get_the_category();

            // استخراج خودکار فهرست مطالب (TOC) از تگ‌های h2 و h3
            $raw_content = apply_filters( 'the_content', get_the_content() );
            preg_match_all( '/<h([23])[^>]*>(.*?)<\/h[23]>/i', $raw_content, $matches, PREG_SET_ORDER );

            $toc = array();
            if ( ! empty( $matches ) ) {
                $h2_count = 0;
                $h3_count = 0;
                foreach ( $matches as $match ) {
                    $tag   = (int) $match[1];
                    $title = wp_strip_all_tags( $match[2] );

                    if ( 2 === $tag ) {
                        $h2_count++;
                        $h3_count = 0;
                        $id       = 'head-' . $h2_count;
                        $raw_content = preg_replace( '/' . preg_quote( $match[0], '/' ) . '/', '<h2 id="' . esc_attr( $id ) . '">' . $match[2] . '</h2>', $raw_content, 1 );
                        $toc[]    = array(
                            'id'       => $id,
                            'title'    => $title,
                            'children' => array(),
                        );
                    } elseif ( 3 === $tag && $h2_count > 0 ) {
                        $h3_count++;
                        $id       = 'sub-head-' . $h2_count . '-' . $h3_count;
                        $raw_content = preg_replace( '/' . preg_quote( $match[0], '/' ) . '/', '<h3 id="' . esc_attr( $id ) . '">' . $match[2] . '</h3>', $raw_content, 1 );
                        $toc[ count( $toc ) - 1 ]['children'][] = array(
                            'id'    => $id,
                            'title' => $title,
                        );
                    }
                }
            }
    ?>

      <article <?php post_class( 'rounded-3xl bg-white/[0.02] border border-white/[0.08] p-6 sm:p-10 space-y-8' ); ?>>

        <!-- مسیر راهنما (Breadcrumbs) -->
        <div>
          <?php hiitech_breadcrumbs(); ?>
        </div>

        <!-- هدر مقاله -->
        <header class="space-y-4">
          <div class="flex flex-wrap items-center gap-2.5 text-xs">
            <?php if ( ! empty( $categories ) ) : ?>
              <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>" class="px-3 py-1 rounded-full bg-cyberGold-400/15 border border-cyberGold-400/30 text-cyberGold-300 font-semibold">
                <?php echo esc_html( $categories[0]->name ); ?>
              </a>
            <?php endif; ?>
            <span class="text-slate-400"><?php echo esc_html( get_the_date() ); ?></span>
            <?php if ( function_exists( 'hiitech_get_post_views' ) ) : ?>
              <span class="text-slate-500">•</span>
              <span class="text-slate-400"><?php echo esc_html( hiitech_get_post_views( get_the_ID() ) ); ?> بازدید</span>
            <?php endif; ?>
          </div>

          <h1 class="text-2xl sm:text-4xl font-black text-white leading-tight">
            <?php the_title(); ?>
          </h1>
        </header>

        <!-- تصویر شاخص -->
        <?php if ( has_post_thumbnail() ) : ?>
          <figure class="rounded-2xl overflow-hidden border border-white/10 bg-obsidian-950">
            <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto object-cover' ) ); ?>
          </figure>
        <?php endif; ?>

        <!-- نوار اشتراک‌گذاری واقعی -->
        <div class="flex flex-wrap items-center justify-between gap-3 py-3.5 px-4 rounded-2xl bg-obsidian-950/80 border border-white/[0.07]">
          <span class="text-xs font-semibold text-slate-300">اشتراک‌گذاری این مطلب:</span>
          <div class="flex items-center gap-2">
            <a href="https://t.me/share/url?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" rel="nofollow noopener" target="_blank" class="px-3 py-1.5 rounded-xl bg-white/[0.04] hover:bg-cyberCyan-500/20 border border-white/10 text-xs text-slate-200 hover:text-cyberCyan-300 transition">تلگرام</a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $post_url; ?>" rel="nofollow noopener" target="_blank" class="px-3 py-1.5 rounded-xl bg-white/[0.04] hover:bg-cyberCyan-500/20 border border-white/10 text-xs text-slate-200 hover:text-cyberCyan-300 transition">لینکدین</a>
            <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" rel="nofollow noopener" target="_blank" class="px-3 py-1.5 rounded-xl bg-white/[0.04] hover:bg-cyberCyan-500/20 border border-white/10 text-xs text-slate-200 hover:text-cyberCyan-300 transition">ایکس (توییتر)</a>
            <button type="button" onclick="navigator.clipboard && navigator.clipboard.writeText('<?php echo esc_js( get_permalink() ); ?>'); if(typeof showCyberToast==='function'){showCyberToast('لینک مطلب کپی شد!','cyan');}" class="px-3 py-1.5 rounded-xl bg-cyberGold-400/15 hover:bg-cyberGold-400/25 border border-cyberGold-400/35 text-xs font-semibold text-cyberGold-300 transition">کپی لینک</button>
          </div>
        </div>

        <!-- فهرست مطالب هوشمند (TOC) -->
        <?php if ( ! empty( $toc ) ) : ?>
          <nav aria-label="فهرست مطالب" class="p-5 sm:p-6 rounded-2xl bg-cyberCyan-500/[0.05] border border-cyberCyan-400/20 space-y-3">
            <div class="text-sm font-extrabold text-cyberCyan-300">فهرست مطالب این مقاله</div>
            <?php
            $all_items = 0;
            foreach ( $toc as $h2 ) {
                $all_items += 1 + count( $h2['children'] );
            }
            $shown = 0;
            echo '<ul id="hiitech-toc-list" class="space-y-2 text-xs sm:text-sm text-slate-300">';
            foreach ( $toc as $h2 ) {
                $shown++;
                $hidden_cls = ( $shown > 8 ) ? ' hidden toc-extra-item' : '';
                echo '<li class="' . esc_attr( trim( $hidden_cls ) ) . '">';
                echo '<a href="#' . esc_attr( $h2['id'] ) . '" class="hover:text-cyberGold-400 transition font-medium">• ' . esc_html( $h2['title'] ) . '</a>';
                if ( ! empty( $h2['children'] ) ) {
                    echo '<ul class="mr-5 mt-1.5 space-y-1.5 text-slate-400">';
                    foreach ( $h2['children'] as $h3 ) {
                        $shown++;
                        $sub_hidden_cls = ( $shown > 8 ) ? ' hidden toc-extra-item' : '';
                        echo '<li class="' . esc_attr( trim( $sub_hidden_cls ) ) . '"><a href="#' . esc_attr( $h3['id'] ) . '" class="hover:text-cyberCyan-300 transition">– ' . esc_html( $h3['title'] ) . '</a></li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
            echo '</ul>';

            if ( $all_items > 8 ) :
            ?>
              <button type="button" id="toc-toggle" class="mt-2 px-4 py-1.5 rounded-full bg-white/[0.05] hover:bg-white/10 border border-white/10 text-xs text-cyberGold-300 transition">
                مشاهده همه سرفصل‌ها
              </button>
              <script>
                (function () {
                  const btn = document.getElementById('toc-toggle');
                  if (!btn) return;
                  let expanded = false;
                  btn.addEventListener('click', function () {
                    expanded = !expanded;
                    document.querySelectorAll('#hiitech-toc-list .toc-extra-item').forEach(function (el) {
                      el.classList.toggle('hidden', !expanded);
                    });
                    btn.textContent = expanded ? 'بستن فهرست کامل' : 'مشاهده همه سرفصل‌ها';
                  });
                })();
              </script>
            <?php endif; ?>
          </nav>
        <?php endif; ?>

        <!-- محتوای اصلی مقاله -->
        <div id="matn-single" class="text-slate-200 text-sm sm:text-base leading-8 space-y-5 [&>h2]:text-xl [&>h2]:sm:text-2xl [&>h2]:font-extrabold [&>h2]:text-white [&>h2]:pt-4 [&>h3]:text-lg [&>h3]:font-bold [&>h3]:text-cyberGold-300 [&>h3]:pt-2 [&>ul]:list-disc [&>ul]:pr-5 [&>ol]:list-decimal [&>ol]:pr-5 [&_a]:text-cyberCyan-400 [&_a:hover]:underline [&_img]:rounded-2xl [&_img]:border [&_img]:border-white/10">
          <?php echo $raw_content; ?>
        </div>

        <!-- برچسب‌های نوشته -->
        <?php
        $tags = get_the_tags();
        if ( ! empty( $tags ) ) :
        ?>
          <div class="pt-6 border-t border-white/[0.08] flex flex-wrap items-center gap-2">
            <span class="text-xs text-slate-400 ml-1">برچسب‌ها:</span>
            <?php foreach ( $tags as $tag ) : ?>
              <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="tech-pill hover:border-cyberGold-400/40 hover:text-cyberGold-300">
                #<?php echo esc_html( $tag->name ); ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      </article>

      <!-- بخش دیدگاه کاربران -->
      <?php if ( comments_open() || get_comments_number() ) : ?>
        <section id="didghah" class="rounded-3xl bg-white/[0.02] border border-white/[0.08] p-6 sm:p-9">
          <div class="flex items-center justify-between gap-4 pb-5 mb-6 border-b border-white/[0.08]">
            <h2 class="text-lg sm:text-xl font-extrabold text-white">دیدگاه کاربران</h2>
            <span class="px-3 py-1 rounded-full bg-cyberCyan-500/15 border border-cyberCyan-400/25 text-xs text-cyberCyan-300">
              <?php comments_number( 'بدون دیدگاه', '۱ دیدگاه', '% دیدگاه' ); ?>
            </span>
          </div>
          <?php comments_template(); ?>
        </section>
      <?php endif; ?>

    <?php
        endwhile;
    endif;
    ?>

  </div>
</main>

<?php get_footer(); ?>

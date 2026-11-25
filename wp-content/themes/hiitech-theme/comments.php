<?php
/**
 * قالب بخش دیدگاه‌ها — استودیوی فناوری هایتک (HiiTECH Studio)
 */

if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' === basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die( 'دسترسی مستقیم مجاز نیست.' );
}

if ( post_password_required() ) :
?>
  <p class="p-4 rounded-2xl bg-white/[0.03] border border-white/10 text-xs sm:text-sm text-slate-300">
    برای مشاهده‌ی دیدگاه‌ها باید رمز نوشته را وارد کنید.
  </p>
<?php
    return;
endif;
?>

<div id="comments-wrap" class="space-y-8">

  <!-- فرم ارسال دیدگاه -->
  <?php if ( comments_open() ) : ?>
    <div id="respond" class="space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-base font-bold text-white">ارسال دیدگاه جدید</h3>
        <small class="text-xs text-cyberGold-400 hover:underline"><?php cancel_comment_reply_link( 'لغو پاسخ' ); ?></small>
      </div>

      <?php if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) : ?>
        <p class="p-4 rounded-2xl bg-obsidian-950/80 border border-white/10 text-xs sm:text-sm text-slate-300">
          ابتدا
          <a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" class="text-cyberGold-400 font-bold hover:underline">وارد شوید</a>
          تا بتوانید دیدگاهی ارسال کنید.
        </p>
      <?php else : ?>
        <form action="<?php echo esc_url( site_url( '/wp-comments-post.php' ) ); ?>" method="post" id="commentform" class="space-y-4">

          <?php if ( is_user_logged_in() ) : ?>
            <?php $current_user = wp_get_current_user(); ?>
            <p class="text-xs text-slate-300">
              وارد شده با حساب:
              <a href="<?php echo esc_url( admin_url( 'profile.php' ) ); ?>" class="text-cyberCyan-300 font-semibold hover:underline">
                <?php echo esc_html( $current_user->display_name ); ?>
              </a>
              —
              <a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" class="text-rose-300 hover:underline">خروج</a>
            </p>
          <?php else : ?>
            <?php
            $commenter = wp_get_current_commenter();
            $req       = (bool) get_option( 'require_name_email' );
            ?>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div>
                <input
                  type="text"
                  name="author"
                  id="author"
                  value="<?php echo esc_attr( $commenter['comment_author'] ); ?>"
                  placeholder="نام و نام خانوادگی<?php echo $req ? ' *' : ''; ?>"
                  <?php echo $req ? 'required' : ''; ?>
                  class="w-full px-4 py-3 rounded-xl bg-obsidian-950/85 border border-white/10 text-xs sm:text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyberGold-400"
                />
              </div>
              <div>
                <input
                  type="email"
                  name="email"
                  id="email"
                  value="<?php echo esc_attr( $commenter['comment_author_email'] ); ?>"
                  placeholder="ایمیل<?php echo $req ? ' *' : ''; ?>"
                  <?php echo $req ? 'required' : ''; ?>
                  class="w-full px-4 py-3 rounded-xl bg-obsidian-950/85 border border-white/10 text-xs sm:text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyberGold-400"
                />
              </div>
              <div>
                <input
                  type="url"
                  name="url"
                  id="url"
                  value="<?php echo esc_attr( $commenter['comment_author_url'] ); ?>"
                  placeholder="وب‌سایت (اختیاری)"
                  class="w-full px-4 py-3 rounded-xl bg-obsidian-950/85 border border-white/10 text-xs sm:text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyberGold-400"
                />
              </div>
            </div>
          <?php endif; ?>

          <div>
            <textarea
              name="comment"
              id="comment"
              rows="5"
              required
              placeholder="متن دیدگاه خود را اینجا بنویسید..."
              class="w-full px-4 py-3 rounded-xl bg-obsidian-950/85 border border-white/10 text-xs sm:text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyberGold-400"
            ></textarea>
          </div>

          <div class="flex items-center justify-end">
            <button type="submit" name="submit" id="submit" class="btn-cyber-gold px-7 py-3 rounded-full text-xs sm:text-sm">
              ارسال دیدگاه
            </button>
            <?php comment_id_fields(); ?>
          </div>

          <?php do_action( 'comment_form', $post->ID ); ?>
        </form>
      <?php endif; ?>
    </div>
  <?php else : ?>
    <p class="p-4 rounded-2xl bg-white/[0.03] border border-white/10 text-xs sm:text-sm text-slate-400">
      موقتاً امکان ارسال دیدگاه برای این نوشته غیرفعال است.
    </p>
  <?php endif; ?>

  <!-- لیست دیدگاه‌های ثبت‌شده -->
  <?php if ( have_comments() ) : ?>
    <div class="pt-6 border-t border-white/[0.08] space-y-5">
      <ol class="commentlist space-y-4 [&_.comment-body]:p-5 [&_.comment-body]:rounded-2xl [&_.comment-body]:bg-obsidian-950/80 [&_.comment-body]:border [&_.comment-body]:border-white/[0.08] [&_.comment-author]:text-sm [&_.comment-author]:font-bold [&_.comment-author]:text-white [&_.comment-meta]:text-[11px] [&_.comment-meta]:text-slate-400 [&_.comment-meta]:mb-2 [&_.comment-content]:text-xs [&_.comment-content]:sm:text-sm [&_.comment-content]:text-slate-300 [&_.comment-content]:leading-7 [&_.reply_a]:text-xs [&_.reply_a]:text-cyberGold-400 [&_.children]:mr-6 [&_.children]:mt-3 [&_.children]:space-y-3">
        <?php
        wp_list_comments(
            array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 42,
            )
        );
        ?>
      </ol>

      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="flex items-center justify-between pt-4 text-xs text-cyberCyan-300">
          <div><?php previous_comments_link( '← دیدگاه‌های قدیمی‌تر' ); ?></div>
          <div><?php next_comments_link( 'دیدگاه‌های جدیدتر →' ); ?></div>
        </nav>
      <?php endif; ?>
    </div>
  <?php endif; ?>

</div>

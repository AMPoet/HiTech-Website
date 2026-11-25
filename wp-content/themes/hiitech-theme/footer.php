  <!-- ========================================== -->
  <!-- ۴. فوتر تایپوگرافیک و مدرن هایتک (بدون لوگو) -->
  <!-- ========================================== -->
  <footer class="border-t border-white/[0.06] bg-[#05080c] pt-16 pb-10 mt-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-10 pb-14 border-b border-white/[0.06]">

        <!-- ستون اول (راست در RTL): نام تایپوگرافیک هایتک بدون لوگو + شبکه‌های اجتماعی -->
        <div class="md:col-span-5 text-right">
          <div class="text-2xl font-black text-cyberCyan-400 tracking-tight mb-3">هایتک</div>
          <p class="text-xs sm:text-sm text-slate-400 leading-7 max-w-xs mb-6">
            استودیوی فناوری، وب، هوش مصنوعی و اتوماسیون برای کسب‌وکارهای ایران.
          </p>

          <!-- دکمه‌های شبکه‌های اجتماعی -->
          <div class="flex items-center gap-2.5">
            <a href="#contact" onclick="switchTab('contact'); return false;" aria-label="لینکدین هایتک" class="w-9 h-9 rounded-xl bg-white/[0.03] border border-white/[0.08] hover:border-cyberGold-400/50 hover:text-cyberGold-400 text-slate-400 flex items-center justify-center text-xs font-mono transition">
              in
            </a>
            <a href="#contact" onclick="switchTab('contact'); return false;" aria-label="شبکه ایکس هایتک" class="w-9 h-9 rounded-xl bg-white/[0.03] border border-white/[0.08] hover:border-cyberGold-400/50 hover:text-cyberGold-400 text-slate-400 flex items-center justify-center text-xs font-mono transition">
              X
            </a>
            <a href="#projects" onclick="switchTab('projects'); return false;" aria-label="گیت‌هاب هایتک" class="w-9 h-9 rounded-xl bg-white/[0.03] border border-white/[0.08] hover:border-cyberGold-400/50 hover:text-cyberGold-400 text-slate-400 flex items-center justify-center transition">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"></path>
              </svg>
            </a>
            <a href="#contact" onclick="switchTab('contact'); return false;" aria-label="تلگرام و شبکه اجتماعی هایتک" class="w-9 h-9 rounded-xl bg-white/[0.03] border border-white/[0.08] hover:border-cyberGold-400/50 hover:text-cyberGold-400 text-slate-400 flex items-center justify-center transition">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <rect x="3" y="3" width="18" height="18" rx="5" stroke-width="1.8"></rect>
                <circle cx="12" cy="12" r="4" stroke-width="1.8"></circle>
                <circle cx="17.5" cy="6.5" r="1" fill="currentColor"></circle>
              </svg>
            </a>
          </div>
        </div>

        <!-- ستون دوم: نقشه صفحات -->
        <div class="md:col-span-3 text-right">
          <h4 class="text-xs font-semibold text-slate-400 mb-4">صفحات</h4>
          <ul class="space-y-3 text-xs sm:text-sm text-slate-300">
            <li><button type="button" onclick="switchTab('home')" class="hover:text-cyberGold-400 transition">خانه</button></li>
            <li><button type="button" onclick="switchTab('news')" class="hover:text-cyberGold-400 transition">آخرین اخبار تکنولوژی</button></li>
            <li><button type="button" onclick="switchTab('blog')" class="hover:text-cyberGold-400 transition">وبلاگ هوش مصنوعی</button></li>
            <li><button type="button" onclick="switchTab('projects')" class="hover:text-cyberGold-400 transition">پروژه‌های ما</button></li>
            <li><button type="button" onclick="switchTab('about')" class="hover:text-cyberGold-400 transition">درباره ما</button></li>
            <li><button type="button" onclick="switchTab('contact')" class="hover:text-cyberGold-400 transition">ارتباط با ما</button></li>
            <li><button type="button" onclick="switchTab('admin')" class="text-cyberGold-400 hover:text-cyberGold-300 font-semibold transition">پنل مدیریت و انتشار Netlify</button></li>
          </ul>
        </div>

        <!-- ستون سوم: خدمات هایتک -->
        <div class="md:col-span-4 text-right">
          <h4 class="text-xs font-semibold text-slate-400 mb-4">خدمات</h4>
          <ul class="space-y-3 text-xs sm:text-sm text-slate-300">
            <li><button type="button" onclick="switchTab('projects')" class="hover:text-cyberCyan-400 transition">توسعه محصول وب</button></li>
            <li><button type="button" onclick="switchTab('blog')" class="hover:text-cyberCyan-400 transition">هوش مصنوعی کاربردی</button></li>
            <li><button type="button" onclick="switchTab('projects')" class="hover:text-cyberCyan-400 transition">اتوماسیون فرایند</button></li>
            <li><button type="button" onclick="switchTab('about')" class="hover:text-cyberCyan-400 transition">امنیت و زیرساخت</button></li>
          </ul>
        </div>

      </div>

      <!-- نوار کپی‌رایت رسمی هایتک -->
      <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] sm:text-xs text-slate-500">
        <div>© ۲۰۲۶ هایتک — تمامی حقوق محفوظ است.</div>
        <div>ساخته‌شده با دقت در تهران</div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>

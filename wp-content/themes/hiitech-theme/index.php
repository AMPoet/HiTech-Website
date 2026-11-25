<?php
/**
 * قالب اصلی استودیوی فناوری هایتک (HiiTECH Studio)
 */
get_header();
?>


  <!-- ========================================== -->
  <!-- ۲. محتوای صفحات تک‌صفحه‌ای (SPA Views)     -->
  <!-- ========================================== -->
  <main class="flex-grow">

    <!-- ========================================== -->
    <!-- تب ۱: خانه (HOME)                          -->
    <!-- ========================================== -->
    <div id="view-home" class="spa-view active">
      <!-- بخش Hero -->
      <section class="relative pt-10 pb-20 lg:pt-16 lg:pb-28 border-b border-white/[0.05]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

            <!-- ستون راست (در RTL): تایپوگرافی، عنوان H1 «سلام به دنیای فناوری»، دکمه‌ها و آمار -->
            <div class="lg:col-span-7 flex flex-col items-start text-right order-1">
              <!-- نشان استودیوی فناوری هایتک -->
              <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cyberCyan-500/[0.08] border border-cyberCyan-400/20 mb-6 reveal-stage" style="--reveal-delay: 110ms;">
                <span class="w-2 h-2 rounded-full bg-cyberGold-400 animate-pulse"></span>
                <span id="hero-badge-display" class="text-xs font-semibold text-cyberCyan-300 tracking-wide">استودیوی فناوری هایتک</span>
              </div>

              <!-- تگ اصلی H1 (بدون هیچ عبارت انگلیسی قدیمی) -->
              <h1 id="hero-h1-display" class="cyber-h1-gradient text-5xl sm:text-6xl lg:text-[4.35rem] font-black leading-[1.16] tracking-tight mb-6 reveal-stage" style="--reveal-delay: 190ms;">سلام به دنیای<br>فناوری</h1>

              <!-- توضیح زیر عنوان -->
              <p id="hero-desc-display" class="text-slate-300/90 text-base sm:text-lg leading-8 max-w-xl mb-9 font-normal reveal-stage" style="--reveal-delay: 260ms;">ایده‌ها را به محصولات دیجیتال دقیق تبدیل می‌کنیم؛ از معماری وب و اتوماسیون فرایندها تا مدل‌های هوش مصنوعی و زیرساخت امن. هایتک در کنار تیم شما می‌ماند تا نتیجه، قابل اندازه‌گیری باشد.</p>

              <!-- دکمه‌های فراخوان (CTA) -->
              <div class="flex flex-wrap items-center gap-4 mb-12 reveal-stage" style="--reveal-delay: 330ms;">
                <button type="button" onclick="switchTab('projects')" class="btn-cyber-gold px-7 py-3.5 rounded-full text-sm sm:text-base">
                  پروژه‌های ما را ببینید
                </button>
                <button type="button" onclick="switchTab('contact')" class="btn-cyber-glass px-7 py-3.5 rounded-full text-sm sm:text-base font-medium">
                  گفتگو با هایتک
                </button>
                <button type="button" onclick="switchTab('admin'); switchAdminSubtab('upload');" class="px-5 py-3.5 rounded-full text-xs sm:text-sm font-semibold bg-cyberCyan-500/10 hover:bg-cyberCyan-500/20 text-cyberCyan-300 border border-cyberCyan-400/30 transition inline-flex items-center gap-2">
                  <span>+ آپلود محتوا در سایت</span>
                </button>
              </div>

              <!-- نوار شاخص‌های کلیدی عملکرد هایتک -->
              <div class="w-full max-w-lg pt-8 border-t border-white/[0.08] grid grid-cols-3 gap-6 reveal-stage" style="--reveal-delay: 400ms;">
                <div>
                  <div id="metric-1-val" class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight mb-1">+۱۸۰</div>
                  <div id="metric-1-label" class="text-xs text-slate-400">پروژه تکمیل‌شده</div>
                </div>
                <div>
                  <div id="metric-2-val" class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight mb-1">۹</div>
                  <div id="metric-2-label" class="text-xs text-slate-400">سال تجربه تیمی</div>
                </div>
                <div>
                  <div id="metric-3-val" class="text-2xl sm:text-3xl font-extrabold text-cyberGold-400 tracking-tight mb-1">۹۶٪</div>
                  <div id="metric-3-label" class="text-xs text-slate-400">رضایت مشتریان</div>
                </div>
              </div>
            </div>

            <!-- ستون چپ (در RTL): بوم سه‌بعدی و تعاملی هسته لامپ-مدار هایتک -->
            <div class="lg:col-span-5 flex flex-col items-center justify-center order-2 reveal-stage" style="--reveal-delay: 220ms;">
              <div id="core-portal-container" class="core-portal-wrapper flex items-center justify-center cursor-grab active:cursor-grabbing">
                <canvas id="hiitech-core-canvas" class="w-full h-full block" width="480" height="480"></canvas>

                <!-- برچسب راهنمای تعاملی پایین بوم سه‌بعدی -->
                <div class="absolute bottom-5 inset-x-0 flex justify-center pointer-events-none z-10">
                  <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-obsidian-950/85 border border-white/10 backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-cyberGold-400 animate-ping"></span>
                    <span class="text-[11px] text-slate-300 font-medium">هسته زنده هایتک — حرکت نشانگر را امتحان کنید</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      <!-- بخش توانمندی‌های مهندسی هایتک (۴ کارت سه‌بعدی ژیروسکوپ) -->
      <section class="py-20 lg:py-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div>
              <span class="text-xs font-semibold text-cyberCyan-400 tracking-wide block mb-2">توانمندی‌ها</span>
              <h2 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                مهندسی می‌کنیم، اندازه<br class="hidden sm:inline"> می‌گیریم، بهبود می‌دهیم
              </h2>
            </div>
            <button type="button" onclick="switchTab('about')" class="self-start md:self-auto text-xs sm:text-sm font-semibold text-cyberGold-400 hover:text-cyberGold-300 border-b border-cyberGold-400/40 pb-1 transition">
              درباره روش کار هایتک
            </button>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- کارت ۱: توسعه محصول وب -->
            <div class="tilt-card-container">
              <div class="tilt-card card-featured-gold p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
                <div class="tilt-glare"></div>
                <div class="tilt-content">
                  <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
                      <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.5" class="svg-circuit-flow"></circle>
                      <circle cx="12" cy="12" r="3" fill="#f5c451" class="svg-pulse-node"></circle>
                    </svg>
                  </div>
                  <h3 class="text-xl font-bold text-white mb-3">توسعه محصول وب</h3>
                  <p class="text-sm text-slate-300/85 leading-7 mb-6">
                    معماری فرانت‌اند و بک‌اند، طراحی رابط کاربری و تحویل نسخه قابل انتشار با تمرکز بر سرعت و دسترس‌پذیری.
                  </p>
                </div>
                <div class="tilt-content flex flex-wrap gap-2">
                  <span class="tech-pill">React / Next.js</span>
                  <span class="tech-pill">طراحی API</span>
                  <span class="tech-pill">بهینه‌سازی Core Web Vitals</span>
                </div>
              </div>
            </div>

            <!-- کارت ۲: هوش مصنوعی کاربردی -->
            <div class="tilt-card-container">
              <div class="tilt-card p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
                <div class="tilt-glare"></div>
                <div class="tilt-content">
                  <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
                      <path d="M12 4L5 18H19L12 4Z" stroke="currentColor" stroke-width="1.5" class="svg-circuit-flow"></path>
                      <circle cx="12" cy="4" r="2.2" fill="#f5c451" class="svg-pulse-node"></circle>
                      <circle cx="5" cy="18" r="2" fill="#2dd4bf"></circle>
                      <circle cx="19" cy="18" r="2" fill="#2dd4bf"></circle>
                    </svg>
                  </div>
                  <h3 class="text-xl font-bold text-white mb-3">هوش مصنوعی کاربردی</h3>
                  <p class="text-sm text-slate-300/85 leading-7 mb-6">
                    از دستیار مکالمه‌ای و خلاصه‌سازی اسناد تا بینایی ماشین؛ مدل‌ها را دقیقاً روی فرایند واقعی کسب‌وکار تنظیم می‌کنیم.
                  </p>
                </div>
                <div class="tilt-content flex flex-wrap gap-2">
                  <span class="tech-pill">RAG سازمانی</span>
                  <span class="tech-pill">پردازش زبان فارسی</span>
                  <span class="tech-pill">ارزیابی و پایش مدل</span>
                </div>
              </div>
            </div>

            <!-- کارت ۳: اتوماسیون و یکپارچه‌سازی -->
            <div class="tilt-card-container">
              <div class="tilt-card p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
                <div class="tilt-glare"></div>
                <div class="tilt-content">
                  <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
                      <rect x="4" y="4" width="16" height="16" rx="4" stroke="currentColor" stroke-width="1.5"></rect>
                      <path d="M8 12H16M12 8V16" stroke="#2dd4bf" stroke-width="1.5" class="svg-circuit-flow"></path>
                      <circle cx="12" cy="12" r="2.3" fill="#f5c451" class="svg-pulse-node"></circle>
                    </svg>
                  </div>
                  <h3 class="text-xl font-bold text-white mb-3">اتوماسیون و یکپارچه‌سازی</h3>
                  <p class="text-sm text-slate-300/85 leading-7 mb-6">
                    حذف کارهای تکراری با جریان‌های دقیق؛ اتصال CRM، انبار، پرداخت و ابزارهای داخلی در یک سیستم قابل اتکا.
                  </p>
                </div>
                <div class="tilt-content flex flex-wrap gap-2">
                  <span class="tech-pill">خط لوله داده</span>
                  <span class="tech-pill">اتصال سرویس‌ها</span>
                  <span class="tech-pill">داشبورد عملیاتی</span>
                </div>
              </div>
            </div>

            <!-- کارت ۴: امنیت و پایداری -->
            <div class="tilt-card-container">
              <div class="tilt-card p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
                <div class="tilt-glare"></div>
                <div class="tilt-content">
                  <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
                      <path d="M12 3L19 6.5V12.5C19 16.8 16 20.3 12 21.5C8 20.3 5 16.8 5 12.5V6.5L12 3Z" stroke="currentColor" stroke-width="1.5"></path>
                      <circle cx="12" cy="12" r="2.5" fill="#f5c451" class="svg-pulse-node"></circle>
                    </svg>
                  </div>
                  <h3 class="text-xl font-bold text-white mb-3">امنیت و پایداری</h3>
                  <p class="text-sm text-slate-300/85 leading-7 mb-6">
                    بازبینی زیرساخت، مدیریت دسترسی و آماده‌سازی برای رشد؛ سیستمی که در برابر خطا و بار سنگین مقاوم است.
                  </p>
                </div>
                <div class="tilt-content flex flex-wrap gap-2">
                  <span class="tech-pill">بازبینی امنیتی</span>
                  <span class="tech-pill">پایش و هشدار</span>
                  <span class="tech-pill">پشتیبان‌گیری</span>
                </div>
              </div>
            </div>
          </div>

          <!-- بنر شروع سریع هایتک -->
          <div class="mt-16 quick-start-banner rounded-3xl p-8 sm:p-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
              <span class="text-xs font-semibold text-cyberCyan-400 block mb-2">شروع سریع</span>
              <h3 class="text-2xl sm:text-3xl font-extrabold text-white mb-2">بیایید اولین قدم فنی را با هم برداریم</h3>
              <p class="text-xs sm:text-sm text-slate-300">یک جلسه ۳۰ دقیقه‌ای برای شناخت مسئله، بدون هزینه و بدون تعهد.</p>
            </div>
            <button type="button" onclick="switchTab('contact')" class="btn-cyber-gold px-7 py-3.5 rounded-full text-sm shrink-0">
              درخواست جلسه مشاوره
            </button>
          </div>
        </div>
      </section>
    </div>

    <!-- ========================================== -->
    <!-- تب ۲: آخرین اخبار تکنولوژی (NEWS)          -->
    <!-- ========================================== -->
    <div id="view-news" class="spa-view py-12 lg:py-16">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
          <div>
            <span class="text-xs font-semibold text-cyberCyan-400 block mb-2">رادار فناوری هایتک</span>
            <h2 class="text-3xl sm:text-4xl font-black text-white">آخرین اخبار تکنولوژی</h2>
            <p class="text-sm text-slate-400 mt-2">تحلیل‌های فنی تیم هایتک از تحولات روز مهندسی وب، زیرساخت ابری و هوش مصنوعی.</p>
          </div>

          <!-- فیلتر دسته‌بندی اخبار -->
          <div class="flex flex-wrap gap-2">
            <button type="button" onclick="filterNews('all')" data-news-cat="all" class="px-4 py-2 rounded-full text-xs font-semibold bg-cyberGold-400 text-obsidian-950 transition">همه اخبار</button>
            <button type="button" onclick="filterNews('ai')" data-news-cat="ai" class="px-4 py-2 rounded-full text-xs font-medium bg-white/[0.04] text-slate-300 hover:bg-white/[0.08] border border-white/10 transition">هوش مصنوعی</button>
            <button type="button" onclick="filterNews('web')" data-news-cat="web" class="px-4 py-2 rounded-full text-xs font-medium bg-white/[0.04] text-slate-300 hover:bg-white/[0.08] border border-white/10 transition">مهندسی وب</button>
            <button type="button" onclick="filterNews('cloud')" data-news-cat="cloud" class="px-4 py-2 rounded-full text-xs font-medium bg-white/[0.04] text-slate-300 hover:bg-white/[0.08] border border-white/10 transition">ابر و امنیت</button>
          </div>
        </div>

        <div id="news-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="tilt-card-container">
          <article class="tilt-card card-featured-gold p-6 sm:p-7 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              
              <div class="flex items-center justify-between gap-2 mb-5">
                <div class="w-10 h-10 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <path d="M12 4L5 18H19L12 4Z" stroke="currentColor" stroke-width="1.5" class="svg-circuit-flow"></path>
              <circle cx="12" cy="4" r="2.3" fill="#f5c451" class="svg-pulse-node"></circle>
              <circle cx="5" cy="18" r="2" fill="#2dd4bf"></circle>
              <circle cx="19" cy="18" r="2" fill="#2dd4bf"></circle>
            </svg>
                </div>
                <span class="text-[11px] font-semibold text-cyberGold-300 bg-cyberGold-400/10 border border-cyberGold-400/25 px-3 py-1 rounded-full">
                  هوش مصنوعی
                </span>
              </div>
              <div class="text-[11px] text-slate-400 mb-2">آبان ۱۴۰۵ • مطالعه ۴ دقیقه</div>
              <h3 class="text-lg font-extrabold text-white leading-snug mb-3">نسل جدید دستیارهای چندوجهی در زیرساخت‌های بومی؛ تحلیل تیم هایتک</h3>
              <p class="text-xs sm:text-sm text-slate-300/85 leading-7 mb-5">چگونه مدل‌های زبانی سبک و بهینه‌سازی‌شده می‌توانند بدون خروج داده از شبکه سازمان، اسناد و صدای فارسی را با دقت بالا پردازش کنند.</p>
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-1.5">
                <span class="tech-pill">LLM بومی</span><span class="tech-pill">پردازش زبان فارسی</span><span class="tech-pill">امنیت داده</span>
              </div>
              <div class="flex items-center justify-between gap-2">
                <button type="button" onclick="openDetailModal('news', 'news-1')" class="text-xs font-bold text-cyberGold-400 hover:text-cyberGold-300 transition">
                  مطالعه کامل خبر ←
                </button>
                <button type="button" onclick="openShareModal('news', 'news-1')" class="px-3 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-[11px] text-cyberCyan-300 transition">
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      
        <div class="tilt-card-container">
          <article class="tilt-card  p-6 sm:p-7 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              
              <div class="flex items-center justify-between gap-2 mb-5">
                <div class="w-10 h-10 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.5" class="svg-circuit-flow"></circle>
              <circle cx="12" cy="12" r="3" fill="#f5c451" class="svg-pulse-node"></circle>
            </svg>
                </div>
                <span class="text-[11px] font-semibold text-cyberGold-300 bg-cyberGold-400/10 border border-cyberGold-400/25 px-3 py-1 rounded-full">
                  مهندسی وب
                </span>
              </div>
              <div class="text-[11px] text-slate-400 mb-2">آبان ۱۴۰۵ • مطالعه ۳ دقیقه</div>
              <h3 class="text-lg font-extrabold text-white leading-snug mb-3">معماری Edge Rendering و تاثیر مستقیم آن بر نرخ تبدیل فروشگاه‌های آنلاین</h3>
              <p class="text-xs sm:text-sm text-slate-300/85 leading-7 mb-5">بررسی تجربه هایتک در کاهش زمان بارگذاری اولیه (LCP) به زیر ۰.۸ ثانیه و تاثیر ملموس آن بر سئو و تجربه کاربری موبایل.</p>
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-1.5">
                <span class="tech-pill">Core Web Vitals</span><span class="tech-pill">معماری وب</span><span class="tech-pill">بهینه‌سازی سرعت</span>
              </div>
              <div class="flex items-center justify-between gap-2">
                <button type="button" onclick="openDetailModal('news', 'news-2')" class="text-xs font-bold text-cyberGold-400 hover:text-cyberGold-300 transition">
                  مطالعه کامل خبر ←
                </button>
                <button type="button" onclick="openShareModal('news', 'news-2')" class="px-3 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-[11px] text-cyberCyan-300 transition">
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      
        <div class="tilt-card-container">
          <article class="tilt-card  p-6 sm:p-7 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              
              <div class="flex items-center justify-between gap-2 mb-5">
                <div class="w-10 h-10 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <path d="M12 3L19 6.5V12.5C19 16.8 16 20.3 12 21.5C8 20.3 5 16.8 5 12.5V6.5L12 3Z" stroke="currentColor" stroke-width="1.5"></path>
              <circle cx="12" cy="12" r="2.6" fill="#f5c451" class="svg-pulse-node"></circle>
            </svg>
                </div>
                <span class="text-[11px] font-semibold text-cyberGold-300 bg-cyberGold-400/10 border border-cyberGold-400/25 px-3 py-1 rounded-full">
                  ابر و امنیت
                </span>
              </div>
              <div class="text-[11px] text-slate-400 mb-2">مهر ۱۴۰۵ • مطالعه ۵ دقیقه</div>
              <h3 class="text-lg font-extrabold text-white leading-snug mb-3">الگوی Zero-Trust در میکروسرویس‌های مالی و سازمانی</h3>
              <p class="text-xs sm:text-sm text-slate-300/85 leading-7 mb-5">چرا دیوارهای آتش سنتی دیگر کافی نیستند و چگونه هایتک احراز هویت متقابل سرویس‌به‌سرویس را پیاده‌سازی می‌کند.</p>
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-1.5">
                <span class="tech-pill">Zero-Trust</span><span class="tech-pill">امنیت ابری</span><span class="tech-pill">پایش لحظه‌ای</span>
              </div>
              <div class="flex items-center justify-between gap-2">
                <button type="button" onclick="openDetailModal('news', 'news-3')" class="text-xs font-bold text-cyberGold-400 hover:text-cyberGold-300 transition">
                  مطالعه کامل خبر ←
                </button>
                <button type="button" onclick="openShareModal('news', 'news-3')" class="px-3 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-[11px] text-cyberCyan-300 transition">
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      </div>
      </div>
    </div>

    <!-- ========================================== -->
    <!-- تب ۳: وبلاگ هوش مصنوعی (AI BLOG)           -->
    <!-- ========================================== -->
    <div id="view-blog" class="spa-view py-12 lg:py-16">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
          <div>
            <span class="text-xs font-semibold text-cyberGold-400 block mb-2">یادداشت‌های آزمایشگاه AI هایتک</span>
            <h2 class="text-3xl sm:text-4xl font-black text-white">وبلاگ هوش مصنوعی</h2>
            <p class="text-sm text-slate-400 mt-2">مقالات عمیق درباره معماری RAG، پردازش زبان فارسی و استقرار مدل‌های زبانی در سازمان.</p>
          </div>

          <div class="w-full md:w-72">
            <input id="blog-search-input" type="search" oninput="renderBlogCards(this.value)" placeholder="جستجو در مقالات هوش مصنوعی..." class="w-full px-4 py-2.5 rounded-full bg-white/[0.04] border border-white/10 text-xs sm:text-sm text-white placeholder-slate-400 focus:outline-none focus:border-cyberGold-400">
          </div>
        </div>

        <div id="blog-grid" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="tilt-card-container">
          <article class="tilt-card card-featured-gold p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              
              <div class="flex items-center justify-between gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <path d="M12 4L5 18H19L12 4Z" stroke="currentColor" stroke-width="1.5" class="svg-circuit-flow"></path>
              <circle cx="12" cy="4" r="2.3" fill="#f5c451" class="svg-pulse-node"></circle>
              <circle cx="5" cy="18" r="2" fill="#2dd4bf"></circle>
              <circle cx="19" cy="18" r="2" fill="#2dd4bf"></circle>
            </svg>
                </div>
                <span class="text-xs font-semibold text-cyberCyan-300 bg-cyberCyan-500/10 border border-cyberCyan-400/20 px-3.5 py-1 rounded-full">
                  معماری RAG سازمانی
                </span>
              </div>
              <div class="text-xs text-slate-400 mb-2">پژوهش فنی هایتک • ۷ دقیقه مطالعه</div>
              <h3 class="text-xl font-extrabold text-white leading-snug mb-3">راهنمای جامع پیاده‌سازی سیستم‌های RAG دقیق روی مستندات پیچیده فارسی</h3>
              <p class="text-sm text-slate-300/85 leading-7 mb-6">از قطعه‌بندی معنایی (Semantic Chunking) تا بازرتبه‌بندی نتایج؛ تجربه‌های عملی هایتک در حذف توهم مدل‌های زبانی.</p>
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-2">
                <span class="tech-pill">RAG سازمانی</span><span class="tech-pill">جستجوی ترکیبی</span><span class="tech-pill">هوش مصنوعی هایتک</span>
              </div>
              <div class="flex items-center justify-between gap-2">
                <button type="button" onclick="openDetailModal('blog', 'blog-1')" class="text-xs sm:text-sm font-bold text-cyberGold-400 hover:text-cyberGold-300 transition">
                  مطالعه مقاله تخصصی ←
                </button>
                <button type="button" onclick="openShareModal('blog', 'blog-1')" class="px-3.5 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-xs text-cyberCyan-300 transition">
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      
        <div class="tilt-card-container">
          <article class="tilt-card  p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              
              <div class="flex items-center justify-between gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <path d="M4 8V6C4 4.89543 4.89543 4 6 4H8M16 4H18C19.1046 4 20 4.89543 20 6V8M20 16V18C20 19.1046 19.1046 20 18 20H16M8 20H6C4.89543 20 4 19.1046 4 18V16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
              <circle cx="12" cy="12" r="3.2" stroke="#f5c451" stroke-width="1.6" class="svg-pulse-node"></circle>
            </svg>
                </div>
                <span class="text-xs font-semibold text-cyberCyan-300 bg-cyberCyan-500/10 border border-cyberCyan-400/20 px-3.5 py-1 rounded-full">
                  بینایی ماشین و OCR
                </span>
              </div>
              <div class="text-xs text-slate-400 mb-2">یادداشت مهندسی هایتک • ۶ دقیقه مطالعه</div>
              <h3 class="text-xl font-extrabold text-white leading-snug mb-3">خوانش خودکار فاکتورها و اسناد دست‌نویس فارسی با مدل‌های Vision-Language</h3>
              <p class="text-sm text-slate-300/85 leading-7 mb-6">چگونه خط لوله پردازش تصویر هایتک زمان ورود اطلاعات مالی و لجستیکی را تا ۸۵ درصد کاهش می‌دهد.</p>
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-2">
                <span class="tech-pill">بینایی ماشین</span><span class="tech-pill">OCR فارسی</span><span class="tech-pill">اتوماسیون مالی</span>
              </div>
              <div class="flex items-center justify-between gap-2">
                <button type="button" onclick="openDetailModal('blog', 'blog-2')" class="text-xs sm:text-sm font-bold text-cyberGold-400 hover:text-cyberGold-300 transition">
                  مطالعه مقاله تخصصی ←
                </button>
                <button type="button" onclick="openShareModal('blog', 'blog-2')" class="px-3.5 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-xs text-cyberCyan-300 transition">
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      </div>
      </div>
    </div>

    <!-- ========================================== -->
    <!-- تب ۴: پروژه‌های ما (OUR PROJECTS)           -->
    <!-- ========================================== -->
    <div id="view-projects" class="spa-view py-12 lg:py-16">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
          <div>
            <span class="text-xs font-semibold text-cyberCyan-400 block mb-2">مطالعات موردی و دستاوردهای کمی</span>
            <h2 class="text-3xl sm:text-4xl font-black text-white">پروژه‌های ما در هایتک</h2>
            <p class="text-sm text-slate-400 mt-2">نگاهی به محصولاتی که طراحی، مهندسی و در مقیاس واقعی عملیاتی کرده‌ایم.</p>
          </div>

          <div class="flex flex-wrap gap-2">
            <button type="button" onclick="filterProjects('all')" data-proj-cat="all" class="px-4 py-2 rounded-full text-xs font-semibold bg-cyberGold-400 text-obsidian-950 transition">همه پروژه‌ها</button>
            <button type="button" onclick="filterProjects('ai')" data-proj-cat="ai" class="px-4 py-2 rounded-full text-xs font-medium bg-white/[0.04] text-slate-300 border border-white/10 hover:bg-white/[0.08] transition">هوش مصنوعی</button>
            <button type="button" onclick="filterProjects('web')" data-proj-cat="web" class="px-4 py-2 rounded-full text-xs font-medium bg-white/[0.04] text-slate-300 border border-white/10 hover:bg-white/[0.08] transition">پلتفرم وب</button>
            <button type="button" onclick="filterProjects('automation')" data-proj-cat="automation" class="px-4 py-2 rounded-full text-xs font-medium bg-white/[0.04] text-slate-300 border border-white/10 hover:bg-white/[0.08] transition">اتوماسیون سازمانی</button>
          </div>
        </div>

        <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="tilt-card-container">
          <article class="tilt-card card-featured-gold p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              
              <div class="flex items-center justify-between gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <path d="M12 4L5 18H19L12 4Z" stroke="currentColor" stroke-width="1.5" class="svg-circuit-flow"></path>
              <circle cx="12" cy="4" r="2.3" fill="#f5c451" class="svg-pulse-node"></circle>
              <circle cx="5" cy="18" r="2" fill="#2dd4bf"></circle>
              <circle cx="19" cy="18" r="2" fill="#2dd4bf"></circle>
            </svg>
                </div>
                <span class="text-xs font-semibold text-cyberGold-300 bg-cyberGold-400/10 border border-cyberGold-400/25 px-3.5 py-1 rounded-full">
                  هوش مصنوعی کاربردی
                </span>
              </div>

              <div class="text-xs text-slate-400 mb-2">کارفرما: هلدینگ خدمات مالی و سرمایه‌گذاری</div>
              <h3 class="text-xl font-extrabold text-white leading-snug mb-3">دستیار هوشمند تحلیل قراردادها و پایگاه دانش سازمانی (HiiTECH LexAI)</h3>
              <p class="text-sm text-slate-300/85 leading-7 mb-5">سامانه جستجوی معنایی و خلاصه‌سازی بیش از ۱۲۰ هزار صفحه سند حقوقی و مالی با ارجاع دقیق به بندهای قانونی.</p>

              
                <div class="mb-6 p-4 rounded-2xl bg-obsidian-950/90 border border-cyberGold-400/25">
                  <div class="text-lg font-black text-cyberGold-400">۸۵٪ کاهش زمان بررسی اسناد</div>
                  <div class="text-xs text-slate-400 mt-1">دقت بازیابی بندهای قرارداد: ۹۶.۴٪</div>
                </div>
              
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-2">
                <span class="tech-pill">RAG سازمانی</span><span class="tech-pill">پردازش زبان فارسی</span><span class="tech-pill">استقرار امن داخلی</span>
              </div>
              <div class="flex items-center justify-between gap-2">
                <button type="button" onclick="openDetailModal('projects', 'proj-1')" class="text-xs sm:text-sm font-bold text-cyberCyan-400 hover:text-cyberCyan-300 transition">
                  مشاهده مطالعه موردی ←
                </button>
                <button type="button" onclick="openShareModal('projects', 'proj-1')" class="px-3.5 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-xs text-cyberGold-300 transition">
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      
        <div class="tilt-card-container">
          <article class="tilt-card  p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              
              <div class="flex items-center justify-between gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.5" class="svg-circuit-flow"></circle>
              <circle cx="12" cy="12" r="3" fill="#f5c451" class="svg-pulse-node"></circle>
            </svg>
                </div>
                <span class="text-xs font-semibold text-cyberGold-300 bg-cyberGold-400/10 border border-cyberGold-400/25 px-3.5 py-1 rounded-full">
                  توسعه محصول وب
                </span>
              </div>

              <div class="text-xs text-slate-400 mb-2">کارفرما: پلتفرم تجارت الکترونیک B2B</div>
              <h3 class="text-xl font-extrabold text-white leading-snug mb-3">بازمهندسی پلتفرم سفارش‌گیری کلان با معماری Next.js و میکروسرویس</h3>
              <p class="text-sm text-slate-300/85 leading-7 mb-5">طراحی مجدد رابط کاربری و هسته سفارش‌گیری با قابلیت پردازش هم‌زمان هزاران سبد خرید سازمانی بدون افت سرعت.</p>

              
                <div class="mb-6 p-4 rounded-2xl bg-obsidian-950/90 border border-cyberGold-400/25">
                  <div class="text-lg font-black text-cyberGold-400">۳.۴ برابر رشد سرعت بارگذاری</div>
                  <div class="text-xs text-slate-400 mt-1">امتیاز پایداری و Core Web Vitals: ۹۹/۱۰۰</div>
                </div>
              
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-2">
                <span class="tech-pill">React / Next.js</span><span class="tech-pill">معماری API</span><span class="tech-pill">بهینه‌سازی مقیاس‌پذیر</span>
              </div>
              <div class="flex items-center justify-between gap-2">
                <button type="button" onclick="openDetailModal('projects', 'proj-2')" class="text-xs sm:text-sm font-bold text-cyberCyan-400 hover:text-cyberCyan-300 transition">
                  مشاهده مطالعه موردی ←
                </button>
                <button type="button" onclick="openShareModal('projects', 'proj-2')" class="px-3.5 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-xs text-cyberGold-300 transition">
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      
        <div class="tilt-card-container">
          <article class="tilt-card  p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              
              <div class="flex items-center justify-between gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <rect x="4" y="4" width="16" height="16" rx="4" stroke="currentColor" stroke-width="1.5"></rect>
              <path d="M8 12H16M12 8V16" stroke="#2dd4bf" stroke-width="1.5" class="svg-circuit-flow"></path>
              <circle cx="12" cy="12" r="2.4" fill="#f5c451" class="svg-pulse-node"></circle>
            </svg>
                </div>
                <span class="text-xs font-semibold text-cyberGold-300 bg-cyberGold-400/10 border border-cyberGold-400/25 px-3.5 py-1 rounded-full">
                  اتوماسیون و یکپارچه‌سازی
                </span>
              </div>

              <div class="text-xs text-slate-400 mb-2">کارفرما: شبکه توزیع و لجستیک کشوری</div>
              <h3 class="text-xl font-extrabold text-white leading-snug mb-3">خط لوله یکپارچه‌سازی لحظه‌ای انبار، CRM و پنل فروشندگان</h3>
              <p class="text-sm text-slate-300/85 leading-7 mb-5">حذف کامل ورود دستی اطلاعات میان ۴ سامانه مجزا و ساخت داشبورد پایش لحظه‌ای موجودی و ارسال مرسولات.</p>

              
                <div class="mb-6 p-4 rounded-2xl bg-obsidian-950/90 border border-cyberGold-400/25">
                  <div class="text-lg font-black text-cyberGold-400">صفر شدن خطای ثبت موجودی</div>
                  <div class="text-xs text-slate-400 mt-1">صرفه‌جویی ماهانه: بیش از ۴۲۰ نفر-ساعت</div>
                </div>
              
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-2">
                <span class="tech-pill">خط لوله داده</span><span class="tech-pill">اتصال ERP و CRM</span><span class="tech-pill">داشبورد عملیاتی</span>
              </div>
              <div class="flex items-center justify-between gap-2">
                <button type="button" onclick="openDetailModal('projects', 'proj-3')" class="text-xs sm:text-sm font-bold text-cyberCyan-400 hover:text-cyberCyan-300 transition">
                  مشاهده مطالعه موردی ←
                </button>
                <button type="button" onclick="openShareModal('projects', 'proj-3')" class="px-3.5 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-xs text-cyberGold-300 transition">
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      
        <div class="tilt-card-container">
          <article class="tilt-card  p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt="" data-tilt-bound="true">
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              
              <div class="flex items-center justify-between gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <path d="M12 3L19 6.5V12.5C19 16.8 16 20.3 12 21.5C8 20.3 5 16.8 5 12.5V6.5L12 3Z" stroke="currentColor" stroke-width="1.5"></path>
              <circle cx="12" cy="12" r="2.6" fill="#f5c451" class="svg-pulse-node"></circle>
            </svg>
                </div>
                <span class="text-xs font-semibold text-cyberGold-300 bg-cyberGold-400/10 border border-cyberGold-400/25 px-3.5 py-1 rounded-full">
                  امنیت و پایداری
                </span>
              </div>

              <div class="text-xs text-slate-400 mb-2">کارفرما: سامانه نوبت‌دهی و پرونده الکترونیک سلامت</div>
              <h3 class="text-xl font-extrabold text-white leading-snug mb-3">مقاوم‌سازی زیرساخت ابری، مدیریت دسترسی و پایش هوشمند خطا</h3>
              <p class="text-sm text-slate-300/85 leading-7 mb-5">استقرار معماری High-Availability با پشتیبان‌گیری خودکار رمزنگاری‌شده و داشبورد هشدار بلادرنگ.</p>

              
                <div class="mb-6 p-4 rounded-2xl bg-obsidian-950/90 border border-cyberGold-400/25">
                  <div class="text-lg font-black text-cyberGold-400">۹۹.۹۸٪ دسترس‌پذیری سالانه</div>
                  <div class="text-xs text-slate-400 mt-1">کاهش ۷۰ درصدی زمان پاسخ سرور (TTFB)</div>
                </div>
              
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-2">
                <span class="tech-pill">بازبینی امنیتی</span><span class="tech-pill">پایش و هشدار</span><span class="tech-pill">معماری پایدار</span>
              </div>
              <div class="flex items-center justify-between gap-2">
                <button type="button" onclick="openDetailModal('projects', 'proj-4')" class="text-xs sm:text-sm font-bold text-cyberCyan-400 hover:text-cyberCyan-300 transition">
                  مشاهده مطالعه موردی ←
                </button>
                <button type="button" onclick="openShareModal('projects', 'proj-4')" class="px-3.5 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-xs text-cyberGold-300 transition">
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      </div>
      </div>
    </div>

    <!-- ========================================== -->
    <!-- تب ۵: درباره ما (ABOUT US)                  -->
    <!-- ========================================== -->
    <div id="view-about" class="spa-view py-12 lg:py-16">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 space-y-12">
        <div class="max-w-3xl">
          <span class="text-xs font-semibold text-cyberGold-400 block mb-2">داستان و متدولوژی هایتک</span>
          <h2 class="text-3xl sm:text-4xl font-black text-white mb-4">چرا تیم‌های پیشرو با هایتک کار می‌کنند؟</h2>
          <p class="text-slate-300 text-sm sm:text-base leading-8">
            در استودیوی فناوری <strong>هایتک</strong>، ما میان تحقیق و توسعه پیشرفته و نیازهای واقعی بازار ایران پل می‌زنیم. تمرکز ما بر ساخت سیستم‌هایی است که از روز اول قابل سنجش، مستند و آماده مقیاس‌پذیری باشند.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="tilt-card-container">
            <div class="tilt-card p-7 h-full" data-tilt="" data-tilt-bound="true">
              <div class="tilt-glare"></div>
              <div class="tilt-content">
                <div class="text-xs font-mono text-cyberGold-400 mb-2">STEP 01 // DISCOVERY</div>
                <h3 class="text-lg font-bold text-white mb-2">شناخت دقیق مسئله و معماری</h3>
                <p class="text-xs sm:text-sm text-slate-300 leading-7">پیش از نوشتن اولین خط کد، گلوگاه‌های فنی، شاخص‌های کلیدی عملکرد (KPI) و معماری داده را شفاف می‌کنیم.</p>
              </div>
            </div>
          </div>

          <div class="tilt-card-container">
            <div class="tilt-card card-featured-gold p-7 h-full" data-tilt="" data-tilt-bound="true">
              <div class="tilt-glare"></div>
              <div class="tilt-content">
                <div class="text-xs font-mono text-cyberCyan-400 mb-2">STEP 02 // ENGINEERING</div>
                <h3 class="text-lg font-bold text-white mb-2">توسعه چابک و استاندارد جهانی</h3>
                <p class="text-xs sm:text-sm text-slate-300 leading-7">تحویل مرحله‌ای در اسپرینت‌های دو هفته‌ای با تست خودکار، کدنویسی تمیز و بهینه‌سازی کامل Core Web Vitals.</p>
              </div>
            </div>
          </div>

          <div class="tilt-card-container">
            <div class="tilt-card p-7 h-full" data-tilt="" data-tilt-bound="true">
              <div class="tilt-glare"></div>
              <div class="tilt-content">
                <div class="text-xs font-mono text-cyberGold-400 mb-2">STEP 03 // SCALE &amp; AI</div>
                <h3 class="text-lg font-bold text-white mb-2">پایش مستمر و هوش مصنوعی</h3>
                <p class="text-xs sm:text-sm text-slate-300 leading-7">استقرار امن روی زیرساخت ابری یا درون‌سازمانی همراه با مانیتورینگ لحظه‌ای و بهبود مستمر مدل‌های هوشمند.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ========================================== -->
    <!-- تب ۶: ارتباط با ما (CONTACT US)             -->
    <!-- ========================================== -->
    <div id="view-contact" class="spa-view py-12 lg:py-16">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

          <div class="lg:col-span-5 space-y-6">
            <div>
              <span class="text-xs font-semibold text-cyberCyan-400 block mb-2">ارتباط مستقیم با تیم مهندسی</span>
              <h2 class="text-3xl sm:text-4xl font-black text-white mb-4">گفتگو با هایتک</h2>
              <p class="text-xs sm:text-sm text-slate-300 leading-7 mb-6">
                چه برای ساخت یک محصول جدید از صفر و چه برای افزودن هوش مصنوعی و اتوماسیون به سیستم‌های فعلی خود، تیم هایتک آماده همراهی با شماست.
              </p>

              <div class="space-y-3.5">
                <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/[0.07] flex items-center gap-4">
                  <div class="w-10 h-10 rounded-xl bg-cyberGold-400/15 text-cyberGold-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="text-xs text-slate-400">پست الکترونیک رسمی هایتک</div>
                    <div id="contact-email-display" class="text-sm font-mono text-white">hello@hiitech.ir</div>
                  </div>
                </div>

                <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/[0.07] flex items-center gap-4">
                  <div class="w-10 h-10 rounded-xl bg-cyberCyan-400/15 text-cyberCyan-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="text-xs text-slate-400">دفتر مهندسی هایتک</div>
                    <div id="contact-address-display" class="text-sm text-white">تهران، ناحیه نوآوری شریف، استودیوی فناوری هایتک</div>
                  </div>
                </div>

                <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/[0.07] flex items-center gap-4">
                  <div class="w-10 h-10 rounded-xl bg-cyberGold-400/15 text-cyberGold-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="text-xs text-slate-400">ساعات پاسخ‌گویی و جلسات مشاوره</div>
                    <div class="text-sm text-white">شنبه تا چهارشنبه — ۹:۰۰ الی ۱۹:۰۰</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- فرم تعاملی ثبت درخواست مشاوره با هایتک (مجهز به Netlify Forms + ذخیره در صندوق پیام پنل مدیریت) -->
          <div class="lg:col-span-7 tilt-card-container">
            <div class="tilt-card card-featured-gold p-7 sm:p-9" data-tilt="" data-tilt-bound="true">
              <div class="tilt-glare"></div>
              <form id="hiitech-contact-form" name="hiitech-consultation" method="POST" data-netlify="true" netlify-honeypot="bot-field" onsubmit="submitContactForm(event)" class="tilt-content space-y-5">
                <input type="hidden" name="form-name" value="hiitech-consultation">
                <p class="hidden">
                  <label>پر نکنید: <input name="bot-field"></label>
                </p>

                <h3 class="text-xl font-bold text-white mb-2">ثبت درخواست جلسه مشاوره فنی</h3>

                <!-- انتخاب حوزه همکاری -->
                <div>
                  <label class="block text-xs text-slate-300 mb-2.5">حوزه مورد نیاز شما در هایتک:</label>
                  <div class="flex flex-wrap gap-2" id="service-selector">
                    <button type="button" onclick="selectServicePill(this, 'توسعه محصول وب')" class="service-pill px-3.5 py-2 rounded-xl text-xs font-medium bg-cyberGold-400 text-obsidian-950 transition">توسعه محصول وب</button>
                    <button type="button" onclick="selectServicePill(this, 'هوش مصنوعی کاربردی')" class="service-pill px-3.5 py-2 rounded-xl text-xs font-medium bg-white/[0.05] text-slate-300 border border-white/10 hover:border-cyberGold-400/40 transition">هوش مصنوعی کاربردی</button>
                    <button type="button" onclick="selectServicePill(this, 'اتوماسیون و یکپارچه‌سازی')" class="service-pill px-3.5 py-2 rounded-xl text-xs font-medium bg-white/[0.05] text-slate-300 border border-white/10 hover:border-cyberGold-400/40 transition">اتوماسیون و یکپارچه‌سازی</button>
                    <button type="button" onclick="selectServicePill(this, 'امنیت و زیرساخت')" class="service-pill px-3.5 py-2 rounded-xl text-xs font-medium bg-white/[0.05] text-slate-300 border border-white/10 hover:border-cyberGold-400/40 transition">امنیت و زیرساخت</button>
                  </div>
                  <input type="hidden" id="contact-service" name="service" value="توسعه محصول وب">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label for="contact-name" class="block text-xs text-slate-300 mb-1.5">نام و نام خانوادگی *</label>
                    <input id="contact-name" name="name" type="text" required="" placeholder="مثلاً: آرش کاظمی" class="w-full px-4 py-3 rounded-xl bg-obsidian-950/80 border border-white/10 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyberGold-400">
                  </div>
                  <div>
                    <label for="contact-info" class="block text-xs text-slate-300 mb-1.5">شماره تماس یا ایمیل کاری *</label>
                    <input id="contact-info" name="contact" type="text" required="" placeholder="0912... / name@company.ir" class="w-full px-4 py-3 rounded-xl bg-obsidian-950/80 border border-white/10 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyberGold-400">
                  </div>
                </div>

                <div>
                  <label for="contact-desc" class="block text-xs text-slate-300 mb-1.5">شرح کوتاه پروژه یا چالش فنی *</label>
                  <textarea id="contact-desc" name="message" rows="4" required="" placeholder="لطفاً درباره هدف پروژه، زمان‌بندی مدنظر یا سیستم‌های فعلی خود بنویسید..." class="w-full px-4 py-3 rounded-xl bg-obsidian-950/80 border border-white/10 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyberGold-400"></textarea>
                </div>

                <div class="pt-2 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                  <span class="text-xs text-slate-400">پشتیبانی هم‌زمان از Netlify Forms و صندوق پیام پنل مدیریت هایتک.</span>
                  <button type="submit" class="btn-cyber-gold px-8 py-3.5 rounded-full text-sm">
                    ارسال درخواست به هایتک
                  </button>
                </div>

                <!-- پیام تایید ثبت فرم -->
                <div id="contact-success-box" class="hidden mt-4 p-4 rounded-2xl bg-cyberCyan-500/15 border border-cyberCyan-400/40 text-cyberCyan-300 text-xs sm:text-sm leading-6">
                  درخواست شما با موفقیت در سیستم هایتک ثبت شد و در صندوق پیام‌های پنل مدیریت نیز قابل مشاهده است.
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- ========================================================== -->
    <!-- تب ۷: پنل مدیریت حرفه‌ای هایتک (PRO ADMIN CMS & NETLIFY)    -->
    <!-- ========================================================== -->
    <div id="view-admin" class="spa-view py-12 lg:py-16">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <!-- درگاه ورود امن مدیر هایتک (Cyber Login Gate) -->
        <div id="admin-login-gate" class="max-w-md mx-auto my-8">
          <div class="tilt-card card-featured-gold p-8 text-right">
            <div class="flex items-center justify-between mb-6">
              <span class="text-xs font-mono uppercase tracking-widest text-cyberCyan-400 bg-cyberCyan-500/10 border border-cyberCyan-400/20 px-3 py-1 rounded-full">
                HIITECH CMS v2.6
              </span>
              <span class="w-2.5 h-2.5 rounded-full bg-cyberGold-400 animate-ping"></span>
            </div>

            <h2 class="text-2xl font-black text-white mb-2">ورود به پنل مدیریت هایتک</h2>
            <p class="text-xs sm:text-sm text-slate-400 leading-6 mb-6">
              مدیریت یکپارچه مقالات هوش مصنوعی، اخبار تکنولوژی، پروژه‌ها، آپلود تصاویر و خروجی مستقیم <code class="text-cyberGold-300 font-mono">index.html</code> برای انتشار در Netlify.
            </p>

            <form onsubmit="handleAdminLogin(event)" class="space-y-4">
              <div>
                <label for="admin-passcode-input" class="block text-xs text-slate-300 mb-1.5">رمز عبور مدیریت (پیش‌فرض: <code class="text-cyberGold-400 font-mono">hiitech2026</code>)</label>
                <input id="admin-passcode-input" type="password" value="hiitech2026" placeholder="رمز عبور پنل مدیریت..." class="w-full px-4 py-3 rounded-xl bg-obsidian-950 border border-white/15 text-sm text-white font-mono focus:outline-none focus:border-cyberGold-400">
              </div>

              <div class="flex flex-col sm:flex-row gap-3 pt-2">
                <button type="submit" class="btn-cyber-gold flex-1 py-3 rounded-xl text-sm">
                  ورود به استودیوی مدیریت
                </button>
                <button type="button" onclick="unlockAdminPanel()" class="btn-cyber-glass px-4 py-3 rounded-xl text-xs font-semibold text-cyberCyan-300 border-cyberCyan-400/30">
                  ⚡ ورود سریع مدیر
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- محیط اصلی پنل مدیریت حرفه‌ای هایتک (پس از ورود) -->
        <div id="admin-workspace" class="hidden space-y-8">

          <!-- هدر بالای پنل مدیریت -->
          <div class="p-6 sm:p-8 rounded-3xl bg-gradient-to-l from-[#0d1520] via-[#0a1018] to-[#0d1722] border border-cyberGold-400/25 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div>
              <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyberGold-400/15 border border-cyberGold-400/30 mb-3">
                <span class="w-2 h-2 rounded-full bg-cyberGold-400 animate-pulse"></span>
                <span class="text-xs font-bold text-cyberGold-300">پنل مدیریت حرفه‌ای هایتک • آماده انتشار در Netlify</span>
              </div>
              <h2 class="text-2xl sm:text-3xl font-black text-white">استودیوی مدیریت محتوا و استقرار ابری هایتک</h2>
              <p class="text-xs sm:text-sm text-slate-400 mt-1.5">
                هر خبر، مقاله یا پروژه‌ای که آپلود کنید بلافاصله در سایت فعال می‌شود و با یک کلیک می‌توانید فایل نهایی <code class="text-cyberCyan-300 font-mono">index.html</code> را برای بارگذاری در Netlify دریافت کنید.
              </p>
            </div>

            <div class="flex flex-wrap items-center gap-3 shrink-0">
              <button type="button" onclick="downloadBakedNetlifyHTML()" class="btn-cyber-gold px-5 py-3 rounded-2xl text-xs sm:text-sm inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <span>دانلود index.html آماده Netlify</span>
              </button>

              <button type="button" onclick="switchAdminSubtab('upload'); resetAdminForm();" class="btn-cyber-glass px-4 py-3 rounded-2xl text-xs sm:text-sm font-semibold text-cyberCyan-300 border-cyberCyan-400/30">
                + پست یا پروژه جدید
              </button>
            </div>
          </div>

          <!-- نوار تب‌های داخلی پنل مدیریت -->
          <div class="flex flex-wrap items-center gap-2.5 border-b border-white/10 pb-4">
            <button type="button" onclick="switchAdminSubtab('dashboard')" data-admin-subtab="dashboard" class="admin-subtab-btn active">
              <span>🚀 داشبورد و انتشار در Netlify</span>
            </button>
            <button type="button" onclick="switchAdminSubtab('upload')" data-admin-subtab="upload" class="admin-subtab-btn">
              <span>📤 آپلود و مدیریت محتوا (اخبار، وبلاگ، پروژه)</span>
            </button>
            <button type="button" onclick="switchAdminSubtab('settings')" data-admin-subtab="settings" class="admin-subtab-btn">
              <span>🎨 ویرایشگر صفحه اصلی و آمار</span>
            </button>
            <button type="button" onclick="switchAdminSubtab('inbox')" data-admin-subtab="inbox" class="admin-subtab-btn">
              <span>📥 صندوق پیام‌های دریافتی</span>
              <span id="admin-inbox-badge" class="px-2 py-0.5 text-[11px] rounded-full bg-cyberCyan-500/20 text-cyberCyan-300 font-mono">۱</span>
            </button>
          </div>

          <!-- ================================================= -->
          <!-- زیرتب ۱: داشبورد و استودیوی انتشار در Netlify     -->
          <!-- ================================================= -->
          <div id="admin-subview-dashboard" class="admin-subview space-y-8">
            <!-- کارت‌های شمارنده زنده محتوا -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
              <div class="p-6 rounded-2xl bg-white/[0.03] border border-white/[0.08]">
                <div class="text-xs text-slate-400 mb-2">اخبار تکنولوژی منتشرشده</div>
                <div id="stat-count-news" class="text-3xl font-black text-cyberCyan-400 font-mono">۳</div>
                <button type="button" onclick="switchAdminSubtab('upload'); setAdminContentSection('news');" class="text-xs text-cyberGold-400 mt-3 inline-block hover:underline">مدیریت اخبار ←</button>
              </div>

              <div class="p-6 rounded-2xl bg-white/[0.03] border border-white/[0.08]">
                <div class="text-xs text-slate-400 mb-2">مقالات وبلاگ هوش مصنوعی</div>
                <div id="stat-count-blog" class="text-3xl font-black text-cyberGold-400 font-mono">۲</div>
                <button type="button" onclick="switchAdminSubtab('upload'); setAdminContentSection('blog');" class="text-xs text-cyberGold-400 mt-3 inline-block hover:underline">مدیریت وبلاگ ←</button>
              </div>

              <div class="p-6 rounded-2xl bg-white/[0.03] border border-white/[0.08]">
                <div class="text-xs text-slate-400 mb-2">پروژه‌های هایتک</div>
                <div id="stat-count-projects" class="text-3xl font-black text-white font-mono">۴</div>
                <button type="button" onclick="switchAdminSubtab('upload'); setAdminContentSection('projects');" class="text-xs text-cyberGold-400 mt-3 inline-block hover:underline">مدیریت پروژه‌ها ←</button>
              </div>

              <div class="p-6 rounded-2xl bg-white/[0.03] border border-white/[0.08]">
                <div class="text-xs text-slate-400 mb-2">پیام‌های مشاوره دریافتی</div>
                <div id="stat-count-inbox" class="text-3xl font-black text-cyberCyan-300 font-mono">۱</div>
                <button type="button" onclick="switchAdminSubtab('inbox');" class="text-xs text-cyberGold-400 mt-3 inline-block hover:underline">مشاهده پیام‌ها ←</button>
              </div>
            </div>

            <!-- راهنما و استودیوی انتشار بدون سرور در Netlify -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
              <!-- باکس اصلی تولید فایل نهایی برای Netlify Drop -->
              <div class="lg:col-span-7 p-7 rounded-3xl bg-gradient-to-br from-[#0e1726] to-[#080d14] border border-cyberGold-400/30 flex flex-col justify-between">
                <div>
                  <span class="text-xs font-mono uppercase text-cyberGold-400 bg-cyberGold-400/10 px-3 py-1 rounded-full">
                    ZERO-BACKEND NETLIFY DEPLOYMENT
                  </span>
                  <h3 class="text-xl sm:text-2xl font-extrabold text-white mt-4 mb-3">
                    چگونه مطالب و تصاویر جدید را برای تمام کاربران در Netlify منتشر کنیم؟
                  </h3>
                  <p class="text-xs sm:text-sm text-slate-300 leading-7 mb-5">
                    از آنجا که سایت شما روی <strong>Netlify</strong> بدون نیاز به دیتابیس خارجی میزبانی می‌شود، این پنل مجهز به <strong>موتور تزریق خودکار داده (HTML Compiler)</strong> است:
                  </p>
                  <ol class="text-xs sm:text-sm text-slate-300 space-y-2.5 mb-7 list-decimal list-inside">
                    <li>از تب <strong>«آپلود و مدیریت محتوا»</strong> خبر، مقاله هوش مصنوعی یا پروژه جدید خود را به همراه تصویر اضافه یا ویرایش کنید.</li>
                    <li>روی دکمه طلایی زیر کلیک کنید تا فایل کامل <code class="text-cyberGold-300 font-mono">index.html</code> حاوی تمامی مطالب و تصاویر جدید شما تولید و دانلود شود.</li>
                    <li>فایل <code class="text-cyberGold-300 font-mono">index.html</code> دانلودشده را در <strong>app.netlify.com/drop</strong> یا مخزن گیت خود قرار دهید تا برای کل دنیا به‌روز شود!</li>
                  </ol>
                </div>

                <div class="flex flex-wrap items-center gap-3 pt-4 border-t border-white/10">
                  <button type="button" onclick="downloadBakedNetlifyHTML()" class="btn-cyber-gold px-6 py-3.5 rounded-2xl text-xs sm:text-sm inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span>دانلود فایل نهایی index.html (آماده بارگذاری در Netlify)</span>
                  </button>

                  <button type="button" onclick="exportCMSDatabaseJSON()" class="btn-cyber-glass px-4 py-3.5 rounded-2xl text-xs font-semibold">
                    دانلود بکاپ JSON
                  </button>
                </div>
              </div>

              <!-- باکس Netlify Build Hook و بازیابی بکاپ -->
              <div class="lg:col-span-5 p-7 rounded-3xl bg-white/[0.02] border border-white/10 flex flex-col justify-between space-y-6">
                <div>
                  <h4 class="text-lg font-bold text-white mb-2">اتصال به وب‌هوک ساخت خودکار (Netlify Build Hook)</h4>
                  <p class="text-xs text-slate-400 leading-6 mb-4">
                    اگر سایت خود را از طریق Git به Netlify متصل کرده‌اید، آدرس Build Hook خود را وارد کنید تا با یک کلیک فرمان بیلد مجدد به سرور Netlify ارسال شود:
                  </p>
                  <div class="space-y-3">
                    <input id="netlify-hook-url" type="url" placeholder="https://api.netlify.com/build_hooks/..." class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white font-mono focus:outline-none focus:border-cyberCyan-400">
                    <button type="button" onclick="triggerNetlifyBuildHook()" class="w-full py-2.5 rounded-xl bg-cyberCyan-500/15 hover:bg-cyberCyan-500/25 text-cyberCyan-300 border border-cyberCyan-400/30 text-xs font-bold transition">
                      ⚡ ارسال فرمان انتشار ابری به Netlify
                    </button>
                  </div>
                </div>

                <!-- درون‌ریزی (Import) JSON یا بازنشانی -->
                <div class="pt-5 border-t border-white/10 space-y-3">
                  <div class="text-xs font-semibold text-slate-300">بروزرسانی از فایل بکاپ JSON یا بازنشانی:</div>
                  <div class="flex flex-wrap gap-2.5">
                    <label class="btn-cyber-glass px-4 py-2.5 rounded-xl text-xs cursor-pointer inline-flex items-center gap-1.5">
                      <span>📂 بارگذاری فایل JSON</span>
                      <input type="file" accept=".json" onchange="importCMSDatabaseJSON(event)" class="hidden">
                    </label>
                    <button type="button" onclick="resetCMSToFactoryDefaults()" class="px-4 py-2.5 rounded-xl bg-rose-500/10 hover:bg-rose-500/20 text-rose-300 border border-rose-500/25 text-xs font-medium transition">
                      بازگردانی داده‌های پیش‌فرض هایتک
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ========================================================= -->
          <!-- زیرتب ۲: آپلود و مدیریت محتوا (اخبار، وبلاگ AI، پروژه‌ها)   -->
          <!-- ========================================================= -->
          <div id="admin-subview-upload" class="admin-subview hidden space-y-10">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

              <!-- ستون فرم ساخت/ویرایش و آپلودر تصویر (۷ ستون) -->
              <div class="lg:col-span-7 p-6 sm:p-8 rounded-3xl bg-white/[0.02] border border-white/10">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-white/10">
                  <div>
                    <span id="editor-mode-badge" class="text-xs font-semibold text-cyberGold-400">افزودن محتوای جدید به سایت هایتک</span>
                    <h3 id="editor-form-heading" class="text-xl font-extrabold text-white mt-1">انتشار مطلب یا پروژه جدید</h3>
                  </div>
                  <button type="button" onclick="resetAdminForm()" class="text-xs text-slate-400 hover:text-white px-3 py-1.5 rounded-lg bg-white/[0.04]">
                    پاک کردن فرم
                  </button>
                </div>

                <form id="cms-content-form" onsubmit="saveCMSContentItem(event)" class="space-y-5">
                  <input type="hidden" id="cms-edit-id" value="">

                  <!-- انتخاب بخش مقصد (اخبار، وبلاگ هوش مصنوعی، پروژه‌های ما) -->
                  <div>
                    <label class="block text-xs text-slate-300 mb-2">۱. انتخاب بخش انتشار در سایت هایتک *</label>
                    <div class="grid grid-cols-3 gap-2.5">
                      <button type="button" onclick="setAdminContentSection('news')" data-sec-pick="news" class="py-2.5 px-3 rounded-xl text-xs font-bold bg-cyberGold-400 text-obsidian-950 transition">
                        آخرین اخبار تکنولوژی
                      </button>
                      <button type="button" onclick="setAdminContentSection('blog')" data-sec-pick="blog" class="py-2.5 px-3 rounded-xl text-xs font-medium bg-white/[0.04] text-slate-300 border border-white/10 transition">
                        وبلاگ هوش مصنوعی
                      </button>
                      <button type="button" onclick="setAdminContentSection('projects')" data-sec-pick="projects" class="py-2.5 px-3 rounded-xl text-xs font-medium bg-white/[0.04] text-slate-300 border border-white/10 transition">
                        پروژه‌های ما
                      </button>
                    </div>
                    <input type="hidden" id="cms-section-input" value="news">
                  </div>

                  <!-- عنوان و دسته‌بندی -->
                  <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="sm:col-span-2">
                      <label for="cms-title-input" class="block text-xs text-slate-300 mb-1.5">عنوان اصلی مطلب / پروژه *</label>
                      <input id="cms-title-input" type="text" required="" oninput="updateLiveAdminCardPreview()" placeholder="مثلاً: طراحی دستیار هوشمند صوتی فارسی در هایتک" class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-sm text-white focus:outline-none focus:border-cyberGold-400">
                    </div>

                    <div id="cms-category-wrapper">
                      <label for="cms-cat-select" class="block text-xs text-slate-300 mb-1.5">دسته‌بندی فیلتر *</label>
                      <select id="cms-cat-select" onchange="updateLiveAdminCardPreview()" class="w-full px-3 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white focus:outline-none focus:border-cyberGold-400">
                        <option value="ai">هوش مصنوعی</option>
                        <option value="web">مهندسی وب</option>
                        <option value="cloud">ابر و امنیت</option>
                        <option value="automation">اتوماسیون سازمانی</option>
                      </select>
                    </div>
                  </div>

                  <!-- زیرعنوان / زمان مطالعه / نام مشتری -->
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                      <label for="cms-meta-input" class="block text-xs text-slate-300 mb-1.5">تاریخ / زمان مطالعه / نام کارفرما</label>
                      <input id="cms-meta-input" type="text" oninput="updateLiveAdminCardPreview()" placeholder="مثلاً: آبان ۱۴۰۵ • مطالعه ۵ دقیقه" class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white focus:outline-none focus:border-cyberGold-400">
                    </div>
                    <div>
                      <label for="cms-badge-input" class="block text-xs text-slate-300 mb-1.5">برچسب بالای کارت (Badge)</label>
                      <input id="cms-badge-input" type="text" oninput="updateLiveAdminCardPreview()" placeholder="مثلاً: هوش مصنوعی کاربردی" class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white focus:outline-none focus:border-cyberGold-400">
                    </div>
                  </div>

                  <!-- فیلدهای ویژه پروژه (شاخص دستاورد کمی) -->
                  <div id="cms-project-metrics-row" class="hidden grid-cols-1 sm:grid-cols-2 gap-4 p-4 rounded-2xl bg-cyberGold-400/[0.05] border border-cyberGold-400/20">
                    <div>
                      <label for="cms-metric-val" class="block text-xs text-cyberGold-300 mb-1">شاخص دستاورد پروژه (بزرگ)</label>
                      <input id="cms-metric-val" type="text" oninput="updateLiveAdminCardPreview()" placeholder="مثلاً: ۸۵٪ کاهش زمان پاسخ‌گویی" class="w-full px-3.5 py-2 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white">
                    </div>
                    <div>
                      <label for="cms-metric-sub" class="block text-xs text-cyberGold-300 mb-1">توضیح مکمل شاخص</label>
                      <input id="cms-metric-sub" type="text" oninput="updateLiveAdminCardPreview()" placeholder="مثلاً: دقت بازیابی اسناد: ۹۶.۲٪" class="w-full px-3.5 py-2 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white">
                    </div>
                  </div>

                  <!-- خلاصه کارت -->
                  <div>
                    <label for="cms-excerpt-input" class="block text-xs text-slate-300 mb-1.5">خلاصه کوتاه روی کارت (۲ تا ۳ خط) *</label>
                    <textarea id="cms-excerpt-input" rows="2" required="" oninput="updateLiveAdminCardPreview()" placeholder="خلاصه جذابی که روی کارت سه‌بعدی و در کارت اشتراک‌گذاری شبکه‌های اجتماعی نمایش داده می‌شود..." class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs sm:text-sm text-white focus:outline-none focus:border-cyberGold-400"></textarea>
                  </div>

                  <!-- متن کامل مقاله / جزئیات فنی -->
                  <div>
                    <label for="cms-content-input" class="block text-xs text-slate-300 mb-1.5">متن کامل مقاله، خبر یا مطالعه موردی پروژه *</label>
                    <textarea id="cms-content-input" rows="5" required="" placeholder="متن کامل را اینجا بنویسید (پاراگراف‌ها به صورت خودکار فرمت‌بندی می‌شوند)..." class="w-full px-4 py-3 rounded-xl bg-obsidian-950 border border-white/10 text-xs sm:text-sm text-white leading-7 focus:outline-none focus:border-cyberGold-400"></textarea>
                  </div>

                  <!-- تگ‌های فنی -->
                  <div>
                    <label for="cms-tags-input" class="block text-xs text-slate-300 mb-1.5">تگ‌های تخصصی (با کاما یا ویرگول جدا کنید)</label>
                    <input id="cms-tags-input" type="text" oninput="updateLiveAdminCardPreview()" placeholder="RAG سازمانی، پردازش زبان فارسی، Next.js" class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white focus:outline-none focus:border-cyberGold-400">
                  </div>

                  <!-- آپلودر تصویر با فشرده‌سازی خودکار سمت کاربر + گرافیک‌های وکتور سایبری -->
                  <div class="p-4 rounded-2xl bg-obsidian-950/90 border border-white/10 space-y-4">
                    <div class="flex items-center justify-between">
                      <label class="text-xs font-bold text-cyberCyan-300">۲. تصویر کاور یا ویژوالایزر سایبری کارت</label>
                      <button type="button" onclick="clearUploadedCoverImage()" class="text-[11px] text-rose-400 hover:underline">
                        حذف تصویر کاور
                      </button>
                    </div>

                    <!-- ناحیه Drag & Drop آپلود عکس از کامپیوتر یا موبایل -->
                    <div id="media-dropzone" class="dropzone-box rounded-2xl p-5 text-center cursor-pointer" onclick="document.getElementById('cms-image-file').click()" ondragover="event.preventDefault(); this.classList.add('dragover');" ondragleave="this.classList.remove('dragover');" ondrop="handleImageDrop(event)">
                      <input id="cms-image-file" type="file" accept="image/*" onchange="handleImageFileSelect(event)" class="hidden">
                      <div class="text-xs sm:text-sm font-semibold text-white mb-1">
                        📸 برای آپلود تصویر کلیک کنید یا فایل را اینجا رها کنید
                      </div>
                      <div class="text-[11px] text-slate-400">
                        فشرده‌سازی هوشمند در مرورگر (WebP/JPEG) برای بارگذاری آنی در Netlify بدون نیاز به سرور خارجی
                      </div>
                    </div>

                    <!-- یا آدرس مستقیم تصویر -->
                    <div>
                      <input id="cms-image-url-input" type="text" oninput="handleExternalImageUrl(this.value)" placeholder="یا لینک مستقیم تصویر (URL) را اینجا قرار دهید..." class="w-full px-3.5 py-2 rounded-xl bg-black/50 border border-white/10 text-xs text-white font-mono focus:outline-none focus:border-cyberCyan-400">
                    </div>

                    <!-- انتخاب آیکون/ویژوالایزر متحرک سایبری هایتک -->
                    <div>
                      <span class="block text-[11px] text-slate-400 mb-2">تم گرافیکی وکتور سایبری (در صورت عدم استفاده از عکس یا به عنوان نشان کارت):</span>
                      <div class="grid grid-cols-3 sm:grid-cols-6 gap-2" id="svg-preset-picker">
                        <button type="button" onclick="selectSvgPreset('circuit-core')" data-svg-pick="circuit-core" class="p-2 rounded-xl border border-cyberGold-400 bg-cyberGold-400/10 text-[11px] text-cyberGold-300 font-medium">مدار و هسته</button>
                        <button type="button" onclick="selectSvgPreset('neural-mesh')" data-svg-pick="neural-mesh" class="p-2 rounded-xl border border-white/10 bg-white/[0.03] text-[11px] text-slate-300">شبکه عصبی</button>
                        <button type="button" onclick="selectSvgPreset('quantum-shield')" data-svg-pick="quantum-shield" class="p-2 rounded-xl border border-white/10 bg-white/[0.03] text-[11px] text-slate-300">سپر امنیت</button>
                        <button type="button" onclick="selectSvgPreset('cloud-matrix')" data-svg-pick="cloud-matrix" class="p-2 rounded-xl border border-white/10 bg-white/[0.03] text-[11px] text-slate-300">ماتریس ابری</button>
                        <button type="button" onclick="selectSvgPreset('vision-ocr')" data-svg-pick="vision-ocr" class="p-2 rounded-xl border border-white/10 bg-white/[0.03] text-[11px] text-slate-300">بینایی ماشین</button>
                        <button type="button" onclick="selectSvgPreset('data-pipeline')" data-svg-pick="data-pipeline" class="p-2 rounded-xl border border-white/10 bg-white/[0.03] text-[11px] text-slate-300">پایپ‌لاین داده</button>
                      </div>
                      <input type="hidden" id="cms-svg-preset" value="circuit-core">
                    </div>
                  </div>

                  <!-- گزینه ویژه کردن کارت (کادر طلایی) -->
                  <div class="flex items-center justify-between pt-2">
                    <label class="inline-flex items-center gap-2.5 cursor-pointer text-xs text-slate-200">
                      <input id="cms-featured-checkbox" type="checkbox" onchange="updateLiveAdminCardPreview()" class="w-4 h-4 accent-cyberGold-400 rounded">
                      <span>نمایش به عنوان کارت ویژه با درخشش طلایی هایتک</span>
                    </label>

                    <button type="submit" class="btn-cyber-gold px-8 py-3.5 rounded-full text-xs sm:text-sm">
                      ذخیره و انتشار آنی در سایت
                    </button>
                  </div>
                </form>
              </div>

              <!-- ستون پیش‌نمایش زنده سه‌بعدی کارت (۵ ستون) -->
              <div class="lg:col-span-5 space-y-6 sticky top-24">
                <div class="p-6 rounded-3xl bg-white/[0.02] border border-white/10">
                  <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold text-cyberCyan-400">پیش‌نمایش زنده کارت سه‌بعدی (3D Live Preview)</span>
                    <span class="text-[11px] font-mono text-slate-500">PERSPECTIVE: 1200PX</span>
                  </div>

                  <div id="admin-live-card-preview" class="tilt-card-container">
                    <!-- با جاوااسکریپت به صورت زنده رندر می‌شود -->
                  </div>
                </div>

                <!-- راهنمای اشتراک‌گذاری مستقیم -->
                <div class="p-5 rounded-2xl bg-cyberCyan-500/[0.06] border border-cyberCyan-400/20 text-xs text-slate-300 leading-6">
                  💡 <strong>قابلیت اشتراک‌گذاری مستقیم:</strong> پس از انتشار هر مطلب، دکمه <strong>«اشتراک‌گذاری»</strong> روی کارت فعال می‌شود که علاوه بر لینک مستقیم، یک <strong>تصویر پوستر اختصاصی با برند هایتک</strong> برای استوری/پست اینستاگرام و تلگرام شما تولید می‌کند.
                </div>
              </div>

            </div>

            <!-- فهرست تمامی مطالب موجود در سایت برای ویرایش، حذف یا اشتراک‌گذاری -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white/[0.02] border border-white/10">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                  <h3 class="text-xl font-extrabold text-white">مدیریت مطالب منتشرشده در سایت هایتک</h3>
                  <p class="text-xs text-slate-400 mt-1">هر مورد را می‌توانید ویرایش، حذف، ویژه یا در شبکه‌های اجتماعی اشتراک‌گذاری کنید.</p>
                </div>

                <div class="flex flex-wrap gap-2" id="admin-list-filter">
                  <button type="button" onclick="renderAdminContentList('all')" data-adm-filter="all" class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-cyberGold-400 text-obsidian-950">همه بخش‌ها</button>
                  <button type="button" onclick="renderAdminContentList('news')" data-adm-filter="news" class="px-3.5 py-1.5 rounded-full text-xs bg-white/[0.05] text-slate-300">اخبار تکنولوژی</button>
                  <button type="button" onclick="renderAdminContentList('blog')" data-adm-filter="blog" class="px-3.5 py-1.5 rounded-full text-xs bg-white/[0.05] text-slate-300">وبلاگ هوش مصنوعی</button>
                  <button type="button" onclick="renderAdminContentList('projects')" data-adm-filter="projects" class="px-3.5 py-1.5 rounded-full text-xs bg-white/[0.05] text-slate-300">پروژه‌های ما</button>
                </div>
              </div>

              <div id="admin-existing-items-list" class="space-y-3">
                <!-- لیست آیتم‌ها با جاوااسکریپت رندر می‌شود -->
              </div>
            </div>

          </div>

          <!-- ========================================================= -->
          <!-- زیرتب ۳: ویرایشگر صفحه اصلی، آمار و اطلاعات تماس هایتک     -->
          <!-- ========================================================= -->
          <div id="admin-subview-settings" class="admin-subview hidden">
            <div class="p-6 sm:p-8 rounded-3xl bg-white/[0.02] border border-white/10 max-w-4xl">
              <h3 class="text-xl font-extrabold text-white mb-2">ویرایشگر تایپوگرافی صفحه اصلی و شاخص‌های عملکرد هایتک</h3>
              <p class="text-xs text-slate-400 mb-6">تغییرات این بخش بلافاصله روی صفحه اصلی اعمال شده و در خروجی Netlify ذخیره می‌گردند.</p>

              <form onsubmit="saveSiteSettingsForm(event)" class="space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-xs text-slate-300 mb-1.5">نشان بالای عنوان (Hero Badge)</label>
                    <input id="set-hero-badge" type="text" class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white">
                  </div>
                  <div>
                    <label class="block text-xs text-slate-300 mb-1.5">عنوان اصلی H1 (پیش‌فرض: سلام به دنیای فناوری)</label>
                    <input id="set-hero-h1" type="text" class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white font-bold">
                  </div>
                </div>

                <div>
                  <label class="block text-xs text-slate-300 mb-1.5">توضیحات زیر عنوان اصلی صفحه اول</label>
                  <textarea id="set-hero-desc" rows="3" class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs sm:text-sm text-white leading-7"></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                  <div class="p-4 rounded-2xl bg-obsidian-950/80 border border-white/10 space-y-2">
                    <label class="block text-[11px] text-cyberGold-400">شاخص اول (مقدار و عنوان)</label>
                    <input id="set-m1-val" type="text" class="w-full px-3 py-1.5 rounded-lg bg-black/50 border border-white/10 text-xs text-white font-bold">
                    <input id="set-m1-lbl" type="text" class="w-full px-3 py-1.5 rounded-lg bg-black/50 border border-white/10 text-xs text-slate-300">
                  </div>
                  <div class="p-4 rounded-2xl bg-obsidian-950/80 border border-white/10 space-y-2">
                    <label class="block text-[11px] text-cyberGold-400">شاخص دوم (مقدار و عنوان)</label>
                    <input id="set-m2-val" type="text" class="w-full px-3 py-1.5 rounded-lg bg-black/50 border border-white/10 text-xs text-white font-bold">
                    <input id="set-m2-lbl" type="text" class="w-full px-3 py-1.5 rounded-lg bg-black/50 border border-white/10 text-xs text-slate-300">
                  </div>
                  <div class="p-4 rounded-2xl bg-obsidian-950/80 border border-white/10 space-y-2">
                    <label class="block text-[11px] text-cyberGold-400">شاخص سوم (مقدار و عنوان)</label>
                    <input id="set-m3-val" type="text" class="w-full px-3 py-1.5 rounded-lg bg-black/50 border border-white/10 text-xs text-white font-bold">
                    <input id="set-m3-lbl" type="text" class="w-full px-3 py-1.5 rounded-lg bg-black/50 border border-white/10 text-xs text-slate-300">
                  </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                  <div>
                    <label class="block text-xs text-slate-300 mb-1.5">ایمیل رسمی هایتک</label>
                    <input id="set-contact-email" type="text" class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white font-mono">
                  </div>
                  <div>
                    <label class="block text-xs text-slate-300 mb-1.5">آدرس دفتر مهندسی هایتک</label>
                    <input id="set-contact-address" type="text" class="w-full px-4 py-2.5 rounded-xl bg-obsidian-950 border border-white/10 text-xs text-white">
                  </div>
                </div>

                <div class="pt-4 flex justify-end">
                  <button type="submit" class="btn-cyber-gold px-8 py-3.5 rounded-full text-xs sm:text-sm">
                    ذخیره تنظیمات صفحه اصلی هایتک
                  </button>
                </div>
              </form>
            </div>
          </div>

          <!-- ========================================================= -->
          <!-- زیرتب ۴: صندوق پیام‌های دریافتی (Contact Inbox)            -->
          <!-- ========================================================= -->
          <div id="admin-subview-inbox" class="admin-subview hidden">
            <div class="p-6 sm:p-8 rounded-3xl bg-white/[0.02] border border-white/10">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                  <h3 class="text-xl font-extrabold text-white">صندوق درخواست‌های جلسه مشاوره هایتک</h3>
                  <p class="text-xs text-slate-400 mt-1">تمامی فرم‌های ارسال‌شده در بخش «ارتباط با ما» در اینجا و در پنل Netlify Forms ذخیره می‌شوند.</p>
                </div>
              </div>

              <div id="admin-inbox-list" class="space-y-4">
                <!-- پیام‌های دریافتی با جاوااسکریپت رندر می‌شوند -->
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </main>

  <!-- ========================================== -->
  <!-- ۳. مودال مطالعه کامل مقالات، اخبار و پروژه‌ها -->
  <!-- ========================================== -->
  <div id="detail-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 bg-black/80 backdrop-blur-md" onclick="if(event.target === this) closeDetailModal()">
    <div class="relative w-full max-w-2xl rounded-3xl bg-[#0b111a] border border-white/15 p-6 sm:p-9 shadow-2xl max-h-[88vh] overflow-y-auto text-right">
        <div class=" rounded-xl overflow-hidden border border-white/10 bg-[#05080c] flex items-center justify-center">
          <canvas id="social-card-canvas" width="1080" height="1080" class="w-full max-w-[320px] aspect-square block"></canvas>
        </div>
      </div>
    </div>
  

  <!-- ========================================================================= -->
  <!-- ۳.۸. مودال دریافت و کپی ۳ فایل مجزا برای دیپلوی (index.html + styles.css + app.js) -->
  <!-- ========================================================================= -->
  <div id="deploy-3files-modal" class="fixed inset-0 z-50 items-center justify-center p-4 sm:p-6 bg-black/85 backdrop-blur-md hidden" onclick="if(event.target === this) closeDeploy3FilesModal()">
    <div class="relative w-full max-w-4xl rounded-3xl bg-[#0a1018] border border-emerald-400/35 p-6 sm:p-8 shadow-2xl max-h-[92vh] overflow-y-auto text-right">
      <button type="button" onclick="closeDeploy3FilesModal()" class="absolute top-5 left-5 w-9 h-9 rounded-full bg-white/[0.06] hover:bg-white/15 flex items-center justify-center text-slate-300 transition" aria-label="بستن پنجره پکیج دیپلوی">
        ✕
      </button>

      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-500/10 border border-emerald-400/30 mb-3">
        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
        <span class="text-xs font-bold text-emerald-300">پکیج استاندارد دیپلوی ۳ فایلی هایتک (Production Ready)</span>
      </div>

      <h3 class="text-xl sm:text-2xl font-black text-white mb-2">
        دریافت ۳ فایل مجزای <code class="text-cyberGold-400 font-mono">index.html</code> ، <code class="text-cyberCyan-400 font-mono">styles.css</code> و <code class="text-emerald-400 font-mono">app.js</code>
      </h3>
      <p class="text-xs sm:text-sm text-slate-300 leading-7 mb-6">
        کافی است هر ۳ فایل زیر را دانلود کرده و در یک پوشه کنار هم قرار دهید (یا پوشه را مستقیماً در <strong>Netlify Drop</strong> رها کنید). فایل <code class="text-cyberGold-300 font-mono">index.html</code> به‌صورت خودکار به <code class="text-cyberCyan-300 font-mono">styles.css</code> و <code class="text-emerald-300 font-mono">app.js</code> متصل شده است.
      </p>

      <!-- دکمه‌های دانلود مستقیم تک‌کلیکی -->
      <div class="grid grid-cols-1 sm:grid-cols-4 gap-3 mb-6">
        <button type="button" onclick="downloadAllThreeFiles()" class="btn-cyber-gold py-3.5 px-4 rounded-2xl text-xs sm:text-sm font-black flex items-center justify-center gap-2 shadow-lg">
          <span>🚀 دانلود هر ۳ فایل با هم</span>
        </button>

        <button type="button" onclick="downloadSingleSeparatedFile('html')" class="py-3.5 px-4 rounded-2xl bg-white/[0.05] hover:bg-white/[0.1] border border-cyberGold-400/35 text-xs font-mono font-bold text-cyberGold-300 flex items-center justify-center gap-2 transition">
          <span>⬇️ ۱. index.html</span>
        </button>

        <button type="button" onclick="downloadSingleSeparatedFile('css')" class="py-3.5 px-4 rounded-2xl bg-white/[0.05] hover:bg-white/[0.1] border border-cyberCyan-400/35 text-xs font-mono font-bold text-cyberCyan-300 flex items-center justify-center gap-2 transition">
          <span>⬇️ ۲. styles.css</span>
        </button>

        <button type="button" onclick="downloadSingleSeparatedFile('js')" class="py-3.5 px-4 rounded-2xl bg-white/[0.05] hover:bg-white/[0.1] border border-emerald-400/35 text-xs font-mono font-bold text-emerald-300 flex items-center justify-center gap-2 transition">
          <span>⬇️ ۳. app.js</span>
        </button>
      </div>

      <!-- تب‌های مشاهده و کپی کد هر یک از ۳ فایل -->
      <div class="rounded-2xl bg-obsidian-950 border border-white/10 overflow-hidden">
        <div class="flex flex-wrap items-center justify-between gap-2 px-4 py-3 bg-white/[0.03] border-b border-white/10">
          <div class="flex items-center gap-2">
            <button type="button" onclick="switchDeployCodeTab('html')" data-deploy-tab="html" class="px-3.5 py-1.5 rounded-xl text-xs font-mono font-bold bg-cyberGold-400 text-obsidian-950 transition">
              1. index.html
            </button>
            <button type="button" onclick="switchDeployCodeTab('css')" data-deploy-tab="css" class="px-3.5 py-1.5 rounded-xl text-xs font-mono font-medium bg-white/[0.05] text-slate-300 hover:text-white transition">
              2. styles.css
            </button>
            <button type="button" onclick="switchDeployCodeTab('js')" data-deploy-tab="js" class="px-3.5 py-1.5 rounded-xl text-xs font-mono font-medium bg-white/[0.05] text-slate-300 hover:text-white transition">
              3. app.js
            </button>
          </div>

          <button type="button" onclick="copyDeployCodeTab()" class="px-4 py-1.5 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 border border-emerald-400/40 text-xs font-bold text-emerald-300 transition">
            📋 کپی کد این فایل
          </button>
        </div>

        <div class="p-4" dir="ltr">
          <textarea id="deploy-code-viewer" readonly="" rows="12" class="w-full bg-transparent text-xs font-mono text-slate-200 focus:outline-none resize-y leading-relaxed"></textarea>
        </div>
      </div>
    </div>
  </div>


<?php
get_footer();

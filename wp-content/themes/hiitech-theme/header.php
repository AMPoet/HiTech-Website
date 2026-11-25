<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl" class="dark scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="استودیوی فناوری هایتک؛ تبدیل ایده‌ها به محصولات دیجیتال دقیق، از معماری وب و اتوماسیون فرایندها تا مدل‌های هوش مصنوعی و زیرساخت امن.">
  <meta name="theme-color" content="#060a0e">

  <!-- فونت فارسی وزیرمتن (Vazirmatn) و فونت انگلیسی JetBrains Mono برای تگ‌های فنی -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">

  <?php wp_head(); ?>
</head>
<body <?php body_class( 'selection:bg-cyberGold-400 selection:text-obsidian-950 flex flex-col justify-between app-booted' ); ?>>
<?php wp_body_open(); ?>


  <!-- محفظه اعلان‌های شناور سایبری (جایگزین استاندارد بدون alert) -->
  <div id="cyber-toast-container" aria-live="polite"></div>

  <!-- ========================================================= -->
  <!-- ۰. انیمیشن سینمایی ریلود و راه‌اندازی هسته هایتک (Preloader) -->
  <!-- ========================================================= -->
  <div id="hiitech-preloader" role="status" aria-live="polite" aria-label="در حال بارگذاری وب‌سایت هایتک" class="preloader-burst preloader-hidden">
    <div class="preloader-cyber-grid"></div>
    <canvas id="preloader-particle-canvas" class="absolute inset-0 w-full h-full pointer-events-none" width="1678" height="742"></canvas>

    <!-- بخش مرکزی: حلقه‌های مداری + مدارهای نئونی + لوگوی ۱۸px هایتک -->
    <div class="relative flex flex-col items-center justify-center px-6 w-full max-w-md z-10">

      <div class="relative w-64 h-64 flex items-center justify-center mb-6">
        <!-- موج‌های ضربه انرژی (Shockwaves) -->
        <div class="absolute w-32 h-32 rounded-[26px] border border-cyberGold-400/40 preloader-shockwave pointer-events-none"></div>
        <div class="absolute w-32 h-32 rounded-[26px] border border-cyberCyan-400/35 preloader-shockwave-delayed pointer-events-none"></div>

        <!-- حلقه‌های مداری چرخان و خطوط مدار چاپی SVG -->
        <svg viewBox="0 0 260 260" class="absolute inset-0 w-full h-full pointer-events-none" fill="none">
          <!-- حلقه بیرونی نقطه‌چین سیان -->
          <g class="orbit-ring-cw">
            <circle cx="130" cy="130" r="112" stroke="rgba(45, 212, 191, 0.22)" stroke-width="1.2" stroke-dasharray="6 10"></circle>
            <circle cx="130" cy="18" r="3.5" fill="#2dd4bf"></circle>
            <circle cx="130" cy="242" r="3" fill="#f5c451"></circle>
          </g>

          <!-- حلقه میانی طلایی پاد ساعت‌گرد -->
          <g class="orbit-ring-ccw">
            <circle cx="130" cy="130" r="88" stroke="rgba(245, 196, 81, 0.26)" stroke-width="1.5" stroke-dasharray="32 18 8 18"></circle>
            <circle cx="218" cy="130" r="3.2" fill="#f5c451"></circle>
            <circle cx="42" cy="130" r="3.2" fill="#2dd4bf"></circle>
          </g>

          <!-- خطوط مدار الکترونیکی منشعب از هسته هایتک -->
          <path class="preloader-trace-path" d="M130 42 V14 L148 4" stroke="#f5c451" stroke-width="1.6" stroke-linecap="round"></path>
          <path class="preloader-trace-path" d="M130 218 V246 L112 256" stroke="#2dd4bf" stroke-width="1.6" stroke-linecap="round"></path>
          <path class="preloader-trace-path" d="M42 130 H14 L4 112" stroke="#2dd4bf" stroke-width="1.6" stroke-linecap="round"></path>
          <path class="preloader-trace-path" d="M218 130 H246 L256 148" stroke="#f5c451" stroke-width="1.6" stroke-linecap="round"></path>
          <path class="preloader-trace-path" d="M68 68 L44 44 H24" stroke="#2dd4bf" stroke-width="1.4" stroke-linecap="round"></path>
          <path class="preloader-trace-path" d="M192 68 L216 44 H236" stroke="#f5c451" stroke-width="1.4" stroke-linecap="round"></path>
          <path class="preloader-trace-path" d="M68 192 L44 216 H24" stroke="#f5c451" stroke-width="1.4" stroke-linecap="round"></path>
          <path class="preloader-trace-path" d="M192 192 L216 216 H236" stroke="#2dd4bf" stroke-width="1.4" stroke-linecap="round"></path>
        </svg>

        <!-- قاب مرکزی لوگوی هایتک با border-radius: 18px -->
        <div class="preloader-emblem-box">
          <div class="w-full h-full rounded-[15.5px] bg-[#070b10] flex items-center justify-center overflow-hidden relative">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/OIG4 (1).png' ); ?>" alt="هسته مرکزی هایتک" class="w-full h-full object-cover rounded-[15.5px]" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" style="display: none;">
            <!-- وکتور لامپ-مدار و الماس طلایی هایتک -->
            <div style="display: flex;" class="w-full h-full items-center justify-center bg-gradient-to-b from-slate-900 to-[#06090e]">
              <svg viewBox="0 0 64 64" class="w-14 h-14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <radialGradient id="preloaderBulbGlow" cx="50%" cy="42%" r="50%">
                    <stop offset="0%" stop-color="#fde68a"></stop>
                    <stop offset="55%" stop-color="#f5c451"></stop>
                    <stop offset="100%" stop-color="#b45309" stop-opacity="0"></stop>
                  </radialGradient>
                </defs>
                <circle cx="32" cy="27" r="20" fill="url(#preloaderBulbGlow)" opacity="0.55"></circle>
                <path d="M16 26H9L6 23M48 26H55L58 23M20 14L14 8M44 14L50 8" stroke="#2dd4bf" stroke-width="1.9" stroke-linecap="round"></path>
                <circle cx="6" cy="23" r="2.2" fill="#2dd4bf"></circle>
                <circle cx="58" cy="23" r="2.2" fill="#2dd4bf"></circle>
                <circle cx="14" cy="8" r="2.2" fill="#f5c451"></circle>
                <circle cx="50" cy="8" r="2.2" fill="#f5c451"></circle>
                <path d="M22 27C22 21.4772 26.4772 17 32 17C37.5228 17 42 21.4772 42 27C42 30.866 39.8056 34.2194 36.6 35.8885L35.5 41H28.5L27.4 35.8885C24.1944 34.2194 22 30.866 22 27Z" fill="#f5c451" fill-opacity="0.25" stroke="#f5c451" stroke-width="2.2"></path>
                <path d="M32 21.5L36.5 27L32 32.5L27.5 27L32 21.5Z" fill="#fde68a" stroke="#f5c451" stroke-width="1.5"></path>
                <path d="M28 45H36M29.5 48.5H34.5" stroke="#2dd4bf" stroke-width="2.2" stroke-linecap="round"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- عنوان و تله‌متری راه‌اندازی هایتک -->
      <div class="text-center mb-6">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/[0.04] border border-white/10 mb-2.5">
          <span class="w-1.5 h-1.5 rounded-full bg-cyberCyan-400 animate-ping"></span>
          <span class="text-[10px] font-mono uppercase tracking-[0.25em] text-cyberCyan-300">HITECH CORE SYSTEM BOOT</span>
        </div>
        <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
          استودیوی فناوری <span class="text-cyberGold-400">هایتک</span>
        </h2>
        <p id="preloader-status-text" class="text-xs sm:text-sm text-slate-300 mt-2 font-medium h-5 transition-all">سلام به دنیای فناوری — آماده نمایش</p>
      </div>

      <!-- نوار پیشرفت طلایی-سیان و شمارنده درصد -->
      <div class="w-full max-w-xs sm:max-w-sm">
        <div class="preloader-progress-track mb-3">
          <div id="preloader-progress-bar" class="preloader-progress-fill" style="width: 100%;">
            <span class="preloader-progress-spark"></span>
          </div>
        </div>

        <div class="flex items-center justify-between text-xs font-mono">
          <span id="preloader-percent-fa" class="text-cyberGold-400 font-bold text-sm">۱۰۰٪</span>
          <span id="preloader-telemetry-code" class="text-slate-500 text-[11px]">HIITECH::OK_100</span>
        </div>
      </div>
    </div>
  </div>

  <!-- نوار لیزری بارگذاری بالای صفحه و موج اسکن سایبری -->
  <div id="top-reload-bar"></div>
  <div id="cyber-scan-wave" class="scan-active"></div>

  <!-- ========================================== -->
  <!-- ۱. هدر اصلی سایت (با لوگوی دارای انحنای ۱۸px) -->
  <!-- ========================================== -->
  <header class="sticky top-0 z-50 w-full backdrop-blur-xl bg-[#06090e]/85 border-b border-white/[0.06] reveal-stage" style="--reveal-delay: 40ms;">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 h-20 flex items-center justify-between gap-4">

      <!-- برند و لوگوی هایتک (راست در چیدمان RTL) -->
      <a href="#home" onclick="switchTab('home'); return false;" class="flex items-center gap-3.5 group focus:outline-none" aria-label="صفحه اصلی هایتک">
        <div class="hiitech-logo-frame" title="استودیوی فناوری هایتک">
          <div class="hiitech-logo-inner">
            <!-- بارگذاری تصویر اصلی OIG4 (1).png و جایگزینی هوشمند با نشان وکتور لامپ-مدار هایتک در صورت عدم وجود فایل در پوشه -->
            <img src="<?php echo esc_url( get_template_directory_uri() . '/OIG4 (1).png' ); ?>" alt="لوگوی هایتک" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" style="display: none;">
            <div style="display: flex;" class="w-full h-full items-center justify-center">
              <svg viewBox="0 0 64 64" class="w-9 h-9" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <radialGradient id="bulbGlow" cx="50%" cy="42%" r="50%">
                    <stop offset="0%" stop-color="#fde68a"></stop>
                    <stop offset="55%" stop-color="#f5c451"></stop>
                    <stop offset="100%" stop-color="#b45309" stop-opacity="0"></stop>
                  </radialGradient>
                </defs>
                <!-- هاله نورانی طلایی -->
                <circle cx="32" cy="27" r="18" fill="url(#bulbGlow)" opacity="0.45"></circle>
                <!-- مدارهای سیان اطراف لامپ -->
                <path d="M16 26H10L7 23M48 26H54L57 23M20 14L15 9M44 14L49 9" stroke="#2dd4bf" stroke-width="1.8" stroke-linecap="round"></path>
                <circle cx="7" cy="23" r="2" fill="#2dd4bf"></circle>
                <circle cx="57" cy="23" r="2" fill="#2dd4bf"></circle>
                <circle cx="15" cy="9" r="2" fill="#f5c451"></circle>
                <circle cx="49" cy="9" r="2" fill="#f5c451"></circle>
                <!-- بدنه لامپ هوشمند هایتک -->
                <path d="M22 27C22 21.4772 26.4772 17 32 17C37.5228 17 42 21.4772 42 27C42 30.866 39.8056 34.2194 36.6 35.8885L35.5 41H28.5L27.4 35.8885C24.1944 34.2194 22 30.866 22 27Z" fill="#f5c451" fill-opacity="0.22" stroke="#f5c451" stroke-width="2.2"></path>
                <!-- الماس مرکزی هسته هایتک -->
                <path d="M32 22L36 27L32 32L28 27L32 22Z" fill="#fde68a" stroke="#f5c451" stroke-width="1.4"></path>
                <!-- پایه لامپ -->
                <path d="M28 45H36M29.5 48.5H34.5" stroke="#2dd4bf" stroke-width="2.2" stroke-linecap="round"></path>
              </svg>
            </div>
          </div>
        </div>
        <div class="flex flex-col text-right">
          <span class="text-lg font-extrabold tracking-tight text-white group-hover:text-cyberGold-400 transition-colors">هایتک</span>
          <span class="text-[10px] font-mono uppercase tracking-[0.22em] text-slate-400">HITECH STUDIO</span>
        </div>
      </a>

      <!-- منوی ناوبری دسکتاپ (وسط) -->
      <nav class="hidden md:flex items-center gap-1 bg-white/[0.02] p-1.5 rounded-full border border-white/[0.06]" aria-label="ناوبری اصلی">
        <button type="button" onclick="switchTab('home')" data-tab-btn="home" class="nav-tab-btn active">خانه</button>
        <button type="button" onclick="switchTab('news')" data-tab-btn="news" class="nav-tab-btn">آخرین اخبار تکنولوژی</button>
        <button type="button" onclick="switchTab('blog')" data-tab-btn="blog" class="nav-tab-btn">وبلاگ هوش مصنوعی</button>
        <button type="button" onclick="switchTab('projects')" data-tab-btn="projects" class="nav-tab-btn">پروژه‌های ما</button>
        <button type="button" onclick="switchTab('about')" data-tab-btn="about" class="nav-tab-btn">درباره ما</button>
      </nav>

      <div class="flex items-center gap-2">

        <!-- دکمه پنل مدیریت حرفه‌ای هایتک (CMS & Netlify) -->
        <button type="button" onclick="switchTab('admin')" data-tab-btn="admin" title="پنل مدیریت محتوا و انتشار در Netlify" class="px-3.5 py-2.5 rounded-full text-xs font-bold bg-cyberGold-400/10 hover:bg-cyberGold-400/20 text-cyberGold-300 border border-cyberGold-400/35 transition inline-flex items-center gap-1.5 shadow-sm">
          <svg class="w-3.5 h-3.5 text-cyberGold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
          <span class="hidden sm:inline">پنل کاربری</span>
        </button>


        <button type="button" onclick="switchTab('contact')" data-tab-btn="contact" class="btn-cyber-gold px-4 sm:px-5 py-2.5 rounded-full text-xs sm:text-sm tracking-tight">
          ارتباط با ما
        </button>

        <!-- دکمه منوی موبایل -->
        <button type="button" id="mobile-menu-toggle" onclick="toggleMobileMenu()" class="md:hidden w-10 h-10 rounded-xl bg-white/[0.04] border border-white/10 flex items-center justify-center text-slate-200 hover:border-cyberGold-400/50 transition" aria-label="باز کردن منوی صفحات">
          <svg id="menu-icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
          <svg id="menu-icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- منوی بازشونده موبایل -->
    <div id="mobile-nav-drawer" class="hidden md:hidden border-t border-white/[0.06] bg-[#070b10]/95 backdrop-blur-2xl px-4 pt-3 pb-5">
      <div class="flex flex-col gap-1.5">
        <button type="button" onclick="switchTab('home'); toggleMobileMenu(false);" data-tab-mobile="home" class="w-full text-right px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-white/[0.06]">خانه</button>
        <button type="button" onclick="switchTab('news'); toggleMobileMenu(false);" data-tab-mobile="news" class="w-full text-right px-4 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/[0.04]">آخرین اخبار تکنولوژی</button>
        <button type="button" onclick="switchTab('blog'); toggleMobileMenu(false);" data-tab-mobile="blog" class="w-full text-right px-4 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/[0.04]">وبلاگ هوش مصنوعی</button>
        <button type="button" onclick="switchTab('projects'); toggleMobileMenu(false);" data-tab-mobile="projects" class="w-full text-right px-4 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/[0.04]">پروژه‌های ما</button>
        <button type="button" onclick="switchTab('about'); toggleMobileMenu(false);" data-tab-mobile="about" class="w-full text-right px-4 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/[0.04]">درباره ما</button>
        <button type="button" onclick="switchTab('contact'); toggleMobileMenu(false);" data-tab-mobile="contact" class="w-full text-right px-4 py-2.5 rounded-xl text-sm font-bold text-cyberGold-400 hover:bg-white/[0.04]">ارتباط با ما</button>
        <button type="button" onclick="toggleMobileMenu(false); openDeploy3FilesModal();" class="w-full text-right px-4 py-2.5 rounded-xl text-sm font-bold text-emerald-300 bg-emerald-500/10 border border-emerald-400/25 flex items-center justify-between">
          <span>دریافت ۳ فایل مجزا (HTML + CSS + JS)</span>
          <span>📦</span>
        </button>
        <button type="button" onclick="switchTab('admin'); toggleMobileMenu(false);" data-tab-mobile="admin" class="w-full text-right px-4 py-2.5 rounded-xl text-sm font-bold text-cyberCyan-300 bg-cyberCyan-500/10 border border-cyberCyan-400/20 flex items-center justify-between">
          <span>پنل مدیریت حرفه‌ای و انتشار در Netlify</span>
          <span>⚙️</span>
        </button>
        <button type="button" onclick="toggleMobileMenu(false); replaySystemReload();" class="w-full text-right px-4 py-2.5 rounded-xl text-sm font-semibold text-cyberCyan-400 hover:bg-white/[0.04] flex items-center justify-between">
          <span>بازپخش انیمیشن ریلود هایتک</span>
          <span>↻</span>
        </button>
      </div>
    </div>
  </header>

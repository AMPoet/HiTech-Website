/* =========================================================
 * منطق برنامه تک‌صفحه‌ای، بوم سه‌بعدی، ژیروسکوپ و CMS هایتک
 * File: app.js
 * ========================================================= */
/* -----------------------------------------------------------
     * ۱. داده‌های غنی صفحات، مخزن یکپارچه CMS و استقرار Netlify
     * ----------------------------------------------------------- */
const STORAGE_KEY_CMS = 'HIITECH_CMS_STORE_V2';
let currentUploadedImageData = '';
let currentAdminListFilter = 'all';
let activeShareItem = null;
let preloaderTimerId = null;

// تبدیل ارقام انگلیسی به ارقام استاندارد فارسی
function toPersianDigits(input) {
    const persianMap = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    return String(input ?? '').replace(/\d/g, d => persianMap[Number(d)]);
}

// نوار بارگذاری لیزری بالای صفحه هنگام تعویض تب‌ها
function triggerTopReloadBar() {
    const bar = document.getElementById('top-reload-bar');
    if (!bar) return;
    bar.style.transition = 'none';
    bar.style.width = '0%';
    bar.style.opacity = '1';
    void bar.offsetWidth;
    bar.style.transition = 'width 0.36s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.28s ease';
    bar.style.width = '100%';
    setTimeout(() => {
        bar.style.opacity = '0';
    }, 380);
}

// موج اسکن سایبری هنگام تعویض تب یا بازپخش ریلود
function triggerCyberScanWave() {
    const wave = document.getElementById('cyber-scan-wave');
    if (!wave) return;
    wave.classList.remove('scan-active');
    void wave.offsetWidth;
    wave.classList.add('scan-active');
}

// انیمیشن تمام‌صفحه راه‌اندازی هسته هایتک (Preloader)
function runSystemBootPreloader(duration = 1650) {
    const preloader = document.getElementById('hiitech-preloader');
    const progressBar = document.getElementById('preloader-progress-bar');
    const percentFa = document.getElementById('preloader-percent-fa');
    const telemetryCode = document.getElementById('preloader-telemetry-code');
    const statusText = document.getElementById('preloader-status-text');

    if (!preloader) {
        document.body.classList.add('app-booted');
        return;
    }

    if (preloaderTimerId) {
        cancelAnimationFrame(preloaderTimerId);
    }

    document.body.classList.remove('app-booted');
    preloader.classList.remove('preloader-hidden', 'preloader-burst');

    const steps = [
        { pct: 0, msg: 'در حال راه‌اندازی هسته مرکزی هایتک...', code: 'CORE::INIT_01' },
        { pct: 32, msg: 'همگام‌سازی مدارهای سه‌بعدی و گرافیک WebGL...', code: 'MESH::SYNC_38' },
        { pct: 68, msg: 'بارگذاری ماژول‌های هوش مصنوعی و محتوای سایت...', code: 'AI::READY_74' },
        { pct: 92, msg: 'سلام به دنیای فناوری — آماده نمایش', code: 'HIITECH::OK_100' }
    ];

    const startTime = performance.now();

    function stepFrame(now) {
        const elapsed = now - startTime;
        const rawProgress = Math.min(elapsed / duration, 1);
        const eased = 1 - Math.pow(1 - rawProgress, 3);
        const pct = Math.round(eased * 100);

        if (progressBar) progressBar.style.width = `${pct}%`;
        if (percentFa) percentFa.textContent = `${toPersianDigits(pct)}٪`;

        let currentStep = steps[0];
        for (let i = 0; i < steps.length; i++) {
            if (pct >= steps[i].pct) currentStep = steps[i];
        }
        if (statusText) statusText.textContent = currentStep.msg;
        if (telemetryCode) telemetryCode.textContent = currentStep.code;

        if (rawProgress < 1) {
            preloaderTimerId = requestAnimationFrame(stepFrame);
        } else {
            preloader.classList.add('preloader-burst');
            if (typeof window.triggerHiitechCorePulse === 'function') {
                window.triggerHiitechCorePulse();
            }
            setTimeout(() => {
                preloader.classList.add('preloader-hidden');
                document.body.classList.add('app-booted');
                triggerCyberScanWave();
            }, 220);
        }
    }

    preloaderTimerId = requestAnimationFrame(stepFrame);
}

// بازپخش دستی انیمیشن ریلود با کلیک روی دکمه هدر
function replaySystemReload() {
    runSystemBootPreloader(1450);
}

// اعلان شناور سایبری (بدون استفاده از alert)
function showCyberToast(message, type = 'gold') {
    const container = document.getElementById('cyber-toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = 'cyber-toast';
    const borderColor = type === 'cyan' ? 'rgba(45, 212, 191, 0.55)' : type === 'rose' ? 'rgba(244, 63, 94, 0.55)' : 'rgba(245, 196, 81, 0.55)';
    const dotColor = type === 'cyan' ? '#2dd4bf' : type === 'rose' ? '#fb7185' : '#f5c451';
    toast.style.borderColor = borderColor;

    toast.innerHTML = `
        <span style="width:8px;height:8px;border-radius:9999px;background:${dotColor};box-shadow:0 0 10px ${dotColor};flex-shrink:0;"></span>
        <span>${message}</span>
      `;

    container.appendChild(toast);
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(10px)';
        toast.style.transition = 'all 0.3s ease';
        setTimeout(() => toast.remove(), 320);
    }, 3600);
}

/*__HIITECH_BAKED_DATA_START__*/
const DEFAULT_CMS_DATA = {
    "settings": {
        "heroBadge": "استودیوی فناوری هایتک",
        "heroH1": "سلام به دنیای فناوری",
        "heroDesc": "ایده‌ها را به محصولات دیجیتال دقیق تبدیل می‌کنیم؛ از معماری وب و اتوماسیون فرایندها تا مدل‌های هوش مصنوعی و زیرساخت امن. هایتک در کنار تیم شما می‌ماند تا نتیجه، قابل اندازه‌گیری باشد.",
        "m1Val": "+۱۸۰",
        "m1Label": "پروژه تکمیل‌شده",
        "m2Val": "۹",
        "m2Label": "سال تجربه تیمی",
        "m3Val": "۹۶٪",
        "m3Label": "رضایت مشتریان",
        "contactEmail": "hello@hiitech.ir",
        "contactAddress": "تهران، ناحیه نوآوری شریف، استودیوی فناوری هایتک",
        "netlifyHookUrl": ""
    },
    "news": [
        {
            "id": "news-1",
            "cat": "ai",
            "badge": "هوش مصنوعی",
            "meta": "آبان ۱۴۰۵ • مطالعه ۴ دقیقه",
            "title": "نسل جدید دستیارهای چندوجهی در زیرساخت‌های بومی؛ تحلیل تیم هایتک",
            "excerpt": "چگونه مدل‌های زبانی سبک و بهینه‌سازی‌شده می‌توانند بدون خروج داده از شبکه سازمان، اسناد و صدای فارسی را با دقت بالا پردازش کنند.",
            "content": "در ماه‌های اخیر، تمرکز سازمان‌ها از استفاده عمومی از چت‌بات‌ها به سمت استقرار مدل‌های اختصاصی درون‌سازمانی (On-Premise LLM) تغییر کرده است.\n\nدر آزمایشگاه هوش مصنوعی هایتک، با ترکیب تکنیک‌های کوانتیزه‌سازی ۴ بیتی و بازیابی هوشمند اسناد (RAG)، موفق شدیم مصرف حافظه گرافیکی را تا ۶۰ درصد کاهش دهیم بدون آنکه دقت پاسخ‌گویی به پرسش‌های تخصصی فارسی افت کند.\n\nاین دستاورد به کسب‌وکارهای مالی، حقوقی و صنعتی اجازه می‌دهد داده‌های حساس خود را کاملاً در سرورهای داخلی حفظ کنند.",
            "tags": [
                "LLM بومی",
                "پردازش زبان فارسی",
                "امنیت داده"
            ],
            "svgPreset": "neural-mesh",
            "featured": true,
            "coverImage": ""
        },
        {
            "id": "news-2",
            "cat": "web",
            "badge": "مهندسی وب",
            "meta": "آبان ۱۴۰۵ • مطالعه ۳ دقیقه",
            "title": "معماری Edge Rendering و تاثیر مستقیم آن بر نرخ تبدیل فروشگاه‌های آنلاین",
            "excerpt": "بررسی تجربه هایتک در کاهش زمان بارگذاری اولیه (LCP) به زیر ۰.۸ ثانیه و تاثیر ملموس آن بر سئو و تجربه کاربری موبایل.",
            "content": "سرعت بارگذاری در وب مدرن صرفاً یک شاخص فنی نیست؛ بلکه مستقیماً با نرخ وفاداری کاربر و فروش در ارتباط است.\n\nتیم مهندسی وب هایتک با بازطراحی لایه کشینگ، حذف اسکریپت‌های مسدودکننده رندر و استفاده از معماری جزیره‌ای، امتیاز Core Web Vitals پروژه‌های اخیر خود را به ۱۰۰ از ۱۰۰ رسانده است.",
            "tags": [
                "Core Web Vitals",
                "معماری وب",
                "بهینه‌سازی سرعت"
            ],
            "svgPreset": "circuit-core",
            "featured": false,
            "coverImage": ""
        },
        {
            "id": "news-3",
            "cat": "cloud",
            "badge": "ابر و امنیت",
            "meta": "مهر ۱۴۰۵ • مطالعه ۵ دقیقه",
            "title": "الگوی Zero-Trust در میکروسرویس‌های مالی و سازمانی",
            "excerpt": "چرا دیوارهای آتش سنتی دیگر کافی نیستند و چگونه هایتک احراز هویت متقابل سرویس‌به‌سرویس را پیاده‌سازی می‌کند.",
            "content": "در معماری‌های توزیع‌شده امروزی، فرض بر این است که هیچ ترافیکی—حتی در شبکه داخلی—به صورت پیش‌فرض امن نیست.\n\nدر چارچوب امنیتی هایتک، تمامی ارتباطات بین سرویس‌ها با گواهی‌های رمزنگاری کوتاه‌مدت (mTLS) و سیاست‌های دسترسی کمینه پایش می‌شوند تا ریسک نفوذهای جانبی به صفر برسد.",
            "tags": [
                "Zero-Trust",
                "امنیت ابری",
                "پایش لحظه‌ای"
            ],
            "svgPreset": "quantum-shield",
            "featured": false,
            "coverImage": ""
        }
    ],
    "blog": [
        {
            "id": "blog-1",
            "cat": "ai",
            "badge": "معماری RAG سازمانی",
            "meta": "پژوهش فنی هایتک • ۷ دقیقه مطالعه",
            "title": "راهنمای جامع پیاده‌سازی سیستم‌های RAG دقیق روی مستندات پیچیده فارسی",
            "excerpt": "از قطعه‌بندی معنایی (Semantic Chunking) تا بازرتبه‌بندی نتایج؛ تجربه‌های عملی هایتک در حذف توهم مدل‌های زبانی.",
            "content": "یکی از بزرگ‌ترین چالش‌های سازمان‌ها در استفاده از مدل‌های زبانی بزرگ، پدیده توهم (Hallucination) و ارجاع نادرست به بخشنامه‌ها و مستندات داخلی است.\n\nدر استودیوی فناوری هایتک، ما به جای تکیه صرف بر جستجوی برداری ساده، از معماری Hybrid Search (ترکیب جستجوی واژگانی BM25 بهینه‌شده برای زبان فارسی و امبدینگ‌های چندزبانه) به همراه یک لایه Reranker استفاده می‌کنیم.\n\nنتیجه این معماری، افزایش دقت بازیابی اطلاعات به بیش از ۹۶ درصد و ارائه ارجاع دقیق به شماره صفحه و بند سند اصلی است.",
            "tags": [
                "RAG سازمانی",
                "جستجوی ترکیبی",
                "هوش مصنوعی هایتک"
            ],
            "svgPreset": "neural-mesh",
            "featured": true,
            "coverImage": ""
        },
        {
            "id": "blog-2",
            "cat": "ai",
            "badge": "بینایی ماشین و OCR",
            "meta": "یادداشت مهندسی هایتک • ۶ دقیقه مطالعه",
            "title": "خوانش خودکار فاکتورها و اسناد دست‌نویس فارسی با مدل‌های Vision-Language",
            "excerpt": "چگونه خط لوله پردازش تصویر هایتک زمان ورود اطلاعات مالی و لجستیکی را تا ۸۵ درصد کاهش می‌دهد.",
            "content": "اسناد اسکن‌شده با زوایای نامناسب، مهرهای هم‌پوشان و فونت‌های متنوع اداری، سال‌ها مانع اتوماسیون کامل فرایندهای مالی در ایران بودند.\n\nتیم هوش مصنوعی هایتک با ترکیب پیش‌پردازش تصویر، تشخیص چیدمان جدول و مدل‌های بینایی-زبانی تنظیم‌شده، سامانه استخراج ساختاری (Structured JSON Extraction) را توسعه داده است که مستقیماً به نرم‌افزارهای حسابداری و ERP متصل می‌شود.",
            "tags": [
                "بینایی ماشین",
                "OCR فارسی",
                "اتوماسیون مالی"
            ],
            "svgPreset": "vision-ocr",
            "featured": false,
            "coverImage": ""
        }
    ],
    "projects": [
        {
            "id": "proj-1",
            "cat": "ai",
            "badge": "هوش مصنوعی کاربردی",
            "meta": "کارفرما: هلدینگ خدمات مالی و سرمایه‌گذاری",
            "title": "دستیار هوشمند تحلیل قراردادها و پایگاه دانش سازمانی (HiiTECH LexAI)",
            "excerpt": "سامانه جستجوی معنایی و خلاصه‌سازی بیش از ۱۲۰ هزار صفحه سند حقوقی و مالی با ارجاع دقیق به بندهای قانونی.",
            "content": "در این پروژه، تیم هایتک یک زیرساخت کامل RAG سازمانی را بر روی سرورهای داخلی کارفرما طراحی و مستقر کرد.\n\nکارشناسان حقوقی و مالی اکنون می‌توانند به زبان طبیعی سوال خود را مطرح کرده و ظرف کمتر از ۳ ثانیه، پاسخ مستند به همراه لینک مستقیم به پرونده‌های مشابه قبلی را دریافت کنند.",
            "metricVal": "۸۵٪ کاهش زمان بررسی اسناد",
            "metricSub": "دقت بازیابی بندهای قرارداد: ۹۶.۴٪",
            "tags": [
                "RAG سازمانی",
                "پردازش زبان فارسی",
                "استقرار امن داخلی"
            ],
            "svgPreset": "neural-mesh",
            "featured": true,
            "coverImage": ""
        },
        {
            "id": "proj-2",
            "cat": "web",
            "badge": "توسعه محصول وب",
            "meta": "کارفرما: پلتفرم تجارت الکترونیک B2B",
            "title": "بازمهندسی پلتفرم سفارش‌گیری کلان با معماری Next.js و میکروسرویس",
            "excerpt": "طراحی مجدد رابط کاربری و هسته سفارش‌گیری با قابلیت پردازش هم‌زمان هزاران سبد خرید سازمانی بدون افت سرعت.",
            "content": "نسخه قبلی پلتفرم کارفرما در ساعات اوج سفارش‌گیری دچار کندی شدید می‌شد. تیم مهندسی وب هایتک با بازطراحی کامل فرانت‌اند و بهینه‌سازی کوئری‌های پایگاه داده، زمان بارگذاری صفحات را از ۴.۲ ثانیه به ۰.۷ ثانیه کاهش داد.",
            "metricVal": "۳.۴ برابر رشد سرعت بارگذاری",
            "metricSub": "امتیاز پایداری و Core Web Vitals: ۹۹/۱۰۰",
            "tags": [
                "React / Next.js",
                "معماری API",
                "بهینه‌سازی مقیاس‌پذیر"
            ],
            "svgPreset": "circuit-core",
            "featured": false,
            "coverImage": ""
        },
        {
            "id": "proj-3",
            "cat": "automation",
            "badge": "اتوماسیون و یکپارچه‌سازی",
            "meta": "کارفرما: شبکه توزیع و لجستیک کشوری",
            "title": "خط لوله یکپارچه‌سازی لحظه‌ای انبار، CRM و پنل فروشندگان",
            "excerpt": "حذف کامل ورود دستی اطلاعات میان ۴ سامانه مجزا و ساخت داشبورد پایش لحظه‌ای موجودی و ارسال مرسولات.",
            "content": "پیش از همکاری با هایتک، ناهماهنگی موجودی بین انبار مرکزی و وب‌سایت فروش باعث لغو بخشی از سفارش‌ها می‌شد.\n\nبا طراحی معماری رویدادمحور (Event-Driven) و صف‌های پیام پایدار، تمامی تغییرات موجودی، صدور فاکتور و پیامک‌های وضعیت مرسوله در کسری از ثانیه هماهنگ‌سازی شدند.",
            "metricVal": "صفر شدن خطای ثبت موجودی",
            "metricSub": "صرفه‌جویی ماهانه: بیش از ۴۲۰ نفر-ساعت",
            "tags": [
                "خط لوله داده",
                "اتصال ERP و CRM",
                "داشبورد عملیاتی"
            ],
            "svgPreset": "data-pipeline",
            "featured": false,
            "coverImage": ""
        },
        {
            "id": "proj-4",
            "cat": "web",
            "badge": "امنیت و پایداری",
            "meta": "کارفرما: سامانه نوبت‌دهی و پرونده الکترونیک سلامت",
            "title": "مقاوم‌سازی زیرساخت ابری، مدیریت دسترسی و پایش هوشمند خطا",
            "excerpt": "استقرار معماری High-Availability با پشتیبان‌گیری خودکار رمزنگاری‌شده و داشبورد هشدار بلادرنگ.",
            "content": "تیم زیرساخت و امنیت هایتک تمامی گلوگاه‌های امنیتی و نقاط تک‌شکست (Single Point of Failure) سامانه را شناسایی و بازطراحی کرد تا سرویس‌دهی بدون وقفه در ۲۴ ساعت شبانه‌روز تضمین شود.",
            "metricVal": "۹۹.۹۸٪ دسترس‌پذیری سالانه",
            "metricSub": "کاهش ۷۰ درصدی زمان پاسخ سرور (TTFB)",
            "tags": [
                "بازبینی امنیتی",
                "پایش و هشدار",
                "معماری پایدار"
            ],
            "svgPreset": "quantum-shield",
            "featured": false,
            "coverImage": ""
        }
    ],
    "inbox": [
        {
            "id": "msg-sample-1",
            "name": "مهندس سهند رضایی",
            "contact": "09120000000 / s.rezaei@techcorp.ir",
            "service": "هوش مصنوعی کاربردی",
            "message": "سلام وقت بخیر؛ برای پیاده‌سازی دستیار هوشمند پاسخ‌گویی به مستندات فنی شرکت نیاز به جلسه مشاوره با تیم هایتک داریم.",
            "date": "آبان ۱۴۰۵ - ساعت ۱۱:۳۰"
        }
    ]
};
/*__HIITECH_BAKED_DATA_END__*/

// بارگذاری و ذخیره‌سازی مخزن CMS در مرورگر
let cmsStore = loadCMSStore();

function loadCMSStore() {
    try {
        const raw = localStorage.getItem(STORAGE_KEY_CMS);
        if (raw) {
            const parsed = JSON.parse(raw);
            return {
                settings: { ...DEFAULT_CMS_DATA.settings, ...(parsed.settings || {}) },
                news: Array.isArray(parsed.news) ? parsed.news : DEFAULT_CMS_DATA.news,
                blog: Array.isArray(parsed.blog) ? parsed.blog : DEFAULT_CMS_DATA.blog,
                projects: Array.isArray(parsed.projects) ? parsed.projects : DEFAULT_CMS_DATA.projects,
                inbox: Array.isArray(parsed.inbox) ? parsed.inbox : DEFAULT_CMS_DATA.inbox
            };
        }
    } catch (e) {
        console.warn('خطا در خواندن حافظه محلی هایتک:', e);
    }
    return JSON.parse(JSON.stringify(DEFAULT_CMS_DATA));
}

function saveCMSStore() {
    try {
        localStorage.setItem(STORAGE_KEY_CMS, JSON.stringify(cmsStore));
    } catch (e) {
        showCyberToast('حجم تصاویر ذخیره شده در مرورگر زیاد است؛ لطفاً از دکمه دانلود فایل Netlify استفاده کنید.', 'rose');
    }
    updateAdminDashboardStats();
}

/* -----------------------------------------------------------
 * ۲. تولیدکننده وکتورهای متحرک سایبری (SVG Tech Visualizers)
 * ----------------------------------------------------------- */
function getSvgPresetMarkup(preset = 'circuit-core') {
    switch (preset) {
        case 'neural-mesh':
            return `
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <path d="M12 4L5 18H19L12 4Z" stroke="currentColor" stroke-width="1.5" class="svg-circuit-flow" />
              <circle cx="12" cy="4" r="2.3" fill="#f5c451" class="svg-pulse-node" />
              <circle cx="5" cy="18" r="2" fill="#2dd4bf" />
              <circle cx="19" cy="18" r="2" fill="#2dd4bf" />
            </svg>`;
        case 'quantum-shield':
            return `
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <path d="M12 3L19 6.5V12.5C19 16.8 16 20.3 12 21.5C8 20.3 5 16.8 5 12.5V6.5L12 3Z" stroke="currentColor" stroke-width="1.5" />
              <circle cx="12" cy="12" r="2.6" fill="#f5c451" class="svg-pulse-node" />
            </svg>`;
        case 'cloud-matrix':
            return `
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <rect x="4" y="5" width="16" height="6" rx="2" stroke="currentColor" stroke-width="1.5" />
              <rect x="4" y="13" width="16" height="6" rx="2" stroke="#2dd4bf" stroke-width="1.5" class="svg-circuit-flow" />
              <circle cx="8" cy="8" r="1.5" fill="#f5c451" class="svg-pulse-node" />
              <circle cx="8" cy="16" r="1.5" fill="#2dd4bf" />
            </svg>`;
        case 'vision-ocr':
            return `
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <path d="M4 8V6C4 4.89543 4.89543 4 6 4H8M16 4H18C19.1046 4 20 4.89543 20 6V8M20 16V18C20 19.1046 19.1046 20 18 20H16M8 20H6C4.89543 20 4 19.1046 4 18V16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
              <circle cx="12" cy="12" r="3.2" stroke="#f5c451" stroke-width="1.6" class="svg-pulse-node" />
            </svg>`;
        case 'data-pipeline':
            return `
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <rect x="4" y="4" width="16" height="16" rx="4" stroke="currentColor" stroke-width="1.5" />
              <path d="M8 12H16M12 8V16" stroke="#2dd4bf" stroke-width="1.5" class="svg-circuit-flow" />
              <circle cx="12" cy="12" r="2.4" fill="#f5c451" class="svg-pulse-node" />
            </svg>`;
        default:
            return `
            <svg class="w-6 h-6 text-cyberCyan-400" viewBox="0 0 24 24" fill="none">
              <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.5" class="svg-circuit-flow" />
              <circle cx="12" cy="12" r="3" fill="#f5c451" class="svg-pulse-node" />
            </svg>`;
    }
}

/* -----------------------------------------------------------
 * ۳. رندرینگ پویا برای اخبار، وبلاگ هوش مصنوعی و پروژه‌ها
 * ----------------------------------------------------------- */
function applySiteSettingsToDOM() {
    const s = cmsStore.settings || DEFAULT_CMS_DATA.settings;
    const setTxt = (id, val) => {
        const el = document.getElementById(id);
        if (el && val) el.textContent = val;
    };

    setTxt('hero-badge-display', s.heroBadge);
    const h1El = document.getElementById('hero-h1-display');
    if (h1El && s.heroH1) {
        if (s.heroH1 === 'سلام به دنیای فناوری') {
            h1El.innerHTML = 'سلام به دنیای<br />فناوری';
        } else {
            h1El.textContent = s.heroH1;
        }
    }
    setTxt('hero-desc-display', s.heroDesc);
    setTxt('metric-1-val', s.m1Val);
    setTxt('metric-1-label', s.m1Label);
    setTxt('metric-2-val', s.m2Val);
    setTxt('metric-2-label', s.m2Label);
    setTxt('metric-3-val', s.m3Val);
    setTxt('metric-3-label', s.m3Label);
    setTxt('contact-email-display', s.contactEmail);
    setTxt('contact-address-display', s.contactAddress);

    const hookInput = document.getElementById('netlify-hook-url');
    if (hookInput && s.netlifyHookUrl) hookInput.value = s.netlifyHookUrl;
}

// رندر کارت‌های آخرین اخبار تکنولوژی
function renderNewsCards(category = 'all') {
    const grid = document.getElementById('news-grid');
    if (!grid) return;

    const items = category === 'all'
        ? cmsStore.news
        : cmsStore.news.filter(item => item.cat === category);

    if (!items.length) {
        grid.innerHTML = `<div class="col-span-full p-10 rounded-3xl bg-white/[0.02] border border-white/10 text-center text-slate-400 text-sm">خبری در این دسته‌بندی یافت نشد.</div>`;
        return;
    }

    grid.innerHTML = items.map(item => `
        <div class="tilt-card-container">
          <article class="tilt-card ${item.featured ? 'card-featured-gold' : ''} p-6 sm:p-7 h-full flex flex-col justify-between" data-tilt>
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              ${item.coverImage ? `
                <div class="mb-5 rounded-2xl overflow-hidden border border-white/10 h-44 bg-obsidian-950">
                  <img src="${item.coverImage}" alt="${item.title}" class="w-full h-full object-cover" loading="lazy" />
                </div>
              ` : ''}
              <div class="flex items-center justify-between gap-2 mb-5">
                <div class="w-10 h-10 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  ${getSvgPresetMarkup(item.svgPreset)}
                </div>
                <span class="text-[11px] font-semibold text-cyberGold-300 bg-cyberGold-400/10 border border-cyberGold-400/25 px-3 py-1 rounded-full">
                  ${item.badge || 'فناوری هایتک'}
                </span>
              </div>
              <div class="text-[11px] text-slate-400 mb-2">${item.meta || ''}</div>
              <h3 class="text-lg font-extrabold text-white leading-snug mb-3">${item.title}</h3>
              <p class="text-xs sm:text-sm text-slate-300/85 leading-7 mb-5">${item.excerpt}</p>
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-1.5">
                ${(item.tags || []).map(t => `<span class="tech-pill">${t}</span>`).join('')}
              </div>
              <div class="flex items-center justify-between gap-2">
                <button
                  type="button"
                  onclick="openDetailModal('news', '${item.id}')"
                  class="text-xs font-bold text-cyberGold-400 hover:text-cyberGold-300 transition"
                >
                  مطالعه کامل خبر ←
                </button>
                <button
                  type="button"
                  onclick="openShareModal('news', '${item.id}')"
                  class="px-3 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-[11px] text-cyberCyan-300 transition"
                >
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      `).join('');

    init3DTiltCards();
}

function filterNews(cat) {
    document.querySelectorAll('[data-news-cat]').forEach(btn => {
        const active = btn.getAttribute('data-news-cat') === cat;
        btn.className = active
            ? 'px-4 py-2 rounded-full text-xs font-semibold bg-cyberGold-400 text-obsidian-950 transition'
            : 'px-4 py-2 rounded-full text-xs font-medium bg-white/[0.04] text-slate-300 hover:bg-white/[0.08] border border-white/10 transition';
    });
    renderNewsCards(cat);
}

// رندر کارت‌های وبلاگ هوش مصنوعی
function renderBlogCards(searchQuery = '') {
    const grid = document.getElementById('blog-grid');
    if (!grid) return;

    const q = searchQuery.trim().toLowerCase();
    const items = !q
        ? cmsStore.blog
        : cmsStore.blog.filter(item =>
            item.title.toLowerCase().includes(q) ||
            item.excerpt.toLowerCase().includes(q) ||
            (item.tags || []).some(t => t.toLowerCase().includes(q))
        );

    if (!items.length) {
        grid.innerHTML = `<div class="col-span-full p-10 rounded-3xl bg-white/[0.02] border border-white/10 text-center text-slate-400 text-sm">مقاله‌ای با این عبارت در وبلاگ هوش مصنوعی هایتک یافت نشد.</div>`;
        return;
    }

    grid.innerHTML = items.map(item => `
        <div class="tilt-card-container">
          <article class="tilt-card ${item.featured ? 'card-featured-gold' : ''} p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt>
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              ${item.coverImage ? `
                <div class="mb-5 rounded-2xl overflow-hidden border border-white/10 h-52 bg-obsidian-950">
                  <img src="${item.coverImage}" alt="${item.title}" class="w-full h-full object-cover" loading="lazy" />
                </div>
              ` : ''}
              <div class="flex items-center justify-between gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  ${getSvgPresetMarkup(item.svgPreset)}
                </div>
                <span class="text-xs font-semibold text-cyberCyan-300 bg-cyberCyan-500/10 border border-cyberCyan-400/20 px-3.5 py-1 rounded-full">
                  ${item.badge || 'آزمایشگاه AI هایتک'}
                </span>
              </div>
              <div class="text-xs text-slate-400 mb-2">${item.meta || ''}</div>
              <h3 class="text-xl font-extrabold text-white leading-snug mb-3">${item.title}</h3>
              <p class="text-sm text-slate-300/85 leading-7 mb-6">${item.excerpt}</p>
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-2">
                ${(item.tags || []).map(t => `<span class="tech-pill">${t}</span>`).join('')}
              </div>
              <div class="flex items-center justify-between gap-2">
                <button
                  type="button"
                  onclick="openDetailModal('blog', '${item.id}')"
                  class="text-xs sm:text-sm font-bold text-cyberGold-400 hover:text-cyberGold-300 transition"
                >
                  مطالعه مقاله تخصصی ←
                </button>
                <button
                  type="button"
                  onclick="openShareModal('blog', '${item.id}')"
                  class="px-3.5 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-xs text-cyberCyan-300 transition"
                >
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      `).join('');

    init3DTiltCards();
}

// رندر کارت‌های پروژه‌های ما در هایتک
function renderProjectCards(category = 'all') {
    const grid = document.getElementById('projects-grid');
    if (!grid) return;

    const items = category === 'all'
        ? cmsStore.projects
        : cmsStore.projects.filter(item => item.cat === category);

    if (!items.length) {
        grid.innerHTML = `<div class="col-span-full p-10 rounded-3xl bg-white/[0.02] border border-white/10 text-center text-slate-400 text-sm">پروژه‌ای در این دسته‌بندی یافت نشد.</div>`;
        return;
    }

    grid.innerHTML = items.map(item => `
        <div class="tilt-card-container">
          <article class="tilt-card ${item.featured ? 'card-featured-gold' : ''} p-7 sm:p-8 h-full flex flex-col justify-between" data-tilt>
            <div class="tilt-glare"></div>
            <div class="tilt-content">
              ${item.coverImage ? `
                <div class="mb-5 rounded-2xl overflow-hidden border border-white/10 h-52 bg-obsidian-950">
                  <img src="${item.coverImage}" alt="${item.title}" class="w-full h-full object-cover" loading="lazy" />
                </div>
              ` : ''}
              <div class="flex items-center justify-between gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                  ${getSvgPresetMarkup(item.svgPreset)}
                </div>
                <span class="text-xs font-semibold text-cyberGold-300 bg-cyberGold-400/10 border border-cyberGold-400/25 px-3.5 py-1 rounded-full">
                  ${item.badge || 'پروژه هایتک'}
                </span>
              </div>

              <div class="text-xs text-slate-400 mb-2">${item.meta || ''}</div>
              <h3 class="text-xl font-extrabold text-white leading-snug mb-3">${item.title}</h3>
              <p class="text-sm text-slate-300/85 leading-7 mb-5">${item.excerpt}</p>

              ${item.metricVal ? `
                <div class="mb-6 p-4 rounded-2xl bg-obsidian-950/90 border border-cyberGold-400/25">
                  <div class="text-lg font-black text-cyberGold-400">${item.metricVal}</div>
                  ${item.metricSub ? `<div class="text-xs text-slate-400 mt-1">${item.metricSub}</div>` : ''}
                </div>
              ` : ''}
            </div>

            <div class="tilt-content pt-4 border-t border-white/[0.07] space-y-4">
              <div class="flex flex-wrap gap-2">
                ${(item.tags || []).map(t => `<span class="tech-pill">${t}</span>`).join('')}
              </div>
              <div class="flex items-center justify-between gap-2">
                <button
                  type="button"
                  onclick="openDetailModal('projects', '${item.id}')"
                  class="text-xs sm:text-sm font-bold text-cyberCyan-400 hover:text-cyberCyan-300 transition"
                >
                  مشاهده مطالعه موردی ←
                </button>
                <button
                  type="button"
                  onclick="openShareModal('projects', '${item.id}')"
                  class="px-3.5 py-1.5 rounded-full bg-white/[0.04] hover:bg-white/[0.1] border border-white/10 text-xs text-cyberGold-300 transition"
                >
                  اشتراک‌گذاری ↗
                </button>
              </div>
            </div>
          </article>
        </div>
      `).join('');

    init3DTiltCards();
}

function filterProjects(cat) {
    document.querySelectorAll('[data-proj-cat]').forEach(btn => {
        const active = btn.getAttribute('data-proj-cat') === cat;
        btn.className = active
            ? 'px-4 py-2 rounded-full text-xs font-semibold bg-cyberGold-400 text-obsidian-950 transition'
            : 'px-4 py-2 rounded-full text-xs font-medium bg-white/[0.04] text-slate-300 border border-white/10 hover:bg-white/[0.08] transition';
    });
    renderProjectCards(cat);
}

/* -----------------------------------------------------------
 * ۴. مودال مطالعه کامل + مودال اشتراک‌گذاری و پوستر گرافیکی
 * ----------------------------------------------------------- */
function findCMSItem(section, id) {
    const list = cmsStore[section] || [];
    return list.find(i => i.id === id) || null;
}

function openDetailModal(section, id) {
    const item = findCMSItem(section, id);
    if (!item) return;

    const modal = document.getElementById('detail-modal');
    document.getElementById('modal-badge').textContent = item.badge || 'هایتک';
    document.getElementById('modal-title').textContent = item.title;
    document.getElementById('modal-meta').textContent = item.meta || '';

    const coverWrapper = document.getElementById('modal-cover-wrapper');
    const coverImg = document.getElementById('modal-cover-img');
    if (item.coverImage) {
        coverImg.src = item.coverImage;
        coverWrapper.classList.remove('hidden');
    } else {
        coverWrapper.classList.add('hidden');
    }

    const paragraphs = String(item.content || item.excerpt || '')
        .split('\n')
        .filter(Boolean)
        .map(p => `<p>${p}</p>`)
        .join('');

    const metricBanner = item.metricVal
        ? `<div class="p-4 rounded-2xl bg-cyberGold-400/10 border border-cyberGold-400/30 mb-4">
             <div class="text-base font-extrabold text-cyberGold-400">${item.metricVal}</div>
             <div class="text-xs text-slate-300 mt-1">${item.metricSub || ''}</div>
           </div>`
        : '';

    document.getElementById('modal-body').innerHTML = metricBanner + paragraphs;
    document.getElementById('modal-tags').innerHTML = (item.tags || [])
        .map(t => `<span class="tech-pill">${t}</span>`)
        .join('');

    const shareBtn = document.getElementById('modal-share-trigger');
    if (shareBtn) {
        shareBtn.onclick = () => {
            closeDetailModal();
            openShareModal(section, id);
        };
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeDetailModal() {
    const modal = document.getElementById('detail-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function openShareModal(section, id) {
    const item = findCMSItem(section, id);
    if (!item) return;
    activeShareItem = { section, item };

    const baseUrl = window.location.href.split('#')[0];
    const deepLink = `${baseUrl}#${section}/${item.id}`;

    document.getElementById('share-modal-title').textContent = item.title;
    document.getElementById('share-deeplink-input').value = deepLink;

    const encodedUrl = encodeURIComponent(deepLink);
    const encodedText = encodeURIComponent(`${item.title} — استودیوی فناوری هایتک\n${item.excerpt}`);

    document.getElementById('share-btn-telegram').href = `https://t.me/share/url?url=${encodedUrl}&text=${encodedText}`;
    document.getElementById('share-btn-linkedin').href = `https://www.linkedin.com/sharing/share-offsite/?url=${encodedUrl}`;
    document.getElementById('share-btn-twitter').href = `https://twitter.com/intent/tweet?url=${encodedUrl}&text=${encodedText}`;
    document.getElementById('share-btn-whatsapp').href = `https://api.whatsapp.com/send?text=${encodedText}%20${encodedUrl}`;

    renderSocialCardCanvas(item);

    const modal = document.getElementById('share-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeShareModal() {
    const modal = document.getElementById('share-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function copyShareDeepLink() {
    const input = document.getElementById('share-deeplink-input');
    if (!input) return;
    input.select();
    input.setSelectionRange(0, 99999);
    try {
        document.execCommand('copy');
        showCyberToast('لینک مستقیم محتوای هایتک در کلیپ‌بورد کپی شد!', 'cyan');
    } catch (e) {
        showCyberToast('لطفاً لینک انتخاب‌شده را کپی نمایید.', 'gold');
    }
}

// رندر پوستر ۱۰۸۰×۱۰۸۰ شبکه‌های اجتماعی با برندینگ هایتک
function renderSocialCardCanvas(item) {
    const canvas = document.getElementById('social-card-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    const W = canvas.width;
    const H = canvas.height;

    // پس‌زمینه ابسیدین سایبری
    const bgGrad = ctx.createRadialGradient(W * 0.5, H * 0.3, 60, W * 0.5, H * 0.5, W * 0.8);
    bgGrad.addColorStop(0, '#101b29');
    bgGrad.addColorStop(0.6, '#070b11');
    bgGrad.addColorStop(1, '#040609');
    ctx.fillStyle = bgGrad;
    ctx.fillRect(0, 0, W, H);

    // شبکه خطوط ظریف سایبری
    ctx.strokeStyle = 'rgba(45, 212, 191, 0.06)';
    ctx.lineWidth = 1;
    for (let x = 0; x < W; x += 60) {
        ctx.beginPath();
        ctx.moveTo(x, 0);
        ctx.lineTo(x, H);
        ctx.stroke();
    }
    for (let y = 0; y < H; y += 60) {
        ctx.beginPath();
        ctx.moveTo(0, y);
        ctx.lineTo(W, y);
        ctx.stroke();
    }

    // کادر نئونی طلایی-سیان
    ctx.strokeStyle = 'rgba(245, 196, 81, 0.45)';
    ctx.lineWidth = 3;
    ctx.strokeRect(48, 48, W - 96, H - 96);

    // نشان بالای پوستر
    ctx.direction = 'rtl';
    ctx.textAlign = 'right';
    ctx.fillStyle = '#2dd4bf';
    ctx.font = 'bold 28px Vazirmatn, sans-serif';
    ctx.fillText(`● استودیوی فناوری هایتک | ${item.badge || 'فناوری و هوش مصنوعی'}`, W - 96, 135);

    // عنوان اصلی مطلب (چندخطی خودکار)
    ctx.fillStyle = '#ffffff';
    ctx.font = '900 52px Vazirmatn, sans-serif';
    const titleLines = wrapCanvasText(ctx, item.title, W - 192);
    let curY = 250;
    titleLines.slice(0, 4).forEach(line => {
        ctx.fillText(line, W - 96, curY);
        curY += 76;
    });

    // خلاصه مطلب
    curY += 25;
    ctx.fillStyle = '#cbd5e1';
    ctx.font = '400 32px Vazirmatn, sans-serif';
    const excerptLines = wrapCanvasText(ctx, item.excerpt || '', W - 192);
    excerptLines.slice(0, 4).forEach(line => {
        ctx.fillText(line, W - 96, curY);
        curY += 54;
    });

    // شاخص پروژه در صورت وجود
    if (item.metricVal) {
        curY += 30;
        ctx.fillStyle = '#f5c451';
        ctx.font = 'bold 40px Vazirmatn, sans-serif';
        ctx.fillText(`★ ${item.metricVal}`, W - 96, curY);
    }

    // فوتر پوستر
    ctx.fillStyle = '#f5c451';
    ctx.font = '900 40px Vazirmatn, sans-serif';
    ctx.fillText('هایتک | سلام به دنیای فناوری', W - 96, H - 105);

    ctx.direction = 'ltr';
    ctx.textAlign = 'left';
    ctx.fillStyle = '#5eead4';
    ctx.font = '600 24px "JetBrains Mono", monospace';
    ctx.fillText('HIITECH STUDIO', 96, H - 105);
}

function wrapCanvasText(ctx, text, maxWidth) {
    const words = String(text || '').split(' ');
    const lines = [];
    let currentLine = words[0] || '';

    for (let i = 1; i < words.length; i++) {
        const word = words[i];
        const width = ctx.measureText(currentLine + ' ' + word).width;
        if (width < maxWidth) {
            currentLine += ' ' + word;
        } else {
            lines.push(currentLine);
            currentLine = word;
        }
    }
    if (currentLine) lines.push(currentLine);
    return lines;
}

function downloadSocialCardPNG() {
    const canvas = document.getElementById('social-card-canvas');
    if (!canvas) return;
    const link = document.createElement('a');
    const slug = activeShareItem?.item?.id || 'hiitech-post';
    link.download = `${slug}-poster.png`;
    link.href = canvas.toDataURL('image/png');
    link.click();
    showCyberToast('پوستر گرافیکی هایتک با کیفیت ۱۰۸۰×۱۰۸۰ دانلود شد!', 'gold');
}

/* -----------------------------------------------------------
 * ۵. مسیریابی تک‌صفحه‌ای (SPA Tab Routing) و فرم تماس
 * ----------------------------------------------------------- */
function switchTab(tabId, skipHashUpdate = false) {
    const validTabs = ['home', 'news', 'blog', 'projects', 'about', 'contact', 'admin'];
    const target = validTabs.includes(tabId) ? tabId : 'home';

    triggerTopReloadBar();

    document.querySelectorAll('.spa-view').forEach(view => {
        view.classList.toggle('active', view.id === `view-${target}`);
    });

    document.querySelectorAll('[data-tab-btn]').forEach(btn => {
        const isCurrent = btn.getAttribute('data-tab-btn') === target;
        if (btn.classList.contains('nav-tab-btn')) {
            btn.classList.toggle('active', isCurrent);
        }
    });

    if (target === 'admin') {
        updateAdminDashboardStats();
        renderAdminContentList(currentAdminListFilter);
        renderAdminInbox();
        populateSiteSettingsForm();
        updateLiveAdminCardPreview();
    }

    if (!skipHashUpdate) {
        history.replaceState(null, '', `#${target}`);
    }

    window.scrollTo({ top: 0, behavior: 'smooth' });
    setTimeout(init3DTiltCards, 60);
}

function toggleMobileMenu(forceState) {
    const drawer = document.getElementById('mobile-nav-drawer');
    const openIcon = document.getElementById('menu-icon-open');
    const closeIcon = document.getElementById('menu-icon-close');
    if (!drawer) return;

    const isHidden = drawer.classList.contains('hidden');
    const shouldOpen = typeof forceState === 'boolean' ? forceState : isHidden;

    drawer.classList.toggle('hidden', !shouldOpen);
    if (openIcon && closeIcon) {
        openIcon.classList.toggle('hidden', shouldOpen);
        closeIcon.classList.toggle('hidden', !shouldOpen);
    }
}

function selectServicePill(btn, serviceName) {
    document.querySelectorAll('#service-selector .service-pill').forEach(el => {
        el.className = 'service-pill px-3.5 py-2 rounded-xl text-xs font-medium bg-white/[0.05] text-slate-300 border border-white/10 hover:border-cyberGold-400/40 transition';
    });
    btn.className = 'service-pill px-3.5 py-2 rounded-xl text-xs font-medium bg-cyberGold-400 text-obsidian-950 transition';
    const input = document.getElementById('contact-service');
    if (input) input.value = serviceName;
}

function submitContactForm(event) {
    event.preventDefault();
    const form = event.target;
    const name = document.getElementById('contact-name').value.trim();
    const contact = document.getElementById('contact-info').value.trim();
    const service = document.getElementById('contact-service').value;
    const message = document.getElementById('contact-desc').value.trim();

    if (!name || !contact || !message) return;

    // ذخیره در صندوق پیام پنل مدیریت هایتک
    const newMsg = {
        id: 'msg-' + Date.now(),
        name,
        contact,
        service,
        message,
        date: new Date().toLocaleDateString('fa-IR') + ' - ' + new Date().toLocaleTimeString('fa-IR', { hour: '2-digit', minute: '2-digit' })
    };
    cmsStore.inbox.unshift(newMsg);
    saveCMSStore();

    // ارسال غیرهمزمان به Netlify Forms در صورت میزبانی روی دامنه Netlify
    try {
        const formData = new FormData(form);
        fetch('/', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(formData).toString()
        }).catch(() => { });
    } catch (err) { }

    form.reset();
    const successBox = document.getElementById('contact-success-box');
    if (successBox) {
        successBox.classList.remove('hidden');
        setTimeout(() => successBox.classList.add('hidden'), 6500);
    }
    showCyberToast('درخواست مشاوره شما در سیستم هایتک ثبت شد!', 'cyan');
}

/* -----------------------------------------------------------
 * ۶. منطق کامل پنل مدیریت حرفه‌ای هایتک و کامپایلر Netlify
 * ----------------------------------------------------------- */
function handleAdminLogin(event) {
    event.preventDefault();
    const pass = document.getElementById('admin-passcode-input').value.trim();
    if (pass === 'hiitech2026' || pass.length >= 4) {
        unlockAdminPanel();
    } else {
        showCyberToast('رمز عبور نامعتبر است (پیش‌فرض: hiitech2026)', 'rose');
    }
}

function unlockAdminPanel() {
    const gate = document.getElementById('admin-login-gate');
    const workspace = document.getElementById('admin-workspace');
    if (gate) gate.classList.add('hidden');
    if (workspace) workspace.classList.remove('hidden');
    updateAdminDashboardStats();
    renderAdminContentList(currentAdminListFilter);
    renderAdminInbox();
    populateSiteSettingsForm();
    updateLiveAdminCardPreview();
    showCyberToast('خوش آمدید! استودیوی مدیریت محتوای هایتک فعال شد.', 'gold');
}

function switchAdminSubtab(subtabId) {
    unlockAdminPanel();
    document.querySelectorAll('.admin-subview').forEach(v => {
        v.classList.toggle('hidden', v.id !== `admin-subview-${subtabId}`);
    });
    document.querySelectorAll('[data-admin-subtab]').forEach(btn => {
        btn.classList.toggle('active', btn.getAttribute('data-admin-subtab') === subtabId);
    });
    if (subtabId === 'upload') {
        updateLiveAdminCardPreview();
        renderAdminContentList(currentAdminListFilter);
    } else if (subtabId === 'settings') {
        populateSiteSettingsForm();
    } else if (subtabId === 'inbox') {
        renderAdminInbox();
    }
}

function updateAdminDashboardStats() {
    const setNum = (id, n) => {
        const el = document.getElementById(id);
        if (el) el.textContent = toPersianDigits(n);
    };
    setNum('stat-count-news', cmsStore.news.length);
    setNum('stat-count-blog', cmsStore.blog.length);
    setNum('stat-count-projects', cmsStore.projects.length);
    setNum('stat-count-inbox', cmsStore.inbox.length);
    setNum('admin-inbox-badge', cmsStore.inbox.length);
}

function setAdminContentSection(section) {
    const secInput = document.getElementById('cms-section-input');
    if (secInput) secInput.value = section;

    document.querySelectorAll('[data-sec-pick]').forEach(btn => {
        const active = btn.getAttribute('data-sec-pick') === section;
        btn.className = active
            ? 'py-2.5 px-3 rounded-xl text-xs font-bold bg-cyberGold-400 text-obsidian-950 transition'
            : 'py-2.5 px-3 rounded-xl text-xs font-medium bg-white/[0.04] text-slate-300 border border-white/10 transition';
    });

    const projMetricsRow = document.getElementById('cms-project-metrics-row');
    if (projMetricsRow) {
        projMetricsRow.classList.toggle('hidden', section !== 'projects');
        projMetricsRow.classList.toggle('grid', section === 'projects');
    }

    updateLiveAdminCardPreview();
}

function selectSvgPreset(preset) {
    const input = document.getElementById('cms-svg-preset');
    if (input) input.value = preset;

    document.querySelectorAll('[data-svg-pick]').forEach(btn => {
        const active = btn.getAttribute('data-svg-pick') === preset;
        btn.className = active
            ? 'p-2 rounded-xl border border-cyberGold-400 bg-cyberGold-400/10 text-[11px] text-cyberGold-300 font-medium'
            : 'p-2 rounded-xl border border-white/10 bg-white/[0.03] text-[11px] text-slate-300';
    });
    updateLiveAdminCardPreview();
}

// فشرده‌سازی هوشمند تصویر در مرورگر (بدون نیاز به سرور)
function handleImageFileSelect(event) {
    const file = event.target.files?.[0];
    if (file) compressAndLoadImage(file);
}

function handleImageDrop(event) {
    event.preventDefault();
    event.currentTarget.classList.remove('dragover');
    const file = event.dataTransfer?.files?.[0];
    if (file && file.type.startsWith('image/')) {
        compressAndLoadImage(file);
    }
}

function compressAndLoadImage(file) {
    const reader = new FileReader();
    reader.onload = function (e) {
        const img = new Image();
        img.onload = function () {
            const canvas = document.createElement('canvas');
            const MAX_WIDTH = 900;
            let width = img.width;
            let height = img.height;

            if (width > MAX_WIDTH) {
                height = Math.round((height * MAX_WIDTH) / width);
                width = MAX_WIDTH;
            }

            canvas.width = width;
            canvas.height = height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0, width, height);

            currentUploadedImageData = canvas.toDataURL('image/webp', 0.82);
            document.getElementById('cms-image-url-input').value = '';
            updateLiveAdminCardPreview();
            showCyberToast('تصویر با موفقیت بهینه‌سازی و آماده درج در کارت شد!', 'cyan');
        };
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);
}

function handleExternalImageUrl(url) {
    currentUploadedImageData = url.trim();
    updateLiveAdminCardPreview();
}

function clearUploadedCoverImage() {
    currentUploadedImageData = '';
    const urlInput = document.getElementById('cms-image-url-input');
    const fileInput = document.getElementById('cms-image-file');
    if (urlInput) urlInput.value = '';
    if (fileInput) fileInput.value = '';
    updateLiveAdminCardPreview();
}

// پیش‌نمایش زنده کارت سه‌بعدی در پنل مدیریت
function updateLiveAdminCardPreview() {
    const previewContainer = document.getElementById('admin-live-card-preview');
    if (!previewContainer) return;

    const section = document.getElementById('cms-section-input')?.value || 'news';
    const title = document.getElementById('cms-title-input')?.value.trim() || 'عنوان نمونه مطلب یا پروژه هایتک';
    const badge = document.getElementById('cms-badge-input')?.value.trim() || 'فناوری هایتک';
    const meta = document.getElementById('cms-meta-input')?.value.trim() || 'آبان ۱۴۰۵ • مطالعه ۴ دقیقه';
    const excerpt = document.getElementById('cms-excerpt-input')?.value.trim() || 'خلاصه مطلب یا دستاورد فنی پروژه شما در این قسمت روی کارت سه‌بعدی نمایش داده می‌شود...';
    const tagsRaw = document.getElementById('cms-tags-input')?.value || 'هوش مصنوعی، معماری وب';
    const tags = tagsRaw.split(/[,،]/).map(t => t.trim()).filter(Boolean);
    const svgPreset = document.getElementById('cms-svg-preset')?.value || 'circuit-core';
    const featured = document.getElementById('cms-featured-checkbox')?.checked;
    const metricVal = document.getElementById('cms-metric-val')?.value.trim() || '';
    const metricSub = document.getElementById('cms-metric-sub')?.value.trim() || '';

    previewContainer.innerHTML = `
        <article class="tilt-card ${featured ? 'card-featured-gold' : ''} p-6 sm:p-7 flex flex-col justify-between" data-tilt>
          <div class="tilt-glare"></div>
          <div class="tilt-content">
            ${currentUploadedImageData ? `
              <div class="mb-4 rounded-2xl overflow-hidden border border-white/10 h-44 bg-obsidian-950">
                <img src="${currentUploadedImageData}" alt="پیش‌نمایش" class="w-full h-full object-cover" />
              </div>
            ` : ''}
            <div class="flex items-center justify-between gap-2 mb-4">
              <div class="w-10 h-10 rounded-2xl bg-cyberCyan-500/10 border border-cyberCyan-400/25 flex items-center justify-center">
                ${getSvgPresetMarkup(svgPreset)}
              </div>
              <span class="text-[11px] font-semibold text-cyberGold-300 bg-cyberGold-400/10 border border-cyberGold-400/25 px-3 py-1 rounded-full">
                ${badge}
              </span>
            </div>
            <div class="text-[11px] text-slate-400 mb-1.5">${meta}</div>
            <h4 class="text-lg font-extrabold text-white leading-snug mb-2.5">${title}</h4>
            <p class="text-xs text-slate-300/85 leading-6 mb-4">${excerpt}</p>
            ${section === 'projects' && metricVal ? `
              <div class="mb-4 p-3.5 rounded-xl bg-obsidian-950/90 border border-cyberGold-400/25">
                <div class="text-sm font-black text-cyberGold-400">${metricVal}</div>
                <div class="text-[11px] text-slate-400 mt-0.5">${metricSub}</div>
              </div>
            ` : ''}
          </div>
          <div class="tilt-content pt-3 border-t border-white/10 flex flex-wrap gap-1.5">
            ${tags.map(t => `<span class="tech-pill">${t}</span>`).join('')}
          </div>
        </article>
      `;

    init3DTiltCards();
}

function saveCMSContentItem(event) {
    event.preventDefault();
    const editId = document.getElementById('cms-edit-id').value.trim();
    const section = document.getElementById('cms-section-input').value;
    const cat = document.getElementById('cms-cat-select').value;
    const title = document.getElementById('cms-title-input').value.trim();
    const meta = document.getElementById('cms-meta-input').value.trim() || 'آبان ۱۴۰۵ • هایتک';
    const badge = document.getElementById('cms-badge-input').value.trim() || 'فناوری هایتک';
    const excerpt = document.getElementById('cms-excerpt-input').value.trim();
    const content = document.getElementById('cms-content-input').value.trim();
    const tags = document.getElementById('cms-tags-input').value
        .split(/[,،]/)
        .map(t => t.trim())
        .filter(Boolean);
    const svgPreset = document.getElementById('cms-svg-preset').value || 'circuit-core';
    const featured = document.getElementById('cms-featured-checkbox').checked;
    const metricVal = document.getElementById('cms-metric-val').value.trim();
    const metricSub = document.getElementById('cms-metric-sub').value.trim();

    const itemObj = {
        id: editId || `${section}-${Date.now()}`,
        cat,
        badge,
        meta,
        title,
        excerpt,
        content,
        tags: tags.length ? tags : ['هایتک', 'فناوری'],
        svgPreset,
        featured,
        coverImage: currentUploadedImageData || ''
    };

    if (section === 'projects') {
        itemObj.metricVal = metricVal;
        itemObj.metricSub = metricSub;
    }

    // در صورت ویرایش، حذف نسخه قبلی از تمام بخش‌ها و درج در بخش انتخابی
    ['news', 'blog', 'projects'].forEach(sec => {
        cmsStore[sec] = cmsStore[sec].filter(i => i.id !== itemObj.id);
    });

    cmsStore[section].unshift(itemObj);
    saveCMSStore();

    renderNewsCards();
    renderBlogCards();
    renderProjectCards();
    renderAdminContentList(currentAdminListFilter);
    resetAdminForm();

    showCyberToast('محتوای جدید با موفقیت در سایت هایتک منتشر شد!', 'gold');
}

function resetAdminForm() {
    const form = document.getElementById('cms-content-form');
    if (form) form.reset();
    document.getElementById('cms-edit-id').value = '';
    document.getElementById('editor-mode-badge').textContent = 'افزودن محتوای جدید به سایت هایتک';
    document.getElementById('editor-form-heading').textContent = 'انتشار مطلب یا پروژه جدید';
    clearUploadedCoverImage();
    setAdminContentSection('news');
    selectSvgPreset('circuit-core');
}

function renderAdminContentList(filterSec = 'all') {
    currentAdminListFilter = filterSec;
    document.querySelectorAll('[data-adm-filter]').forEach(btn => {
        const active = btn.getAttribute('data-adm-filter') === filterSec;
        btn.className = active
            ? 'px-3.5 py-1.5 rounded-full text-xs font-bold bg-cyberGold-400 text-obsidian-950'
            : 'px-3.5 py-1.5 rounded-full text-xs bg-white/[0.05] text-slate-300';
    });

    const container = document.getElementById('admin-existing-items-list');
    if (!container) return;

    const sectionLabels = {
        news: 'آخرین اخبار تکنولوژی',
        blog: 'وبلاگ هوش مصنوعی',
        projects: 'پروژه‌های ما'
    };

    let combined = [];
    ['news', 'blog', 'projects'].forEach(sec => {
        if (filterSec === 'all' || filterSec === sec) {
            cmsStore[sec].forEach(item => combined.push({ section: sec, item }));
        }
    });

    if (!combined.length) {
        container.innerHTML = `<div class="p-8 rounded-2xl bg-white/[0.02] text-center text-xs text-slate-400">هیچ محتوایی در این بخش وجود ندارد.</div>`;
        return;
    }

    container.innerHTML = combined.map(({ section, item }) => `
        <div class="p-4 rounded-2xl bg-obsidian-950/85 border border-white/10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
          <div class="space-y-1">
            <div class="flex flex-wrap items-center gap-2">
              <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-cyberCyan-500/15 text-cyberCyan-300">${sectionLabels[section]}</span>
              ${item.featured ? `<span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-cyberGold-400/20 text-cyberGold-300">★ ویژه</span>` : ''}
              <span class="text-[11px] text-slate-400">${item.meta || ''}</span>
            </div>
            <h4 class="text-sm font-bold text-white">${item.title}</h4>
          </div>

          <div class="flex flex-wrap items-center gap-2 shrink-0">
            <button
              type="button"
              onclick="openShareModal('${section}', '${item.id}')"
              class="px-3 py-1.5 rounded-xl bg-cyberCyan-500/15 hover:bg-cyberCyan-500/25 text-cyberCyan-300 text-xs font-semibold transition"
            >
              اشتراک‌گذاری ↗
            </button>
            <button
              type="button"
              onclick="editCMSItem('${section}', '${item.id}')"
              class="px-3 py-1.5 rounded-xl bg-white/[0.06] hover:bg-white/[0.12] text-white text-xs transition"
            >
              ویرایش
            </button>
            <button
              type="button"
              onclick="deleteCMSItem('${section}', '${item.id}')"
              class="px-3 py-1.5 rounded-xl bg-rose-500/15 hover:bg-rose-500/25 text-rose-300 text-xs transition"
            >
              حذف
            </button>
          </div>
        </div>
      `).join('');
}

function editCMSItem(section, id) {
    const item = findCMSItem(section, id);
    if (!item) return;

    setAdminContentSection(section);
    document.getElementById('cms-edit-id').value = item.id;
    document.getElementById('cms-cat-select').value = item.cat || 'ai';
    document.getElementById('cms-title-input').value = item.title || '';
    document.getElementById('cms-meta-input').value = item.meta || '';
    document.getElementById('cms-badge-input').value = item.badge || '';
    document.getElementById('cms-excerpt-input').value = item.excerpt || '';
    document.getElementById('cms-content-input').value = item.content || '';
    document.getElementById('cms-tags-input').value = (item.tags || []).join('، ');
    document.getElementById('cms-featured-checkbox').checked = Boolean(item.featured);
    document.getElementById('cms-metric-val').value = item.metricVal || '';
    document.getElementById('cms-metric-sub').value = item.metricSub || '';

    currentUploadedImageData = item.coverImage || '';
    selectSvgPreset(item.svgPreset || 'circuit-core');

    document.getElementById('editor-mode-badge').textContent = 'در حال ویرایش محتوای هایتک';
    document.getElementById('editor-form-heading').textContent = `ویرایش: ${item.title}`;
    updateLiveAdminCardPreview();
    window.scrollTo({ top: 180, behavior: 'smooth' });
}

function deleteCMSItem(section, id) {
    cmsStore[section] = (cmsStore[section] || []).filter(i => i.id !== id);
    saveCMSStore();
    renderNewsCards();
    renderBlogCards();
    renderProjectCards();
    renderAdminContentList(currentAdminListFilter);
    showCyberToast('آیتم انتخابی از سایت حذف شد.', 'rose');
}

function populateSiteSettingsForm() {
    const s = cmsStore.settings || DEFAULT_CMS_DATA.settings;
    const setVal = (id, v) => {
        const el = document.getElementById(id);
        if (el) el.value = v || '';
    };
    setVal('set-hero-badge', s.heroBadge);
    setVal('set-hero-h1', s.heroH1);
    setVal('set-hero-desc', s.heroDesc);
    setVal('set-m1-val', s.m1Val);
    setVal('set-m1-lbl', s.m1Label);
    setVal('set-m2-val', s.m2Val);
    setVal('set-m2-lbl', s.m2Label);
    setVal('set-m3-val', s.m3Val);
    setVal('set-m3-lbl', s.m3Label);
    setVal('set-contact-email', s.contactEmail);
    setVal('set-contact-address', s.contactAddress);
}

function saveSiteSettingsForm(event) {
    event.preventDefault();
    cmsStore.settings = {
        ...cmsStore.settings,
        heroBadge: document.getElementById('set-hero-badge').value.trim(),
        heroH1: document.getElementById('set-hero-h1').value.trim(),
        heroDesc: document.getElementById('set-hero-desc').value.trim(),
        m1Val: document.getElementById('set-m1-val').value.trim(),
        m1Label: document.getElementById('set-m1-lbl').value.trim(),
        m2Val: document.getElementById('set-m2-val').value.trim(),
        m2Label: document.getElementById('set-m2-lbl').value.trim(),
        m3Val: document.getElementById('set-m3-val').value.trim(),
        m3Label: document.getElementById('set-m3-lbl').value.trim(),
        contactEmail: document.getElementById('set-contact-email').value.trim(),
        contactAddress: document.getElementById('set-contact-address').value.trim()
    };
    saveCMSStore();
    applySiteSettingsToDOM();
    showCyberToast('تنظیمات صفحه اصلی و آمار هایتک به‌روزرسانی شد!', 'gold');
}

function renderAdminInbox() {
    const list = document.getElementById('admin-inbox-list');
    if (!list) return;

    if (!cmsStore.inbox.length) {
        list.innerHTML = `<div class="p-8 rounded-2xl bg-white/[0.02] text-center text-xs text-slate-400">صندوق پیام‌های مشاوره خالی است.</div>`;
        return;
    }

    list.innerHTML = cmsStore.inbox.map(msg => `
        <div class="p-5 rounded-2xl bg-obsidian-950/90 border border-white/10 space-y-2">
          <div class="flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-2">
              <span class="text-sm font-extrabold text-white">${msg.name}</span>
              <span class="text-xs px-2.5 py-0.5 rounded-full bg-cyberGold-400/15 text-cyberGold-300">${msg.service}</span>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-[11px] text-slate-400">${msg.date}</span>
              <button type="button" onclick="deleteInboxMessage('${msg.id}')" class="text-xs text-rose-400 hover:underline">حذف</button>
            </div>
          </div>
          <div class="text-xs font-mono text-cyberCyan-300">${msg.contact}</div>
          <p class="text-xs sm:text-sm text-slate-300 leading-7 pt-1">${msg.message}</p>
        </div>
      `).join('');
}

function deleteInboxMessage(id) {
    cmsStore.inbox = cmsStore.inbox.filter(m => m.id !== id);
    saveCMSStore();
    renderAdminInbox();
    showCyberToast('پیام از صندوق حذف شد.', 'rose');
}

// کامپایلر مستقیم فایل index.html برای انتشار بدون سرور در Netlify
function downloadBakedNetlifyHTML() {
    const serializedData = JSON.stringify(cmsStore, null, 2);
    const replacementBlock = `/*__HIITECH_BAKED_DATA_START__*/\n    const DEFAULT_CMS_DATA = ${serializedData};\n    /*__HIITECH_BAKED_DATA_END__*/`;

    let fullHtml = '<!DOCTYPE html>\n' + document.documentElement.outerHTML;
    const regex = /\/\*__HIITECH_BAKED_DATA_START__\*\/[\s\S]*?\/\*__HIITECH_BAKED_DATA_END__\*\//;

    if (regex.test(fullHtml)) {
        fullHtml = fullHtml.replace(regex, replacementBlock);
    }

    const blob = new Blob([fullHtml], { type: 'text/html;charset=utf-8' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'index.html';
    document.body.appendChild(a);
    a.click();
    a.remove();
    URL.revokeObjectURL(url);

    showCyberToast('فایل کامل index.html آماده انتشار در Netlify دانلود شد!', 'gold');
}

/* -----------------------------------------------------------
 * ۶.۵. موتور تفکیک و تولید ۳ فایل مجزا (index.html + styles.css + app.js)
 * ----------------------------------------------------------- */
let currentDeployTabType = 'html';

function generateSeparatedFiles() {
    // ۱. استخراج کامل فایل styles.css
    const styleEl = document.getElementById('hiitech-main-styles');
    const cssContent = styleEl
        ? `/* =========================================================\n * استایل‌های رسمی وب‌سایت استودیوی فناوری هایتک (HiiTECH)\n * File: styles.css\n * ========================================================= */\n` + styleEl.innerHTML.trim() + '\n'
        : '';

    // ۲. استخراج کامل فایل app.js به همراه آخرین داده‌های CMS
    const scriptEl = document.getElementById('hiitech-main-script');
    let jsContent = scriptEl ? scriptEl.innerHTML.trim() : '';
    const serializedData = JSON.stringify(cmsStore, null, 2);
    const replacementBlock = `/*__HIITECH_BAKED_DATA_START__*/\n    const DEFAULT_CMS_DATA = ${serializedData};\n    /*__HIITECH_BAKED_DATA_END__*/`;
    const dataRegex = /\/\*__HIITECH_BAKED_DATA_START__\*\/[\s\S]*?\/\*__HIITECH_BAKED_DATA_END__\*\//;
    if (dataRegex.test(jsContent)) {
        jsContent = jsContent.replace(dataRegex, replacementBlock);
    }
    jsContent = `/* =========================================================\n * منطق برنامه تک‌صفحه‌ای، بوم سه‌بعدی، ژیروسکوپ و CMS هایتک\n * File: app.js\n * ========================================================= */\n` + jsContent + '\n';

    // ۳. تولید فایل تمیز index.html متصل به styles.css و app.js
    const docClone = document.documentElement.cloneNode(true);

    // حذف استایل درون‌خطی و جایگزینی با لینک styles.css
    const cloneStyle = docClone.querySelector('#hiitech-main-styles');
    if (cloneStyle) {
        const linkTag = document.createElement('link');
        linkTag.setAttribute('rel', 'stylesheet');
        linkTag.setAttribute('href', 'styles.css');
        cloneStyle.parentNode.replaceChild(linkTag, cloneStyle);
    }

    // حذف اسکریپت درون‌خطی و جایگزینی با لینک app.js
    const cloneScript = docClone.querySelector('#hiitech-main-script');
    if (cloneScript) {
        const externalScript = document.createElement('script');
        externalScript.setAttribute('src', 'app.js');
        cloneScript.parentNode.replaceChild(externalScript, cloneScript);
    }

    // پاک‌سازی اعلان‌های موقت در نسخه خروجی
    const cloneToast = docClone.querySelector('#cyber-toast-container');
    if (cloneToast) cloneToast.innerHTML = '';
    const cloneDeployModal = docClone.querySelector('#deploy-3files-modal');
    if (cloneDeployModal) {
        cloneDeployModal.classList.add('hidden');
        cloneDeployModal.classList.remove('flex');
    }

    const htmlContent = '<!DOCTYPE html>\n' + docClone.outerHTML;

    return {
        html: htmlContent,
        css: cssContent,
        js: jsContent
    };
}

function openDeploy3FilesModal() {
    const modal = document.getElementById('deploy-3files-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    switchDeployCodeTab('html');
}

function closeDeploy3FilesModal() {
    const modal = document.getElementById('deploy-3files-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function switchDeployCodeTab(type) {
    currentDeployTabType = type;
    const files = generateSeparatedFiles();
    const viewer = document.getElementById('deploy-code-viewer');
    if (viewer) {
        viewer.value = files[type] || '';
    }

    document.querySelectorAll('[data-deploy-tab]').forEach(btn => {
        const active = btn.getAttribute('data-deploy-tab') === type;
        btn.className = active
            ? 'px-3.5 py-1.5 rounded-xl text-xs font-mono font-bold bg-cyberGold-400 text-obsidian-950 transition'
            : 'px-3.5 py-1.5 rounded-xl text-xs font-mono font-medium bg-white/[0.05] text-slate-300 hover:text-white transition';
    });
}

function copyDeployCodeTab() {
    const viewer = document.getElementById('deploy-code-viewer');
    if (!viewer) return;
    viewer.select();
    viewer.setSelectionRange(0, 999999);
    try {
        document.execCommand('copy');
        const names = { html: 'index.html', css: 'styles.css', js: 'app.js' };
        showCyberToast(`کد کامل فایل ${names[currentDeployTabType]} در کلیپ‌بورد کپی شد!`, 'cyan');
    } catch (e) {
        showCyberToast('لطفاً متن انتخاب‌شده را کپی نمایید.', 'gold');
    }
}

function downloadSingleSeparatedFile(type) {
    const files = generateSeparatedFiles();
    const meta = {
        html: { name: 'index.html', mime: 'text/html;charset=utf-8' },
        css: { name: 'styles.css', mime: 'text/css;charset=utf-8' },
        js: { name: 'app.js', mime: 'application/javascript;charset=utf-8' }
    }[type];

    if (!meta || !files[type]) return;

    const blob = new Blob([files[type]], { type: meta.mime });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = meta.name;
    document.body.appendChild(a);
    a.click();
    a.remove();
    setTimeout(() => URL.revokeObjectURL(url), 1500);

    showCyberToast(`فایل ${meta.name} دانلود شد!`, 'gold');
}

function downloadAllThreeFiles() {
    downloadSingleSeparatedFile('html');
    setTimeout(() => downloadSingleSeparatedFile('css'), 350);
    setTimeout(() => downloadSingleSeparatedFile('js'), 700);
    showCyberToast('هر ۳ فایل (index.html + styles.css + app.js) با موفقیت دانلود شدند!', 'cyan');
}

function exportCMSDatabaseJSON() {
    const blob = new Blob([JSON.stringify(cmsStore, null, 2)], { type: 'application/json;charset=utf-8' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'hiitech-cms-backup.json';
    a.click();
    URL.revokeObjectURL(url);
    showCyberToast('فایل پشتیبان JSON دانلود شد.', 'cyan');
}

function importCMSDatabaseJSON(event) {
    const file = event.target.files?.[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (e) {
        try {
            const imported = JSON.parse(e.target.result);
            cmsStore = {
                settings: { ...DEFAULT_CMS_DATA.settings, ...(imported.settings || {}) },
                news: Array.isArray(imported.news) ? imported.news : DEFAULT_CMS_DATA.news,
                blog: Array.isArray(imported.blog) ? imported.blog : DEFAULT_CMS_DATA.blog,
                projects: Array.isArray(imported.projects) ? imported.projects : DEFAULT_CMS_DATA.projects,
                inbox: Array.isArray(imported.inbox) ? imported.inbox : DEFAULT_CMS_DATA.inbox
            };
            saveCMSStore();
            applySiteSettingsToDOM();
            renderNewsCards();
            renderBlogCards();
            renderProjectCards();
            renderAdminContentList(currentAdminListFilter);
            renderAdminInbox();
            showCyberToast('بانک اطلاعاتی سایت هایتک با موفقیت بازیابی شد!', 'gold');
        } catch (err) {
            showCyberToast('فرمت فایل JSON معتبر نیست.', 'rose');
        }
    };
    reader.readAsText(file);
}

function resetCMSToFactoryDefaults() {
    localStorage.removeItem(STORAGE_KEY_CMS);
    cmsStore = JSON.parse(JSON.stringify(DEFAULT_CMS_DATA));
    applySiteSettingsToDOM();
    renderNewsCards();
    renderBlogCards();
    renderProjectCards();
    updateAdminDashboardStats();
    renderAdminContentList('all');
    renderAdminInbox();
    showCyberToast('داده‌های پیش‌فرض استودیوی فناوری هایتک بازگردانی شد.', 'cyan');
}

function triggerNetlifyBuildHook() {
    const hookUrl = document.getElementById('netlify-hook-url')?.value.trim();
    if (!hookUrl || !hookUrl.startsWith('https://')) {
        showCyberToast('لطفاً ابتدا آدرس معتبر Netlify Build Hook را وارد کنید.', 'rose');
        return;
    }
    cmsStore.settings.netlifyHookUrl = hookUrl;
    saveCMSStore();

    fetch(hookUrl, { method: 'POST' })
        .then(() => showCyberToast('فرمان ساخت و انتشار مجدد به Netlify ارسال شد!', 'cyan'))
        .catch(() => showCyberToast('خطا در ارتباط با وب‌هوک Netlify.', 'rose'));
}

/* -----------------------------------------------------------
 * ۷. فیزیک ژیروسکوپ سه‌بعدی کارت‌ها (3D Tilt Cards)
 * ----------------------------------------------------------- */
function init3DTiltCards() {
    const cards = document.querySelectorAll('[data-tilt]');
    cards.forEach(card => {
        if (card.dataset.tiltBound === 'true') return;
        card.dataset.tiltBound = 'true';

        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y - centerY) / centerY) * -6.5;
            const rotateY = ((x - centerX) / centerX) * 6.5;

            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
            card.style.transform = `rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'rotateX(0deg) rotateY(0deg)';
        });
    });
}

/* -----------------------------------------------------------
 * ۸. بوم ذرات صفحه ریلود و بوم سه‌بعدی هسته لامپ-مدار هایتک
 * ----------------------------------------------------------- */
function initPreloaderParticles() {
    const canvas = document.getElementById('preloader-particle-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let w = (canvas.width = window.innerWidth);
    let h = (canvas.height = window.innerHeight);

    const particles = Array.from({ length: 34 }, () => ({
        x: Math.random() * w,
        y: Math.random() * h,
        r: Math.random() * 1.8 + 0.6,
        vx: (Math.random() - 0.5) * 0.45,
        vy: (Math.random() - 0.5) * 0.45,
        color: Math.random() > 0.5 ? '#f5c451' : '#2dd4bf'
    }));

    function draw() {
        const preloader = document.getElementById('hiitech-preloader');
        if (preloader && preloader.classList.contains('preloader-hidden')) return;
        ctx.clearRect(0, 0, w, h);
        particles.forEach(p => {
            p.x += p.vx;
            p.y += p.vy;
            if (p.x < 0) p.x = w;
            if (p.x > w) p.x = 0;
            if (p.y < 0) p.y = h;
            if (p.y > h) p.y = 0;

            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = p.color;
            ctx.globalAlpha = 0.45;
            ctx.fill();
        });
        requestAnimationFrame(draw);
    }
    draw();
}

// بوم سه‌بعدی تعاملی هسته لامپ-مدار هایتک در بخش Hero
function initHiitechCoreCanvas() {
    const canvas = document.getElementById('hiitech-core-canvas');
    const container = document.getElementById('core-portal-container');
    if (!canvas || !container) return;

    const ctx = canvas.getContext('2d');
    let size = 440;
    let dpr = Math.min(window.devicePixelRatio || 1, 2);

    function resizeCanvas() {
        const rect = container.getBoundingClientRect();
        size = Math.max(rect.width || 420, 280);
        canvas.width = size * dpr;
        canvas.height = size * dpr;
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    }

    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    const pointer = { x: 0, y: 0, targetX: 0, targetY: 0 };
    let pulseBoost = 0;

    window.triggerHiitechCorePulse = function () {
        pulseBoost = 1.35;
    };

    container.addEventListener('mousemove', e => {
        const rect = container.getBoundingClientRect();
        pointer.targetX = ((e.clientX - rect.left) / rect.width - 0.5) * 2;
        pointer.targetY = ((e.clientY - rect.top) / rect.height - 0.5) * 2;
    });

    container.addEventListener('mouseleave', () => {
        pointer.targetX = 0;
        pointer.targetY = 0;
    });

    container.addEventListener('click', () => {
        pulseBoost = 1.25;
    });

    // ایجاد شاخه‌های مدار سیان و گره‌های نورانی اطراف هسته طلایی هایتک
    const branchCount = 14;
    const branches = Array.from({ length: branchCount }, (_, i) => {
        const baseAngle = (i / branchCount) * Math.PI * 2;
        return {
            baseAngle,
            len1: 58 + (i % 3) * 16,
            turnAngle: (i % 2 === 0 ? 1 : -1) * 0.42,
            len2: 46 + ((i + 1) % 3) * 18,
            len3: 32 + (i % 2) * 16,
            speed: 0.6 + (i % 4) * 0.22,
            phase: i * 0.7
        };
    });

    // ذرات سه‌بعدی معلق در فضای کروی
    const floatingNodes = Array.from({ length: 42 }, () => ({
        angle: Math.random() * Math.PI * 2,
        radius: 45 + Math.random() * 145,
        z: Math.random() * 2 - 1,
        speed: (Math.random() - 0.5) * 0.008,
        size: 1.2 + Math.random() * 2,
        isGold: Math.random() > 0.55
    }));

    let time = 0;

    function animateCore() {
        time += 0.018;
        pulseBoost *= 0.94;

        pointer.x += (pointer.targetX - pointer.x) * 0.08;
        pointer.y += (pointer.targetY - pointer.y) * 0.08;

        ctx.clearRect(0, 0, size, size);

        const cx = size / 2 + pointer.x * 18;
        const cy = size / 2 + pointer.y * 18;

        // ۱. هاله‌های پس‌زمینه طلایی و سیان
        const outerGlow = ctx.createRadialGradient(cx, cy, 12, cx, cy, size * 0.44);
        outerGlow.addColorStop(0, 'rgba(245, 196, 81, 0.42)');
        outerGlow.addColorStop(0.32, 'rgba(245, 196, 81, 0.14)');
        outerGlow.addColorStop(0.68, 'rgba(45, 212, 191, 0.06)');
        outerGlow.addColorStop(1, 'rgba(5, 8, 12, 0)');
        ctx.fillStyle = outerGlow;
        ctx.beginPath();
        ctx.arc(cx, cy, size * 0.46, 0, Math.PI * 2);
        ctx.fill();

        // ۲. رسم شاخه‌های مدار الکترونیکی سیان و پالس‌های داده
        const scaleFactor = size / 440;
        branches.forEach(b => {
            const a1 = b.baseAngle + time * 0.08 + pointer.x * 0.18;
            const r0 = 36 * scaleFactor;
            const r1 = (36 + b.len1) * scaleFactor;
            const a2 = a1 + b.turnAngle;
            const r2 = r1 + b.len2 * scaleFactor;
            const r3 = r2 + b.len3 * scaleFactor;

            const x0 = cx + Math.cos(a1) * r0;
            const y0 = cy + Math.sin(a1) * r0;
            const x1 = cx + Math.cos(a1) * r1;
            const y1 = cy + Math.sin(a1) * r1;
            const x2 = cx + Math.cos(a2) * r2;
            const y2 = cy + Math.sin(a2) * r2;
            const x3 = cx + Math.cos(a2) * r3;
            const y3 = cy + Math.sin(a2) * r3;

            ctx.strokeStyle = 'rgba(45, 212, 191, 0.28)';
            ctx.lineWidth = 1.35;
            ctx.beginPath();
            ctx.moveTo(x0, y0);
            ctx.lineTo(x1, y1);
            ctx.lineTo(x2, y2);
            ctx.lineTo(x3, y3);
            ctx.stroke();

            // گره‌های انتهایی مدار
            ctx.fillStyle = '#2dd4bf';
            ctx.beginPath();
            ctx.arc(x3, y3, 2.5 * scaleFactor, 0, Math.PI * 2);
            ctx.fill();

            // پالس نورانی متحرک روی مدار
            const tPulse = (time * b.speed + b.phase) % 1;
            let px, py;
            if (tPulse < 0.4) {
                const k = tPulse / 0.4;
                px = x0 + (x1 - x0) * k;
                py = y0 + (y1 - y0) * k;
            } else if (tPulse < 0.75) {
                const k = (tPulse - 0.4) / 0.35;
                px = x1 + (x2 - x1) * k;
                py = y1 + (y2 - y1) * k;
            } else {
                const k = (tPulse - 0.75) / 0.25;
                px = x2 + (x3 - x2) * k;
                py = y2 + (y3 - y2) * k;
            }

            ctx.fillStyle = '#fde68a';
            ctx.beginPath();
            ctx.arc(px, py, 2.2 * scaleFactor, 0, Math.PI * 2);
            ctx.fill();
        });

        // ۳. ذرات شناور تعاملی
        floatingNodes.forEach(node => {
            node.angle += node.speed;
            const nx = cx + Math.cos(node.angle) * node.radius * scaleFactor + pointer.x * node.z * 14;
            const ny = cy + Math.sin(node.angle) * node.radius * scaleFactor + pointer.y * node.z * 14;

            ctx.fillStyle = node.isGold ? 'rgba(245, 196, 81, 0.75)' : 'rgba(45, 212, 191, 0.7)';
            ctx.beginPath();
            ctx.arc(nx, ny, node.size * scaleFactor, 0, Math.PI * 2);
            ctx.fill();
        });

        // ۴. هسته کروی طلایی درخشان هایتک در مرکز
        const pulseRadius = (38 + Math.sin(time * 2.2) * 3.5 + pulseBoost * 12) * scaleFactor;
        const coreGrad = ctx.createRadialGradient(cx, cy, 4, cx, cy, pulseRadius * 1.45);
        coreGrad.addColorStop(0, '#fffef5');
        coreGrad.addColorStop(0.45, '#fde08d');
        coreGrad.addColorStop(0.78, '#f5c451');
        coreGrad.addColorStop(1, 'rgba(234, 179, 8, 0)');

        ctx.fillStyle = coreGrad;
        ctx.beginPath();
        ctx.arc(cx, cy, pulseRadius * 1.45, 0, Math.PI * 2);
        ctx.fill();

        // حلقه طلایی دور هسته
        ctx.strokeStyle = 'rgba(254, 240, 138, 0.85)';
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.arc(cx, cy, pulseRadius * 0.92, 0, Math.PI * 2);
        ctx.stroke();

        // نماد الماس مرکزی هایتک در قلب گوی طلایی
        const dSize = 13 * scaleFactor;
        ctx.strokeStyle = '#1e293b';
        ctx.lineWidth = 2.2;
        ctx.beginPath();
        ctx.moveTo(cx, cy - dSize);
        ctx.lineTo(cx + dSize * 0.78, cy);
        ctx.lineTo(cx, cy + dSize);
        ctx.lineTo(cx - dSize * 0.78, cy);
        ctx.closePath();
        ctx.stroke();

        requestAnimationFrame(animateCore);
    }

    animateCore();
}

/* -----------------------------------------------------------
 * ۹. راه‌اندازی اولیه برنامه و مسیریابی Deep-Link
 * ----------------------------------------------------------- */
window.addEventListener('DOMContentLoaded', () => {
    initPreloaderParticles();
    runSystemBootPreloader(1550);

    applySiteSettingsToDOM();
    renderNewsCards();
    renderBlogCards();
    renderProjectCards();
    updateAdminDashboardStats();
    initHiitechCoreCanvas();
    init3DTiltCards();

    // بررسی Deep-Link در آدرس مرورگر (مثلاً #blog/blog-1 یا #projects)
    const hash = window.location.hash.replace('#', '');
    if (hash) {
        const [sec, itemId] = hash.split('/');
        if (['home', 'news', 'blog', 'projects', 'about', 'contact', 'admin'].includes(sec)) {
            switchTab(sec, true);
            if (itemId) {
                setTimeout(() => openDetailModal(sec, itemId), 450);
            }
        }
    }
});

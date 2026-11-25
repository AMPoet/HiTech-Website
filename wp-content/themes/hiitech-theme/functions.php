<?php
/**
 * توابع و تنظیمات قالب وردپرس هایتک (HiiTECH Studio)
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * پشتیبانی‌های پایه قالب وردپرس + ووکامرس + اندازه‌های تصویر
 */
function hiitech_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

    add_image_size( 'indexp', 600, 450, true );
    add_image_size( 'indexa', 720, 420, true );
}
add_action( 'after_setup_theme', 'hiitech_theme_setup' );

/**
 * بارگذاری استاندارد فونت‌ها، Tailwind CSS، استایل اصلی و اسکریپت app.js
 */
function hiitech_enqueue_assets() {
    $theme_version = wp_get_theme()->get( 'Version' );

    // فونت‌های Google Fonts (Vazirmatn و JetBrains Mono)
    wp_enqueue_style(
        'hiitech-google-fonts',
        'https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap',
        array(),
        null
    );

    // Tailwind CSS CDN + تنظیمات اختصاصی هایتک
    wp_enqueue_script(
        'hiitech-tailwind',
        'https://cdn.tailwindcss.com',
        array(),
        null,
        false
    );

    $tailwind_config = "
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Vazirmatn', 'system-ui', '-apple-system', 'sans-serif'],
            mono: ['JetBrains Mono', 'Vazirmatn', 'monospace'],
          },
          colors: {
            obsidian: {
              950: '#05080c',
              900: '#070b10',
              800: '#0c1219',
              700: '#121b26',
            },
            cyberGold: {
              300: '#fde08d',
              400: '#f5c451',
              500: '#eab308',
              600: '#ca8a04',
            },
            cyberCyan: {
              300: '#5eead4',
              400: '#2dd4bf',
              500: '#06b6d4',
              600: '#0891b2',
            }
          }
        }
      }
    };
    ";
    wp_add_inline_script( 'hiitech-tailwind', $tailwind_config, 'after' );

    // فایل استایل اصلی قالب (style.css)
    wp_enqueue_style(
        'hiitech-style',
        get_stylesheet_uri(),
        array( 'hiitech-google-fonts' ),
        $theme_version
    );

    // فایل جاوااسکریپت اصلی قالب (app.js)
    wp_enqueue_script(
        'hiitech-app',
        get_template_directory_uri() . '/app.js',
        array(),
        $theme_version,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'hiitech_enqueue_assets' );

/**
 * شمارنده سبک بازدید نوشته‌ها و برگه‌ها
 */
function hiitech_set_post_views( $post_id ) {
    if ( empty( $post_id ) || is_admin() ) {
        return;
    }
    $key   = '_hiitech_post_views';
    $count = (int) get_post_meta( $post_id, $key, true );
    update_post_meta( $post_id, $key, $count + 1 );
}

function hiitech_get_post_views( $post_id ) {
    $count = (int) get_post_meta( $post_id, '_hiitech_post_views', true );
    return number_format_i18n( $count );
}

/**
 * مسیر راهنمای استاندارد (Breadcrumbs) سازگار با طراحی هایتک
 */
function hiitech_breadcrumbs() {
    if ( function_exists( 'dimox_breadcrumbs' ) ) {
        dimox_breadcrumbs();
        return;
    }

    echo '<nav aria-label="مسیر صفحه" class="flex flex-wrap items-center gap-2 text-xs text-slate-400">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="hover:text-cyberGold-400 transition">خانه</a>';

    if ( is_category() || is_single() ) {
        $cats = get_the_category();
        if ( ! empty( $cats ) ) {
            echo '<span class="text-slate-600">/</span>';
            echo '<a href="' . esc_url( get_category_link( $cats[0]->term_id ) ) . '" class="hover:text-cyberGold-400 transition">' . esc_html( $cats[0]->name ) . '</a>';
        }
        if ( is_single() ) {
            echo '<span class="text-slate-600">/</span>';
            echo '<span class="text-slate-200">' . esc_html( get_the_title() ) . '</span>';
        }
    } elseif ( is_page() ) {
        echo '<span class="text-slate-600">/</span>';
        echo '<span class="text-slate-200">' . esc_html( get_the_title() ) . '</span>';
    } elseif ( is_archive() ) {
        echo '<span class="text-slate-600">/</span>';
        echo '<span class="text-slate-200">' . wp_kses_post( get_the_archive_title() ) . '</span>';
    }

    echo '</nav>';
}

/**
 * صفحه‌بندی مدرن و هماهنگ با قالب هایتک
 */
function hiitech_pagination() {
    $links = paginate_links(
        array(
            'type'      => 'array',
            'prev_text' => '→ قبلی',
            'next_text' => 'بعدی ←',
        )
    );

    if ( empty( $links ) ) {
        return;
    }

    echo '<nav aria-label="صفحه‌بندی" class="flex flex-wrap items-center justify-center gap-2">';
    foreach ( $links as $link ) {
        $is_current = strpos( $link, 'current' ) !== false;
        $cls        = $is_current
            ? 'px-4 py-2 rounded-xl text-xs font-bold bg-cyberGold-400 text-obsidian-950'
            : 'px-4 py-2 rounded-xl text-xs font-medium bg-white/[0.04] hover:bg-white/10 text-slate-300 border border-white/10 transition';
        echo str_replace( 'page-numbers', 'page-numbers inline-block ' . $cls, $link );
    }
    echo '</nav>';
}

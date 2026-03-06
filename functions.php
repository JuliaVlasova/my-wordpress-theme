<?php
/**
 * JVTravel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package JVTravel
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jvtravel_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jvtravel, use a find and replace
	 * to change 'jvtravel' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('jvtravel', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'jvtravel'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'jvtravel_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'jvtravel_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jvtravel_content_width()
{
	$GLOBALS['content_width'] = apply_filters('jvtravel_content_width', 640);
}
add_action('after_setup_theme', 'jvtravel_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jvtravel_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'jvtravel'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'jvtravel'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'jvtravel_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function add_critical_css()
{
	?>
	<style>
		html {
			line-height: 1.15;
			-webkit-text-size-adjust: 100%;
			box-sizing: border-box;
		}

		body {
			margin: 0;
		}

		main {
			display: block;
			padding-bottom: 40px;
			margin-bottom: 30px;
		}

		b,
		strong {
			font-weight: bolder;
		}

		img {
			border-style: none;
		}

		button,
		[type="button"],
		[type="reset"],
		[type="submit"] {
			-webkit-appearance: button;
			appearance: button;
		}

		.hidden {
			display: none;
		}

		*,
		*::before,
		*::after {
			box-sizing: border-box;
		}

		body,
		button,
		input,
		select,
		textarea {
			color: #404040;
			font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
			font-size: 16px;
			line-height: 1.5;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: "Playpen Sans", cursive;
		}

		p {
			margin-bottom: 30px;
		}

		body {
			background: #fff;
		}

		ol {
			list-style: decimal;
		}

		ul {
			list-style: none;
			display: flex;
			gap: 30px;
		}

		img {
			height: auto;
			max-width: 100%;
		}

		figure {
			margin: 1em 0;
		}

		table {
			margin: 0 0 1.5em;
			width: 100%;
		}

		a {
			color: #fff;
		}

		a:visited {
			color: #800080;
		}

		a:hover,
		a:focus,
		a:active {
			color: #191970;
		}

		a:focus {
			outline: thin dotted;
		}

		a:hover,
		a:active {
			outline: 0;
		}

		.site {
			max-width: 1280px;
			margin: 0 auto;
			padding: 0 30px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
			background: rgba(0, 0, 0, 0.4);
			backdrop-filter: blur(10px);
			color: #fff;
			border-radius: 0 0 20px 20px;
		}

		.site a {
			color: #ffce0c;
		}

		.main-navigation .menu-toggle {
			display: none;
		}

		.site-header {
			display: flex;
			gap: 30px;
			align-items: center;
			margin-bottom: 20px;
		}

		.site-branding {
			flex: none;
		}

		.custom-logo {
			width: 50px;
			height: auto;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
			border-radius: 100%;
			display: block;
			border: 1px solid #fff;
		}

		.site-title a {
			font-family: "Playpen Sans", cursive;
			font-size: 50px;
			line-height: 1.2;
			color: #fff;
			text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.4);
			font-weight: 700;
			text-decoration: none;
		}

		.site-row {
			display: flex;
			gap: 60px;
			align-items: center;
			padding-top: 40px;
		}

		.nav-menu {
			display: flex;
			gap: 30px;
			align-items: center;
			list-style-type: none;
			margin: 0;
			padding: 0;
		}

		.nav-menu a {
			font-size: 18px;
			line-height: 1.2;
			color: #fff;
			text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4);
			font-weight: 700;
			text-decoration: none;
		}

		.entry-header {
			display: flex;
			align-items: center;
			gap: 20px;
		}

		.site-description {
			font-size: 18px;
			line-height: 1.2;
		}

		.search-section {
			flex: 1;
			justify-content: flex-end;
			display: flex;
		}

		.search-field {
			border-radius: 8px;
			outline: none;
			border: 1px solid #fff;
			background: rgba(0, 0, 0, .7);
			padding: 0 20px 0 10px;
			color: #fff;
			height: 40px;
		}

		.search-submit {
			cursor: pointer;
			background: linear-gradient(to bottom, #FFA500, #FF8C00);
			color: #fff;
			font-size: 16px;
			margin-left: -14px;
			font-weight: bold;
			padding: 10px 38px;
			border: none;
			border-radius: 12px;
			letter-spacing: .8px;
			height: auto;
			position: relative;
			text-decoration: none;
			transition: all 0.2s ease-in-out;
		}
	</style>
	<?php
}
add_action('wp_head', 'add_critical_css', 1);


function jvtravel_styles()
{
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'jvtravel_styles');

function preload_first_screen_css()
{
	echo '<link rel="preload" href="' . get_template_directory_uri() . '/css/first-screen-css.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
	// Резервный вариант для браузеров без JS
	echo '<noscript><link rel="stylesheet" href="' . get_template_directory_uri() . '/css/first-screen-css.css"></noscript>' . "\n";
}
add_action('wp_head', 'preload_first_screen_css', 1);


function jvtravel_scripts()
{
	wp_enqueue_style('jvtravel-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_script('jquery');
	wp_enqueue_script('theme-custom-js', get_template_directory_uri() . '/js/script.js', ['jquery'], false, true);
	wp_style_add_data('jvtravel-style', 'rtl', 'replace');

	wp_enqueue_script('jvtravel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'jvtravel_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


function jvtravel_customizer($wp_customize)
{
	// Добавляем секцию для настроек
	$wp_customize->add_section('homepage_section', [
		'title' => 'Настройки заголовков на главной',
		'priority' => 30,
	]);



	// Добавляем настройку для приветственного заголовка
	$wp_customize->add_setting('hi_title', [
		'default' => 'Привет!',
		'sanitize_callback' => 'sanitize_text_field',
	]);

	// Добавляем элемент управления для приветственного заголовка
	$wp_customize->add_control('hi_title', [
		'label' => 'Заголовок для приветственного заголовка на главной',
		'section' => 'homepage_section',
		'type' => 'text',
	]);



	// Добавляем настройку для заголовка табов на главной
	$wp_customize->add_setting('my_notes_title', [
		'default' => 'Мои заметки',
		'sanitize_callback' => 'sanitize_text_field',
	]);

	// Добавляем элемент управления для заголовка табов на главной
	$wp_customize->add_control('my_notes_title', [
		'label' => 'Заголовок для заметок на главной',
		'section' => 'homepage_section',
		'type' => 'text',
	]);



	// Добавляем настройку для кнопки табов на главной "Смотреть всё"
	$wp_customize->add_setting('my_notes_view_all', [
		'default' => 'Смотреть всё',
		'sanitize_callback' => 'sanitize_text_field',
	]);

	// Добавляем элемент управления для кнопки табов на главной "Смотреть всё"
	$wp_customize->add_control('my_notes_view_all', [
		'label' => 'Заголовок для кнопки табов на главной "Смотреть всё"',
		'section' => 'homepage_section',
		'type' => 'text',
	]);



	// Добавляем настройку для заголовка галереи на главной
	$wp_customize->add_setting('main_gallery_title', [
		'default' => 'Мои замечательные фотографии',
		'sanitize_callback' => 'sanitize_text_field',
	]);

	// Добавляем элемент управления для заголовка галереи
	$wp_customize->add_control('main_gallery_title', [
		'label' => 'Заголовок для галереи на главной',
		'section' => 'homepage_section',
		'type' => 'text',
	]);



	// Добавляем настройку для кнопки галереи на главной "Смотреть всё"
	$wp_customize->add_setting('main_gallery_view_all', [
		'default' => 'Смотреть все фотографии',
		'sanitize_callback' => 'sanitize_text_field',
	]);

	// Добавляем элемент управления для кнопки галереи на главной "Смотреть всё"
	$wp_customize->add_control('main_gallery_view_all', [
		'label' => 'Заголовок для кнопки галереи на главной "Смотреть всё"',
		'section' => 'homepage_section',
		'type' => 'text',
	]);
}

add_action('customize_register', 'jvtravel_customizer');

function jvtravel_fonts()
{
	wp_enqueue_style(
		'google-fonts',
		'https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@100..800&family=Roboto:wght@400;500&display=swap&subset=cyrillic',
		[],
		null
	);
}
add_action('wp_enqueue_scripts', 'jvtravel_fonts');

function jvtravel_search_customizer($wp_customize) {
    $wp_customize->add_section('search_options', [
        'title' => 'Оформление результатов поиска',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('no_results_image', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'no_results_image',
        [
            'label' => 'Картинка при отсутствии результатов поиска',
            'section' => 'search_options',
        ]
    ));
}
add_action('customize_register', 'jvtravel_search_customizer');


function register_book_post_type() {
    register_post_type('book', [
        'labels' => [
            'name'          => 'Книги',
            'singular_name' => 'Книга',
        ],
        'public'          => true,
        'has_archive'     => true,
        'show_in_rest'    => true,
        'supports'        => ['title', 'editor', 'thumbnail'],
        'menu_icon'       => 'dashicons-book-alt',
    ]);
}
add_action('init', 'register_book_post_type');


function register_chapter_post_type() {
    register_post_type('chapter', [
        'labels' => [
            'name'          => 'Главы',
            'singular_name' => 'Глава',
        ],
        'public'          => true,
        'has_archive'     => false,
        'show_in_rest'    => true,
        'supports'        => ['title', 'editor', 'author'],
        'menu_icon'       => 'dashicons-media-document',
    ]);
}
add_action('init', 'register_chapter_post_type');
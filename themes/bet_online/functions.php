<?php
/**
 * Bet_Online functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bet_Online
 */

 function load_posts_by_ajax_callback() {
	check_ajax_referer('load_more_posts', 'security');
	$paged = $_POST['page'];
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => '2',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		?>
		<?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
			<h2><?php the_title() ?></h2>
			<?php the_excerpt() ?>
		<?php endwhile ?>
		<?php
	endif;

	wp_die();
}
	add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
	add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

if ( ! function_exists( 'bet_online_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bet_online_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bet_Online, use a find and replace
		 * to change 'bet_online' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bet_online', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bet_online' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bet_online_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bet_online_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bet_online_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bet_online_content_width', 640 );
}
add_action( 'after_setup_theme', 'bet_online_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bet_online_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bet_online' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bet_online' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bet_online_widgets_init' );

function list_hierarchical_terms($atts) {
	global $post;
	$taxonomy = $atts['taxonomy']; // change this to your taxonomy
	$separator = '';
	$out = '';
	$terms = wp_get_object_terms( $post->ID, $taxonomy, array( "fields" => "names" ) );
	foreach($terms as $term ) {
		$out .= $separator . $term;
		$separator = $atts['separator'];
	}
	return $out;
}

function my_theme_archive_title( $title ) {
	if ( is_category() ) {
			$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
	}

	return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

/**
 * Enqueue scripts and styles.
 */
function bet_online_scripts() {

	wp_enqueue_style( 'bs_css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );

	wp_enqueue_style( 'slickcss', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css' );
	// array( 'jquery' ), '1.7.0' true );

	wp_enqueue_style( 'slick_theme_css', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css' );
	//, array( 'jquery' ), '1.7.0' true );

	wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Open+Sans', false );

	wp_enqueue_style( 'bet_online-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js');

	wp_enqueue_script('slickjs',  '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js', array( 'jquery' ), '1.7.0', true );

	wp_enqueue_script('cf_tether_js', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js');

	wp_enqueue_script('cf_popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');

	wp_enqueue_script('bs_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');

	wp_enqueue_script( 'bet_online-navigation', get_template_directory_uri() . '/build/js/navigation.min.js', array(), '20151215', true );

	wp_enqueue_script( 'load-more', get_template_directory_uri() . '/build/js/load-more.min.js', array(), '20151215', true );

	wp_enqueue_script( 'bet_online-layout', get_template_directory_uri() . '/build/js/layout.min.js', array(), '20151215', true );

	wp_enqueue_script( 'bet_online-slick-init', get_template_directory_uri() . '/build/js/slick-init.min.js', array(), '20151215', true );

	wp_enqueue_script( 'bet_online-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bet_online_scripts' );

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
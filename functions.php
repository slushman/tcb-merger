<?php
/**
 * Edge Merger functions and definitions
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Edge_Merger
 */

if ( ! function_exists( 'edge_merger_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function edge_merger_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

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

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		/*add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );*/

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'edge_merger_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/**
		 * Enable Yoast Breadcrumb support
		 */
		add_theme_support( 'yoast-seo-breadcrumbs' );

		/**
		 * Register Menus
		 */
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'edge-merger' ),
			'social' => esc_html__( 'Social Links', 'edge-merger' )
		) );

	} // edge_merger_setup()

endif; // edge_merger_setup

add_action( 'after_setup_theme', 'edge_merger_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global 		int 		$content_width
 */
function edge_merger_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'edge_merger_content_width', 640 );

} // edge_merger_content_width()

add_action( 'after_setup_theme', 'edge_merger_content_width', 0 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Actions and Filters
 */
require get_template_directory() . '/inc/actions-and-filters.php';

/**
 * Load Themehooks
 */
require get_template_directory() . '/inc/themehooks.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';



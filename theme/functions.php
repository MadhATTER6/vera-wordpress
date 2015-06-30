<?php
/**
 * The Vera Project functions and definitions
 *
 * @package The Vera Project
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
  $content_width = 640; /* pixels */
}

if ( ! function_exists( 'the_vera_project_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function the_vera_project_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on The Vera Project, use a find and replace
   * to change 'the-vera-project' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'the-vera-project', get_template_directory() . '/languages' );

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
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  //add_theme_support( 'post-thumbnails' );

  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'the-vera-project' ),
    'getinvolved' => __( 'Get Involved', 'the-vera-project' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
  ) );

  /*
   * Enable support for Post Formats.
   * See http://codex.wordpress.org/Post_Formats
   */
  // add_theme_support( 'post-formats', array(
  //   'aside', 'image', 'video', 'quote', 'link',
  // ) );

  // Enable Support for post-thumbnails
  add_theme_support( 'post-thumbnails' ); 

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'the_vera_project_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );
}
endif; // the_vera_project_setup
add_action( 'after_setup_theme', 'the_vera_project_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function the_vera_project_widgets_init() {
  // right sidebar
  // register_sidebar( array(
  //   'name'          => __( 'Right Sidebar', 'the-vera-project' ),
  //   'id'            => 'sidebar-1',
  //   'description'   => '',
  //   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  //   'after_widget'  => '</aside>',
  //   'before_title'  => '<h1 class="widget-title">',
  //   'after_title'   => '</h1>',
  // ) );
}
add_action( 'widgets_init', 'the_vera_project_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function the_vera_project_scripts() {
  wp_enqueue_style( 'the-vera-project-style', get_stylesheet_uri() );

  wp_enqueue_script( 'the-vera-project-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

  wp_enqueue_script( 'the-vera-project-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'the_vera_project_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * custom plugin for TinyMCE
 */

function customformatTinyMCE($init) {
  // Add block format elements you want to show in dropdown
  $init['theme_advanced_blockformats'] = 'p,pre,h2,h3';

  //die('customformatTinyMCE'); // this is being run
  // why doesn't it affect the dropdown?

  // Add elements not included in standard tinyMCE dropdown p,pre,h1,h2,h3,h4,h5,h6
  //$init['extended_valid_elements'] = 'code[*]';

  return $init;
}

// Modify Tiny_MCE init
add_filter('tiny_mce_before_init', 'customformatTinyMCE' );
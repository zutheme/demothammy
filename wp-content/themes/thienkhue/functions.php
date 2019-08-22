<?php
/**
 * thienkhue functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package thienkhue
 */
if ( ! function_exists( 'thienkhue_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function thienkhue_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on thienkhue, use a find and replace
		 * to change 'thienkhue' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'thienkhue', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'thienkhue' )
			
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
		add_theme_support( 'custom-background', apply_filters( 'thienkhue_custom_background_args', array(
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
add_action( 'after_setup_theme', 'thienkhue_setup' );
function wpb_custom_new_menu() {
  register_nav_menu('menu-custom',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thienkhue_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'thienkhue_content_width', 640 );
}
add_action( 'after_setup_theme', 'thienkhue_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thienkhue_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'thienkhue' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'thienkhue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar right', 'thienkhue' ),
		'id'            => 'sidebar-right',
		'description'   => esc_html__( 'Add widgets here.', 'thienkhue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'slider home', 'thienkhue' ),
		'id'            => 'slider-main',
		'description'   => esc_html__( 'Add widgets here.', 'thienkhue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar left', 'thienkhue' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Add widgets here.', 'thienkhue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'sidebar page right', 'thienkhue' ),
		'id'            => 'sidebar-page-right',
		'description'   => esc_html__( 'Add widgets here.', 'thienkhue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'banner fix', 'thienkhue' ),
		'id'            => 'sidebar-fix',
		'description'   => esc_html__( 'Add widgets here.', 'thienkhue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'List price', 'thienkhue' ),
		'id'            => 'list-price',
		'description'   => esc_html__( 'Add widgets here.', 'thienkhue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'thienkhue_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
//function thienkhue_scripts() {
	//wp_enqueue_style( 'thienkhue-style', get_stylesheet_uri(),array(), '1.5.4', true);
	//wp_enqueue_script( 'thienkhue-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'thienkhue-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//wp_enqueue_script( 'comment-reply' );
	//}
//}
//add_action( 'wp_enqueue_scripts', 'thienkhue_scripts' );

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
require get_template_directory() . '/inc/doctor-type.php';
require get_template_directory() . '/inc/testimonial-type.php';
require get_template_directory() . '/inc/tech-type.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
require_once ( dirname( __FILE__ ) . '/wp-bootstrap-navwalker.php') ;
require_once ( dirname( __FILE__ ) . '/wp-bootstrap-navwalker-page.php') ;
require_once ( dirname( __FILE__ ) . '/wpdocs_walker_nav_menu.php') ;
require_once ( dirname( __FILE__ ) . '/wpdocs_walker_nav_list.php') ;

//require_once(get_template_directory() . '/inc/' . 'process.php');



require get_template_directory() . '/inc/breadcrumb.php';



require get_template_directory(). '/inc/count-view.php';



require get_template_directory(). '/inc/count_comment.php';

require get_template_directory(). '/inc/popular_post.php';

require get_template_directory(). '/inc/getbanner.php';

require get_template_directory() . '/inc/video-type.php';

require get_template_directory(). '/inc/get_curent_cat.php';

//require get_template_directory(). '/inc/get_curent_cat.php';

//require get_template_directory(). '/inc/custom-box.php';

require get_template_directory(). '/inc/custom_number_page.php';

if(!function_exists('part_content')):
    function part_content($count=100){
    	 $content = get_the_content();
         $cleanText = filter_var($content, FILTER_SANITIZE_STRING);
            $introCleanText = strip_tags($cleanText);
            if (strlen($introCleanText) > $count)
            {
                $introtext = substr($introCleanText,0,strrpos(substr($introCleanText,0,$count)," ")).'...';
            }
            else
            {
                $introtext = $introCleanText;
            }
           return $introtext;        
    }
endif;
function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_content();
	 $cleanText = filter_var($excerpt, FILTER_SANITIZE_STRING);
    $introCleanText = strip_tags($cleanText);
	$charlength++;

	if ( mb_strlen( $introCleanText ) > $charlength ) {
		$subex = mb_substr( $introCleanText, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $introCleanText;
	}
}

function get_the_excerpt_max($charlength) {
	$excerpt = get_the_content();
	 $cleanText = filter_var($excerpt, FILTER_SANITIZE_STRING);
    $introCleanText = strip_tags($cleanText);
	$charlength++;

	if ( mb_strlen( $introCleanText ) > $charlength ) {
		$subex = mb_substr( $introCleanText, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut );
		} else {
			return $subex;
		}
		return '...';
	} else {
		return $introCleanText;
	}
	return $introCleanText;
}

// add_filter( "the_excerpt", "add_class_to_excerpt" );
// function add_class_to_excerpt( $excerpt ) {
//     return str_replace('<p', '', $excerpt);
// }
function wpb_rand_posts() { 
 
$args = array(
    'post_type' => 'post',
    'orderby'   => 'rand',
    'posts_per_page' => 5, 
    );
 
$the_query = new WP_Query( $args );
 
if ( $the_query->have_posts() ) {
 
$string .= '<ul class="orther-news">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $string .= '<li><h3><a class="title-orther-news" href="'. get_permalink() .'">'. get_the_title() .'</a></h3></li>';
    }
    $string .= '</ul>';
    /* Restore original Post Data */
    wp_reset_postdata();
} else {
 
$string .= 'no posts found';
}
 
return $string; 
} 
 
add_shortcode('wpb-random-posts','wpb_rand_posts');
add_filter('widget_text', 'do_shortcode');
 
function load_scripts_custom() {
    global $post;  
	if(is_page_template(array('page-home.php'))) {
        wp_enqueue_script( 'custom-home', get_template_directory_uri() . '/js/custom-carousel.js', array(), '1.6.3', true );
    }else {
        wp_enqueue_script( 'custom-single-page', get_template_directory_uri() . '/js/custom.js', array(), '1.6.1', true );
    } 
    if(is_page_template(array('page-video.php'))){
        wp_enqueue_style( 'blog-video-style', get_template_directory_uri() . '/css/carousel-youtube.css',array(), '0.2.0', false);
		wp_enqueue_script( 'blog-video-js', get_template_directory_uri() . '/js/youtube-carousel.js', array(), '0.0.9', true );
    }  
}
add_action('wp_enqueue_scripts', 'load_scripts_custom');
// https://thammyvienthienkhue.vn/wp-includes/js/wp-emoji-release.min.js?ver=5.2.2
// function post_published_notification( $ID, $post ) {
//     $author = $post->post_author; /* Post author ID. */
//     $name = get_the_author_meta( 'display_name', $author );
//     $email = get_the_author_meta( 'user_email', $author );
//     $title = $post->post_title;
//     $permalink = get_permalink( $ID );
//     $edit = get_edit_post_link( $ID, '' );
//     $to[] = sprintf( '%s <%s>', $name, $email );
//     $subject = sprintf( 'Published: %s', $title );
//     $message = sprintf ('Congratulations, %s! Your article “%s” has been published.' . "\n\n", $name, $title );
//     $message .= sprintf( 'View: %s', $permalink );
//     $headers[] = '';
//     wp_mail( $to, $subject, $message, $headers );
// }
// add_action( 'publish_post', 'post_published_notification', 10, 2 );
/*function defer_parsing_of_js ( $url ) {
	if(!is_admin()){
	 if ( FALSE === strpos( $url, '.js' ) ) return $url;
	 if ( strpos( $url, 'jquery.js' ) ) return $url;
	 return "$url' defer ";
	}
 }
 add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );*/
<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );

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

	//add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	//add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	//wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	/*wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );*/

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		//wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	/*wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );*/

	/*wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );*/

	/*wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );*/

	/*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}*/
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	/*if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}*/

	/*if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}*/

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
// function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
// 	if ( is_archive() || is_search() || is_home() ) {
// 		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
// 	} else {
// 		$attr['sizes'] = '100vw';
// 	}

// 	return $attr;
// }
// add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );



function remove_head_scripts() { 
	if(!is_admin()) {
		remove_action('wp_head', 'wp_print_scripts'); 
		remove_action('wp_head', 'wp_print_head_scripts', 9); 
		remove_action('wp_head', 'wp_enqueue_scripts', 1);

		add_action('wp_footer', 'wp_print_scripts', 5);
		add_action('wp_footer', 'wp_enqueue_scripts', 5);
		add_action('wp_footer', 'wp_print_head_scripts', 5); 
	}
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );
function trim_text_to_words($excerpt, $desired_length = 100){
  $excerpt = wp_strip_all_tags($excerpt);
  $desired_length = $desired_length?:100;
  if (strlen($excerpt) > $desired_length) {
	$excerpt = preg_replace('/\s+?(\S+)?$/', '', substr( $excerpt , 0, $desired_length+1));
  }
  return $excerpt."...";
}

function tp_admin_logo() {
    echo '<br/><img alt="'.get_bloginfo( 'name' ).'" src="'. get_template_directory_uri() .'/assets/images/logo.png"/>';
}
add_action( 'admin_notices', 'tp_admin_logo' );

function tp_admin_footer_credits( $text ) {
  $text='<p>Chào mừng bạn đến với website <a href="'.get_bloginfo( 'url' ).'"  title="'.get_bloginfo( 'name' ).'"><strong>'.get_bloginfo( 'name' ).'</strong></a></p>';
   return $text;
 }
add_filter( 'admin_footer_text', 'tp_admin_footer_credits' );
function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url("'. get_template_directory_uri() .'/assets/images/logo.png") !important; background-size: contain  !important;width: auto !important;}
</style>';
}
add_action('login_head', 'custom_loginlogo');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove WP Version From Styles 
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
 if ( strpos( $src, 'ver=' ) )
  $src = remove_query_arg( 'ver', $src );
 return $src;
}


function show_proj_meta_box() {
	add_meta_box( 'show-proj', 'Lựa chọn hiện thị dự án ra trang chủ', 'show_proj_output', 'post' );
}
add_action( 'add_meta_boxes', 'show_proj_meta_box' );

function show_proj_output($post) {
	$sort_proj = get_post_meta($post->ID,'sort_proj',true);
	$custom = get_post_custom($post->ID);
  	// $check_special = $custom["url"][0];
	$check_proj = isset( $custom['check_proj'] ) ? esc_attr( $custom['check_proj'][0] ) : '';

	wp_nonce_field( 'save_show_proj', 'show_proj_nonce' );?>
	<p>
		<label for="sort_proj" style="color: red">Hiện thị dự án ưu tiên ngoài trang chủ: </label><br>		
		<input type="text" style="height:38px;width: 100%" id="sort_proj" name="sort_proj" placeholder="Nhập số cần sắp xếp ngoài trang chủ" value="<?php echo esc_attr($sort_proj); ?>"/>
 	</p>
 	<p>
		<label for="check_proj" style="color: red">Hiện thị Dự án nội bật ở trang chủ</label>
		<input type="checkbox" name="check_proj"<?php if($check_proj == "on"): echo " checked"; endif ?>>
 	</p>
<?php }
function show_proj_save($post_id) {
	$show_proj_nonce = $_POST['show_proj_nonce'];
	if( !isset($show_proj_nonce ) ) { return; }
	// Kiểm tra nếu giá trị nonce không trùng khớp
	if( !wp_verify_nonce($show_proj_nonce, 'save_show_proj' ) ) { return; }
	$sort_proj = sanitize_text_field($_POST['sort_proj'] );	
	update_post_meta($post_id, 'sort_proj', $sort_proj);
	if($_POST["check_proj"] == "on") {
	    $check_proj_checked = "on";
	  } else {
	    $check_proj_checked = "off";
	  }
	update_post_meta($post_id, "check_proj", $check_proj_checked);
}
add_action( 'save_post', 'show_proj_save' );

add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>
  	.area-config-mymenu{
  		clear:both;
  		padding-left:15px;
  		padding-right:15px;
  		box-sizing: border-box;
  		margin-top:30px
  	}
  	.block-config-mymenu::before,.block-config-mymenu::after {
  		content:"";
  		display:table;
  		width:100%;
  		clear:both;
  	}
    .block-config-mymenu {
        margin: 0 -15px;
    }
    .h-w {
    	width: 50%;
    	float: left;
    	box-sizing: border-box;
    }
    .area-config-mymenu h2 {
    	text-transform: capitalize;
    	font-weight: bold;
    	margin-bottom:0
    }
    .px-15 {padding-left:15px;padding-right:15px;}
    @media(min-width: 1200px) {
    	.h-w{
    		width: 25%;
    	}
    }
    @media(max-width: 1024px) {
    	.h-w{
    		width: 33.33333333%;
    	}
    }
    @media(max-width: 767px) {
    	.block-config-mymenu {
    		width: 100%
    	}
    	.h-w{
    		width: 100%;
    	}
    }
  </style>';
}

add_action( 'admin_init', 'register_settings' );
function register_settings(){
    //đăng ký các fields dữ liệu cần lưu
    //register_setting( string $option_group, string $option_name, array $args = array() ) 
    register_setting( 'my-settings-group', 'address_company' ); // dòng 1 là group name, dòng 2 là option name , dòng 3 là phần mở rộng, mình chưa có nhé.
    register_setting( 'my-settings-group', 'phone_company' );
    register_setting( 'my-settings-group', 'mail_company' );
    register_setting( 'my-settings-group', 'address_company_2' );
    
    register_setting( 'my-settings-group', 'google_map' );
    register_setting( 'my-settings-group', 'hotline' );   
    register_setting( 'my-settings-group', 'fax_company' );  
    register_setting( 'my-settings-group', 'taxcode' );  

    register_setting( 'my-settings-group', 'facebook' );
    register_setting( 'my-settings-group', 'twitter' );
    register_setting( 'my-settings-group', 'youtube' );
    register_setting( 'my-settings-group', 'zalo' );

    
}
function wpdocs_register_my_custom_menu_page(){
	 // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('Config Page Custom Title','Cấu Hình Trang', 'manage_options', 'custompage','my_custom_menu_page','dashicons-admin-generic',90); 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
if(!function_exists('my_custom_menu_page')){
function my_custom_menu_page() { ?>
	<div class="area-config-mymenu">
		<h2>Config Information Main</h2>
		<form id="landingOptions" method="post" action="options.php">
		<?php settings_fields( 'my-settings-group' ); ?>
			<div class="block-config-mymenu">
				<div class="px-15 h-w">
					 <p><label for="address_company">Company Address:</label><br/>
					 <input style="width:100%; height: 38px;" type="text" name="address_company" value="<?php echo get_option('address_company')?>" placeholder="Ví dụ: 51 đường 18 phường Phước Bình quận 9" /></p>			 	
				</div>
				<div class="px-15 h-w">
					 <p><label for="phone_company">Company Phone Number</label><br/>
					 <input style="width:100%; height: 38px;" type="text" name="phone_company" value="<?php echo get_option('phone_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="hotline">Hotline</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="hotline" value="<?php echo get_option('hotline')?>" /></p>
				</div>
				<div class="px-15 h-w">
					 <p><label for="fax_company">Company Fax Number</label><br/>
					 <input style="width:100%; height: 38px;" type="text" name="fax_company" value="<?php echo get_option('fax_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="mail_company">Company Mail</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="mail_company" value="<?php echo get_option('mail_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="taxcode">Mã số thuế:</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="taxcode" value="<?php echo get_option('taxcode')?>" /></p>
				</div>

				<div  style="clear: both;">
				 	<p class="px-15"><label for="social"><strong>Mạng xã hội</strong></label><br/></p>
				 	<div style="float:left;width: 32%; margin-bottom: 10px" class="px-15 h-w">
				 		<label for="social">Facebook link</label><br/>
				 		<input style="width:100%; height: 38px;" type="text" name="facebook" value="<?php echo get_option('facebook')?>" />
				 	</div>
				 	<div style="float:left;width: 32%; margin-bottom: 10px" class="px-15 h-w">
				 		<label for="zalo">Zalo Fanpage</label><br/>
				 		<input style="width:100%; height: 38px;" type="text" name="zalo" value="<?php echo get_option('zalo')?>" />
				 	</div>
				 	<div style="float:left;width: 32%; margin-bottom: 10px" class="px-15 h-w">
				 		<label for="twitter">Twitter link</label><br/>
				 		<input style="width:100%; height: 38px;" type="text" name="twitter" value="<?php echo get_option('twitter')?>" />
				 	</div>
				 	<div style="float:left;width: 32%; margin-bottom: 10px" class="px-15 h-w">
				 		<label for="youtube">Youtube link</label><br/>
				 		<input style="width:100%; height: 38px;" type="text" name="youtube" value="<?php echo get_option('youtube')?>" />
				 	</div>
				 
				</div>
				
				<div class="px-15" style="clear: both;">
					 <p><label for="google_map">Chèn Google Map</label><br/>
					 <textarea name="google_map" cols="40" rows="5" style="width:100%;"><?php echo get_option('google_map')?></textarea>
					</p>
				</div>
				
				<div class="px-15" style="clear: both;">
				 <p class="submit">
				 <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
				 </p>
				</div>			 
			</div>
		</form>
	</div>
<?php } }

function contactForm() {
	 $success = '';  $errcaptacha = ''; 
	if(isset($_POST['btn-send']) ) { 
		$address_company = '767 Lũy Bán Bích, P.Phú Thọ Hòa, Q.Tân Phú, TP.HCM';$phone_company = '0902536163';$mail_company = 'ctyngoinhahanhphuc@gmail.com';
		if(get_option('address_company') !='') {
			$address_company = get_option('address_company');
		}
		if(get_option('phone_company') !='') {
			$phone_company = get_option('phone_company');
		}
		if(get_option('hotline') !='') {
			$hotline = get_option('hotline');
		}
		if(get_option('mail_company') !='') {
			$mail_company = get_option('mail_company');
		}
		if(isset($_POST['g-recaptcha-response'])){  
	      $tut_captcha=$_POST['g-recaptcha-response'];
	    } 
	    if(!$tut_captcha){
	      $errcaptacha = '<div class="text-danger">Bạn chưa xác thực reCAPTCHA!.</div>';
	    }  
	    $kiemtra=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdGXbEaAAAAAIOjkxwQoDBP3jDBakPS_B7dh330&response=".$tut_captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	    
	    $kiemtra = json_decode($kiemtra);
	    
	    if($kiemtra->success == false) {
	      $errcaptacha = 'Bạn đã nhập sai mã Captcha ?';
	      echo '<script> window.alert("Bạn chưa chọn Captcha ?");
						window.location = "'.get_bloginfo( 'url' ).'/lien-he"</script>';	
	      die();
	    } else {
	    	$email = trim($_POST['your-email']);
			$yourName = trim($_POST['your-name']);
			$yourTel = trim($_POST['your-tel']);
			$diachi = trim($_POST['diachi']);
			$yourMessage = trim($_POST['your-message']);
			$result = array('status' => 0);
			require(get_stylesheet_directory().'/PHPMailer-5.2.16/PHPMailerAutoload.php');

			$mail  = new PHPMailer();
			$body = "";		
			$mail->IsSMTP();
			$mail->CharSet = "UTF-8";
			$mail->SMTPDebug  = 2;
			$mail->SMTPAuth   = true;
			$mail->Host       = "smtp.gmail.com";
			$mail->SMTPSecure = 'tls';
			$mail->Port       = 587;
			$mail->Username   = "automails123@gmail.com";
			$mail->Password   = "Khongthequen89";
			$mail->SetFrom('admin@gmail.com');
			$mail->addAddress($mail_company);
			$mail->addCC($email,'automails123@gmail.com');
			// $mail->addBCC('automails123@gmail.com');
			$mail->Subject    = "Nội Dung Liên Hệ Từ - ".get_bloginfo( 'name' )." - ".get_bloginfo('url')."";
			$body.="<div style='background-color:#ffffff;color:#000000;font-family:Arial,Helvetica,sans-serif;font-size:15px;margin:0 auto;padding:0'>
			<table align='center' border='0' cellpadding='0' cellspacing='0' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;background-color:#f5f5f5;'>
			<tbody><tr><td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-left:40px' bgcolor='#e4e6ea'></td></tr><tr>
				<td bgcolor='#f5f5f5' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'>
					<table border='0' cellpadding='0' cellspacing='0' width='688' align='center' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
						<tbody>
						<tr>
							<td width='360' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding:10px 0 10px 10px'>
								<a href='".get_bloginfo( 'url' )."' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif' target='_blank'>
									<img src='".get_template_directory_uri()."/assets/images/logo.png' style='border:0;max-width: 100%;height: auto' alt='".get_bloginfo( 'name' )."'></a>
							</td>
							<td width='30' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'></td>
							<td width='90' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'><a href='".get_bloginfo( 'url' )."/gioi-thieu' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px;display:inline-block' target='_blank'>Về Chúng Tôi</a></td>
							<td width='30' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'></td>
							<td width='90' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'><a href='".get_bloginfo( 'url' )."/lien-he' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px;display:inline-block' target='_blank'>Liên Hệ</a></td>
						</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-bottom: 30px'>
					<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse:collapse' bgcolor='#ffffff'>
						<tbody>
							<tr>
								<td>
									<table border='0' cellpadding='0' cellspacing='0' width='100%' bgcolor='#ffffff'>
										<tbody>
											<tr>
												<td style='padding:0px 0 22px 0'>
													<table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:15px 0 0 0'>
														<tbody>
														<tr>
															<td style='padding:14px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#1a7138'><b>Nội Dung Liên Hệ</b></td>
														</tr>
														<tr>
															<td style='padding:18px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>Cảm ơn quý khách ".$yourName." đã gửi nội dung sau tới ".get_bloginfo( 'name' ).":</td>
														</tr>
														<tr>
															<td style='padding:18px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>
															<div style='background-color: #eee;border:2px solid #f50; padding:20px;margin-bottom:15px'>
																<div style='margin-bottom:10px;'>Tên khách hàng: <b>".$yourName."</b></div>
																<div style='margin-bottom:10px;'>Email khách hàng: <b>".$email."</b></div>
																<div style='margin-bottom:10px;'>Địa chỉ: <b>".$diachi."</b></div>
																<div>Nội dung: <b>".$yourMessage."</b></div>
															</div>
															</td>
														</tr>
																								
														<tr>
															<td style='padding:3px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666;margin-top:30px;'>► Email hỗ trợ: <a href='mailto:".$mail_company."' target='_blank'> <span style='color:#0388cd'>".$mail_company."</span></a> hoặc</td>
														</tr>
														<tr>
															<td style='padding:3px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>► Tổng đài Chăm sóc khách hàng: <span style='font-weight:bold'>".$phone_company." </span></td>
														</tr>
														<tr>
															<td style='padding:16px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'><span style='font-weight:bold'>".get_bloginfo( 'name' )."</span> trân trọng cảm ơn và rất hân hạnh được phục vụ Quý khách.</td>
														</tr>
														<tr>
															<td style='padding:12px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#666666;font-style:italic'>*Quý khách vui lòng không trả lời email này*.</td>
														</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			</tbody>
			</table>
			<table border='0' cellpadding='0' cellspacing='0' width='600' align='center' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;'>
			<tbody>
				<tr>
				<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-bottom:20px'>
					<table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
					<tbody>
						<tr>
						<td style='margin:0;font-family:Arial,Helvetica,sans-serif;padding:20px 0'>
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
							<tbody>
								<tr>
								<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:15px;line-height:20px'><b>".get_bloginfo( 'name' )."</b></td>
								</tr>
								<tr>
								<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px'><b>Địa chỉ giao dịch: </b>".$address_company."</td>
								</tr>
								<tr>
								<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px'><b>Hotline:</b> ".$phone_company." - Email: <b>".$mail_company."</b></td>
								</tr>				                   
							</tbody>
							</table>
						</td>
						</tr>
					</tbody>
					</table>
				</td>
				</tr>
			</tbody>
			</table>
			</div>";
			$mail->MsgHTML($body);	
			// if  update user return true then lets send user an email containing the new password

			if(!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
				$result['msg'] = 'There is an error, please check your input and try again';
				$result['debug'] = $mail->ErrorInfo;
			} else {
				$result['status'] = 1;
				echo '<script> window.alert("Cảm ơn Quý Khách đã gửi nội dung liên hệ tới '.get_bloginfo( 'name' ).'. '.get_bloginfo( 'name' ).' sẽ sớm phản hồi lại Quý khách hàng.");
					window.location = "'.get_bloginfo( 'url' ).'"</script>';	
			}
	    }
		
	} ?>
	    <form action="" method="post" accept-charset="utf-8">                                
	      <div class="row ">
	          <div class="col-sm-6 my-2"><label>Họ và tên *</label><input type="text" name="your-name" class="form-control" required=""></div>
	          <div class="col-sm-6 my-2"><label>Email *</label><input type="email" name="your-email" required="" class="form-control"></div>
	      </div>
	      <div class="row ">
	          <div class="col-sm-6 my-2"><label>Số điện thoại </label><input type="tel" name="your-tel" class="form-control"></div>
	          <div class="col-sm-6 my-2"><label>Địa chỉ </label><input type="text" name="diachi" class="form-control"></div>
	      </div>
	      <div class="row ">
	          <div class="col-sm-12 my-2"><label>Nội dung </label><textarea name="your-message" cols="40" rows="5" class="form-control"></textarea></div>
	          
	      </div>
	      <div class=" g-recaptcha-block row align-items-center">
	      	<div class="col-12 col-sm-8 mb-4 my-2">
            	<div class="g-recaptcha" data-sitekey="6LdGXbEaAAAAAMTyHGflzN0FiWigZY9t5SZr2tnW"></div>
            </div>
            <div class="col-12 col-sm-4 text-center text-sm-right my-2">
            	<input type="submit" value="Gửi yêu cầu" class="btn btn-read-more text-capitalize px-5 px-sm-3 py-2 ml-sm-auto" name="btn-send">
            </div>
          </div>
          <div class="form-group text-danger">
            <?php
              echo $errcaptacha;
            ?>
          </div>

	  	</form>
	<?php 		
}
function ungtuyen() {
	 $success = '';  $errcaptacha = ''; 
	if(isset($_POST['btn-send']) ) { 
		$address_company = '767 Lũy Bán Bích, P.Phú Thọ Hòa, Q.Tân Phú, TP.HCM';$phone_company = '0902536163';$mail_company = 'ctyngoinhahanhphuc@gmail.com';
		if(get_option('address_company') !='') {
			$address_company = get_option('address_company');
		}
		if(get_option('phone_company') !='') {
			$phone_company = get_option('phone_company');
		}
		if(get_option('hotline') !='') {
			$hotline = get_option('hotline');
		}
		if(get_option('mail_company') !='') {
			$mail_company = get_option('mail_company');
		}
		if(isset($_POST['g-recaptcha-response'])){  
	      $tut_captcha=$_POST['g-recaptcha-response'];
	    } 
	    if(!$tut_captcha){
	      $errcaptacha = '<div class="text-danger">Bạn chưa xác thực reCAPTCHA!.</div>';
	    }  
	    $kiemtra=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdGXbEaAAAAAIOjkxwQoDBP3jDBakPS_B7dh330&response=".$tut_captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	    
	    $kiemtra = json_decode($kiemtra);
	    
	    if($kiemtra->success == false) {
	      $errcaptacha = 'Bạn đã nhập sai mã Captcha ?';
	      echo '<script> window.alert("Bạn chưa chọn Captcha ?");
						window.location = "'.get_bloginfo( 'url' ).'/lien-he"</script>';	
	      die();
	    } else {
	    	$email = trim($_POST['your-email']);
			$yourName = trim($_POST['your-name']);
			$yourTel = trim($_POST['your-tel']);
			$diachi = trim($_POST['diachi']);
			$yourMessage = trim($_POST['your-message']);
			$result = array('status' => 0);
			require(get_stylesheet_directory().'/PHPMailer-5.2.16/PHPMailerAutoload.php');

			$mail  = new PHPMailer();
			$body = "";		
			$mail->IsSMTP();
			$mail->CharSet = "UTF-8";
			$mail->SMTPDebug  = 2;
			$mail->SMTPAuth   = true;
			$mail->Host       = "smtp.gmail.com";
			$mail->SMTPSecure = 'tls';
			$mail->Port       = 587;
			$mail->Username   = "automails123@gmail.com";
			$mail->Password   = "Khongthequen89";
			$mail->SetFrom('admin@gmail.com');
			$mail->addAddress($mail_company);
			$mail->addCC($email,'automails123@gmail.com');
			// $mail->addBCC('automails123@gmail.com');
			$mail->Subject    = "Nội dung Ứng Tuyển từ - ".get_bloginfo( 'name' )." - ".get_bloginfo('url')."";
			$body.="<div style='background-color:#ffffff;color:#000000;font-family:Arial,Helvetica,sans-serif;font-size:15px;margin:0 auto;padding:0'>
			<table align='center' border='0' cellpadding='0' cellspacing='0' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;background-color:#f5f5f5;'>
			<tbody><tr><td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-left:40px' bgcolor='#e4e6ea'></td></tr><tr>
				<td bgcolor='#f5f5f5' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'>
					<table border='0' cellpadding='0' cellspacing='0' width='688' align='center' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
						<tbody>
						<tr>
							<td width='360' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding:10px 0 10px 10px'>
								<a href='".get_bloginfo( 'url' )."' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif' target='_blank'>
									<img src='".get_bloginfo( 'url' )."/wp-content/themes/xaydungngoinhahanhphuc/assets/images/logo.png' style='border:0;max-width: 100%;height: auto' alt='".get_bloginfo( 'name' )."'></a>
							</td>
							<td width='30' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'></td>
							<td width='90' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'><a href='".get_bloginfo( 'url' )."/gioi-thieu' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px;display:inline-block' target='_blank'>Về Chúng Tôi</a></td>
							<td width='30' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'></td>
							<td width='90' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'><a href='".get_bloginfo( 'url' )."/lien-he' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px;display:inline-block' target='_blank'>Liên Hệ</a></td>
						</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-bottom: 30px'>
				<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse:collapse' bgcolor='#ffffff'>
					<tbody>
						<tr>
						<td bgcolor='#105aa6' width='100%' height='15px' valign='top'></td>
						</tr>
						<tr>
							<td>
								<table border='0' cellpadding='0' cellspacing='0' width='100%' bgcolor='#ffffff'>
									<tbody>
									<tr>
										<td style='background-color:#105aa6;width:16px;height:100%;padding:0;margin:0;line-height:0;border:none'></td>
										<td style='padding:0px 0 22px 0'>
											<table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:15px 0 0 0'>
												<tbody>
												<tr>
													<td style='padding:14px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#1a7138'><b>THÔNG TIN ỨNG TUYỂN</b></td>
												</tr>
												<tr>
													<td style='padding:18px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'><strong>".$yourName." </strong> đã gửi nội dung ứng tuyển sau tới ".get_bloginfo( 'name' ).":</td>
												</tr>
												<tr>
													<td style='padding:18px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>
													<div style='background-color: #eee;border:2px solid #f50; padding:20px;margin-bottom:15px'>
														<div style='margin-bottom:10px;'>Họ và tên: <b>".$yourName."</b></div>
														<div style='margin-bottom:10px;'>Email: <b>".$email."</b></div>
														<div style='margin-bottom:10px;'>Địa chỉ: <b>".$diachi."</b></div>
														<div>Nội dung ứng tuyển: <b>".$yourMessage."</b></div>
													</div>
													</td>
												</tr>
																						
												<tr>
													<td style='padding:3px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666;margin-top:30px;'>► Email hỗ trợ: <a href='mailto:".$mail_company."' target='_blank'> <span style='color:#0388cd'>".$mail_company."</span></a> hoặc</td>
												</tr>
												<tr>
													<td style='padding:3px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>► Tổng đài Chăm sóc khách hàng: <span style='font-weight:bold'>".$phone_company." </span></td>
												</tr>
												<tr>
													<td style='padding:16px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'><span style='font-weight:bold'>".get_bloginfo( 'name' )."</span> trân trọng cảm ơn và rất hân hạnh được phục vụ Quý khách.</td>
												</tr>
												<tr>
													<td style='padding:12px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#666666;font-style:italic'>*Quý khách vui lòng không trả lời email này*.</td>
												</tr>
												</tbody>
											</table>
										</td>
										<td style='background-color:#105aa6;width:16px;height:100%;padding:0;margin:0;line-height:0;border:none'></td>
									</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style='background-color:#105aa6;width:100%;height:15px'></td>
						</tr>
					</tbody>
				</table>
				</td>
			</tr>
			</tbody>
			</table>
			<table border='0' cellpadding='0' cellspacing='0' width='600' align='center' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;'>
			<tbody>
				<tr>
				<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-bottom:20px'>
					<table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
					<tbody>
						<tr>
						<td style='margin:0;font-family:Arial,Helvetica,sans-serif;padding:20px 0'>
							<table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
							<tbody>
								<tr>
								<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:15px;line-height:20px'><b>".get_bloginfo( 'name' )."</b></td>
								</tr>
								<tr>
								<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px'><b>Địa chỉ giao dịch: </b>".$address_company."</td>
								</tr>
								<tr>
								<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px'><b>Hotline:</b> ".$phone_company." - Email: <b>".$mail_company."</b></td>
								</tr>				                   
							</tbody>
							</table>
						</td>
						</tr>
					</tbody>
					</table>
				</td>
				</tr>
			</tbody>
			</table>
			</div>";
			$mail->MsgHTML($body);	
			// if  update user return true then lets send user an email containing the new password

			if(!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
				$result['msg'] = 'There is an error, please check your input and try again';
				$result['debug'] = $mail->ErrorInfo;
			} else {
				$result['status'] = 1;
				echo '<script> window.alert("Cảm ơn Bạn đã gửi nội dung ứng tuyển tới '.get_bloginfo( 'name' ).'. '.get_bloginfo( 'name' ).' sẽ sớm phản hồi lại thư của bạn.");
					window.location = "'.get_bloginfo( 'url' ).'"</script>';	
			}
	    }
		
	} ?>
	<h5 class="text-uppercase title-h4 mb-4 text-uppercase mt-4">Điền vào thông tin ứng tuyển</h5>
	<div class="ungtuyen rounded px-4 py-3">
	    <form action="" method="post" accept-charset="utf-8">                                
	      <div class="row">
	          <div class="col-sm-6 my-2"><label><strong>Họ và tên *</strong></label><input type="text" name="your-name" class="form-control" required=""></div>
	          <div class="col-sm-6 my-2"><label><strong>Email *</strong></label><input type="email" name="your-email" required="" class="form-control"></div>
	      </div>
	      <div class="row">
	          <div class="col-sm-6 my-2"><label><strong>Số điện thoại</strong></label><input type="tel" name="your-tel" class="form-control"></div>
	          <div class="col-sm-6 my-2"><label><strong>Địa chỉ</strong></label><input type="text" name="diachi" class="form-control"></div>
	      </div>
	      <div class="row">
	          <div class="col-sm-12 my-2"><label><strong>Thông tin ứng tuyển</strong></label><textarea name="your-message" cols="40" rows="5" class="form-control"></textarea></div>
	      </div>
	      <div class="form-group g-recaptcha-block row align-items-center">
	      	<div class="col-12 col-sm-8 mb-4 my-2">
            	<div class="g-recaptcha" data-sitekey="6LdGXbEaAAAAAMTyHGflzN0FiWigZY9t5SZr2tnW"></div>
            </div>
            <div class="col-12 col-sm-4 text-center text-sm-right my-2">
            	<input type="submit" value="Gửi thông tin" class="btn btn-read-more text-capitalize px-5 px-sm-3 py-2 ml-sm-auto" name="btn-send">
            </div>
          </div>
          <div class="form-group text-danger">
            <?php
              echo $errcaptacha;
            ?>
          </div>
	  	</form>		
	</div>
	<?php 		
}
function newsLetter() {	
	?>
	<div class="new-letter">
	    <form method="post" accept-charset="utf-8" enctype="multipart/form-data" id="subscribe-form"> 
	       
	       <div class="input-group">
	         <input type="email" required="" name="mail_subscribe" class="form-control mail_subscribe px-3 px-md-2" placeholder="Nhập Email của bạn">
	         <span class="input-group-btn">
	           <button class="btn btn-primary" type="submit" name="btn-subscribe" id="btn-subscribe">Đăng Ký</button>
	         </span>
	       </div>
	    </form>
	    <div class="error-sub-mail mt-3"></div>
	</div>	
<?php }

function cptui_register_my_cpts() {
	/**
	 * Post type: News Letter.
	 */
	$labels = array(
		"name" => __( "News Letter", "xaydungngoinhahanhphuc" ),
		"singular_name" => __( "Sub Email", "xaydungngoinhahanhphuc" ),
	);

	$args = array(
		"label" => __( "News Letter", "xaydungngoinhahanhphuc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		'menu_icon' => 'dashicons-email-alt', 
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "sub_email", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail" ),
	);
	register_post_type( "sub_email", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );
function submail_meta_box() {
	add_meta_box( 'sub-mail', 'Submail Infor', 'submail_output', 'sub_email' );
}
add_action( 'add_meta_boxes', 'submail_meta_box' );
function submail_output($post) {
	$email_sub = get_post_meta($post->ID,'email_sub',true);
	$status_sub = get_post_meta($post->ID,'status_sub',true);
	wp_nonce_field( 'save_submail', 'submail_nonce' );
?>	
	<table style="width: 100%">
		<tbody>
			<tr>
				<td>Email:</td>
				<td><input type="email" style="width: 100%" name="email_sub" value="<?php echo esc_attr($email_sub); ?>" /></td>
			</tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr>
				<td>Status:</td>
				<td>
					<select style="width: 100%" name="status_sub">
			 			<option value="Active" <?php selected($status_sub, 'Active' ); ?>>Active</option>
			 			<option value="InActive" <?php selected($status_sub, 'InActive' ); ?>>InActive</option>
			 		</select>
			 	</td>
			</tr>
		</tbody>
	</table> 	
<?php }
function submail_save($post_id) {
	$submail_nonce = $_POST['submail_nonce'];
	// Kiểm tra nếu nonce chưa được gán giá trị
	if( !isset($submail_nonce ) ) {
	return;
	}
	// Kiểm tra nếu giá trị nonce không trùng khớp
	if( !wp_verify_nonce($submail_nonce, 'save_submail' ) ) {
		return;
	}
	$email_sub = sanitize_text_field($_POST['email_sub'] );	
	$status_sub = sanitize_text_field($_POST['status_sub'] );	
	update_post_meta($post_id, 'email_sub', $email_sub);
	update_post_meta($post_id, 'status_sub', $status_sub);
}
add_action( 'save_post', 'submail_save' );


add_action( 'restrict_manage_posts', 'add_export_button' );
function add_export_button() {
    $screen = get_current_screen();

    //if (isset($screen->parent_file) && ('edit.php' == $screen->parent_file)) { add for post
    if($screen->post_type != 'sub_email' ) {
    	return;
    }
        ?>
        <input type="submit" name="export_all_email" id="export_all_email" class="button button-primary" value="Export All Emails">
        <script type="text/javascript">
            jQuery(function($) {
                $('#export_all_email').insertAfter('#post-query-submit');
            });
        </script>
        <?php
}

//Export post type to excel file
add_action( 'init', 'func_export_all_email' );
function func_export_all_email() {
    if(isset($_GET['export_all_email'])) {
        $arg = array(
            'post_type' => 'sub_email',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_input' => array(
			    'status_sub' => 'active'
			)
        );
        global $post;
				$arr_post = get_posts($arg);
        if ($arr_post) {
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="list-email.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');
            $file = fopen('php://output', 'w');
            fputcsv($file, array('List Emails Newsletter'));
            foreach ($arr_post as $post) {
            	$email_text = get_post_meta($post->ID, 'email_sub', TRUE );
                setup_postdata($post);
                //fputcsv($file, array(get_the_title(), get_the_permalink()));
                fputcsv($file, array($email_text));
            }
            exit();
        }
    }
}

//if(!check_ajax_referer('thongbao', 'mail_subscribe-form')) wp_die();
add_action( 'wp_ajax_thongbao', 'thongbao_init' );
add_action( 'wp_ajax_nopriv_thongbao', 'thongbao_init' );
function thongbao_init() {
    //do bên js để dạng json nên giá trị trả về dùng phải encode
    $mail_subscribe= (isset($_POST['email_sub']))?esc_attr($_POST['email_sub']) : '';
     //wp_send_json_success($mail_subscribe);
    global $wpdb;

	$get_emial_loop = new WP_Query(
	  	array(
		    'post_type' => 'sub_email',
		    'meta_query' => array(
		        array(
		            'key' => 'email_sub',
		            'value' => $mail_subscribe,
		            'compare' => 'LIKE'
		        )
		    )
		)
	);

	if( $get_emial_loop->have_posts() ) {
		//echo "Email đã có trong hệ thống";
		// $response = 1;
		echo json_encode( array('success' => false) );
		die;
	} else {
	  	wp_insert_post(
	      	array(
		        'post_author' => $mail_subscribe,
		        'post_content' => $mail_subscribe,
		        'post_content_filtered' => '',
		        'post_title' => $mail_subscribe,
		        'post_excerpt' => '',
		        'post_status' => 'Publish',
		        'post_type' => 'sub_email',
		        'comment_status' => '',
		        'ping_status' => '',
		        'post_password' => '',
		        'to_ping' =>  '',
		        'pinged' => '',
		        'post_parent' => 0,
		        'menu_order' => 0,
		        'guid' => '',
		        'import_id' => 0,
		        'context' => '',
		        'meta_input' => array(
				    'email_sub' => $mail_subscribe,
				    'status_sub' => 'active'
				)
		    )
			);
		echo json_encode( array('success' => true) );
		die;
	}
//    die();//bắt buộc phải có khi kết thúc
}

function catalog_grid($name_category = '') {
	$the_query = new WP_Query( array( 'category_name' => $name_category,'paged' => get_query_var('paged')) );
	if ( $the_query->have_posts() ) {	
		$string .='<div class="row grid-item ">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();			
			if ( has_post_thumbnail() ) {
				$string .= '<div class="col-12 col-sm-6 col-md-4 my-3">
		          	<a class="post-media p-2 mb-3 d-block" href="' . get_the_permalink() .'" title="' . get_the_title() .'" ><div class="vertical-img">' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block','alt' => get_the_title(), 'loading'=> 'lazy') ).'</div></a>
			        <div class="post-content">
			          <h3 class="text-capitalize title-item-post"><a href="' . get_the_permalink() .'" title="' . get_the_title() .'" >' .get_the_title() .'</a></h3>
			          <div>'. trim_text_to_words(get_the_content(), 150) . '</div>
			        </div>
			    </div>';
			} 
		}
	$string .= '</div>';
	}else{/*no posts found*/}
	return $string;
	/* Restore original Post Data */
	wp_reset_postdata();
}
function catalog_grid_2($name_category = '') {
	$the_query = new WP_Query( array( 'category_name' => $name_category,'paged' => get_query_var('paged')) );
	if ( $the_query->have_posts() ) {		
		$string .='<div class="row">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();			
			if ( has_post_thumbnail() ) {		
				$string .= '<div class="col-sm-6 col-md-4 my-3">
			      <div class="item-block item-p">
			        <div class="post-media fit-img-1 fit-img-cat mb-4">
			          <a class="inner-fit-img position-relative d-block" href="' . get_the_permalink() .'" title="' . get_the_title() .'" >' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'mx-auto d-block img-fluid w-100 h-100','alt' => get_the_title(), 'loading'=> 'lazy') ).'</a>
			        </div>
			        <div class="post-content">
			          <h3 class="text-uppercase text-center"><a href="' . get_the_permalink() .'" title="' . get_the_title() .'" >' .get_the_title() .'</a></h3>
			        </div>
			      </div>
			    </div>';
			} 
		}
	$string .= '</div>';
	}else{/*no posts found*/}
	return $string;
	/* Restore original Post Data */
	wp_reset_postdata();
}

function panigation() {
	if(paginate_links()!='') {
		echo "<div class='col-xs-12'><div class='paginations text-center d-flex flex-wrap align-items-center justify-content-center'>";		
			global $wp_query;
			$big = 999999999;
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'prev_text'    => __('<i class="fa fa-angle-left"></i>'),
				'next_text'    => __('<i class="fa fa-angle-right"></i>'),
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
		    
		echo "</div></div>";
	}
}

function list_case($name_category = '',$postPage = 5) {
	$the_query = new WP_Query( array( 'category_name' => $name_category, 'posts_per_page' => $postPage) );
	$getnamecategory = get_category_by_slug($name_category)->name;
	if ( $the_query->have_posts() ) {		
		$string .='<div class="list-case news-slidebar"><h3 class="text-capitalize px-2 py-3 text-center">'.$getnamecategory.'</h3><ul class="list-unstyled"> ';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();		
			$content = get_the_content();	
	        $string .= '<li><div class="img"><a class="wrap-fit-img d-block" href="' . get_the_permalink() .'" title="' . get_the_title() .'" >' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block','alt' => get_the_title(), 'loading'=> 'lazy' ) ).'</a>
		          </div><div class="details-item"><div class="name-item"><a href="' . get_the_permalink() .'" title="' . get_the_title() .'" >' . get_the_title() .'</a></div></div></li>';
		}
	$string .= '</div></ul>';
	}else{/*no posts found*/}
	return $string;
	/* Restore original Post Data */
	wp_reset_postdata();
}

function list_case_cat($name_category = '') {	
	$catObj = get_category_by_slug($name_category); 
	$cat_ID = $catObj->cat_ID;	
	$child_categories = get_categories(array( 'parent' => $cat_ID ));    
	if ( $child_categories && !is_wp_error( $child_categories ) ) {
		echo '<div class="row">';
        	$the_query = new WP_Query( array( 'cat' => $cat_ID,'paged' => get_query_var('paged'),'posts_per_page' => '9','meta_key' => 'sort_proj',
                            'orderby'=>'meta_value', 
                            'order'     => 'ASC',) );
        	$total_post = $the_query->post_count;
        	if ( $the_query->have_posts() ) {		
				while ( $the_query->have_posts() ) {
					$the_query->the_post();		
					$datePost= get_the_date();	
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
					if ( has_post_thumbnail() ) {	
						echo '<div class="col-6 col-md-4 my-3">
		              			<a href="'.get_the_permalink().'" title="'.get_the_title().'" class="d-block item-proj w-100 position-relative overflow-hidden">
		              				<div class="fit-img-1 ">
		              					<div class="inner-fit-img position-relative d-block">' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block h-100 w-100','alt' => get_the_title(),'loading' => 'lazy' )).'
		              						
		              						<div class="des px-3 py-4">
		              							<div class="date pb-3 mb-4">'.get_the_date( 'l, ' ).''.get_the_date('d/m/Y').'</div>
		              							<h4 class="mb-4 text-uppercase">' . get_the_title() .'</h4>
		              							<div class="btn-detail text-capitalize d-inline-block" href="' . get_the_permalink() .'" title="Xem chi tiết">Xem chi tiết<span class="ml-2 d-inline-block align-middle">+</span></div>
		              						</div>
		              					</div>
		              				</div>
		              			</a>
		                  	</div>';
					} 
				}	
							
			}		
       	echo '</div>';
	}	
	/* Restore original Post Data */
	wp_reset_postdata();
}
function list_case_cat_img($name_category = '') {
	$catObj = get_category_by_slug($name_category); 
	$catName = $catObj->name;	
	$the_query = new WP_Query( array( 'category_name' => $name_category,'posts_per_page' => 8,'meta_key' => 'check_proj',
        'orderby'=>'date', 
        'order'     => 'DESC', ) );
	if ( $the_query->have_posts() ) {		
		$string .='<div cat-all>';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();			
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
			if ( has_post_thumbnail() ) {		
				$string .= '<div class="item-list"><a href="' . get_the_permalink() .'" title="' . get_the_title() .'"><div class="fix-img-fit mb-4">' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block w-100','alt' => get_the_title(), 'loading'=> 'lazy') ).'</div>
          		<div class="description"><h3 class="pb-3 mb-3">'.$catName.'</h3><div class="text">' .get_the_title() .'</div></div></a></div>';
			} 
		}
	$string .= '</div>';
	}else{/*no posts found*/}
	return $string;
	/* Restore original Post Data */
	wp_reset_postdata();
}

function breadcrumb() {
	echo '<div id="crumbs" class="list-crumb">';
    $delimiter = '<i class="fa fa-angle-double-right mx-1"></i>';
    
    $name = 'Trang chủ'; 
	
    $currentBefore = '<span class="current">';
    $currentAfter = '</span>';
    echo '<i class="fa fa-home mr-1" aria-hidden="true"></i>';
  
    global $post;
    $home = get_bloginfo('url');
    
    if(is_home() && get_query_var('paged') == 0) 
        echo '<span class="home">' . $name . '</span>';
    else
        echo '<a title="Trang chủ" class="home" href="' . $home . '">' . $name . '</a> '. $delimiter . ' ';
    $prod_tax = get_queried_object();
  	$term_tax = get_term_by("slug", get_query_var("term"), get_query_var("taxonomy") );

    if ( is_category() ) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $currentBefore;
        single_cat_title();
        echo $currentAfter;
  
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
  
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
  
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a title='.get_the_title($page->ID).' href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
  
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search for ' . get_search_query() . $currentAfter;
  
    } elseif ( is_tag() ) {
      echo $currentBefore;
      single_tag_title();
      echo $currentAfter;
  
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore. $userdata->display_name . $currentAfter;
  
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
  
    if ( get_query_var('paged') )
      echo $currentBefore . __('Page') . ' ' . get_query_var('paged') . $currentAfter;
  echo '</div>';
}
function mb_login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'mb_login_url' );

// changing the alt text on the logo to show your site name
function mb_login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'mb_login_title' );

function share_social() { ?>
	<div class="action-post d-flex flex-wrap align-items-center justify-content-center my-4">
		<div class="item-g btn-goback mr-1 mr-md-3 mb-3"><a title="Quay lại" rel="nofollow" href="javascript:window.history.back(-1);"><i class="fa fa-reply-all mr-1" aria-hidden="true"></i>Quay lại</a></div>
        <div class="item-g print mr-1 mr-md-3 mb-3"><a title="In bài này" onclick="javascript:window.print();" rel="nofollow" href="javascript:void(0)"><i class="fa fa-print mr-1" aria-hidden="true"></i>In bài này</a></div>
        <div class="item-g mr-1 mr-md-3 mb-3">Chia sẻ trên:</div>
        <div class="share-social d-flex flex-wrap align-items-center justify-content-center">
            <a class="mr-2 fb mb-3" title="Chia sẻ trên Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a class="mr-3 mr-sm-2 gg mb-3 rounded" title="Chia sẻ trên Google plus +" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a>
            <a class="mr-3 mr-sm-2 twinter mb-3 rounded" title="Chia sẻ trên Twinter" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a class="mr-3 mr-sm-2 pinterest mb-3 rounded" title="Chia sẻ trên Pinterest" href="https://www.pinterest.com/pin/create/link/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php echo the_post_thumbnail_url('large'); ?>&description=<?php echo get_the_title(get_the_ID()); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
            <a class="linkedin mb-3 rounded" title="Chia sẻ trên Linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo get_the_title(get_the_ID()); ?>&source=<?php echo site_url();?>" target="_blank"><i class="fa fa-linkedin"></i></a>			    
        </div>
    </div>
<?php }

function get_img_gallery($post_id) {
	// global $post;
	$attachments = get_posts( array(
		'post_parent'    =>  $post_id,
        'post_type'   => 'attachment',
        'posts_per_page' => -1,
        'post_status' => null,
        // 'post_parent' => $post_id
    ) );
 	$result_img = array();
    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
          	array_push($result_img,wp_get_attachment_image( $attachment->ID, 'full' ));
        }
    }	
    // var_dump($result_img);
    return $result_img;
    wp_reset_postdata();
}
function get_first_image( $post_id ) {
    $attach = get_children( array(
        'post_parent'    => $post_id,
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'order'          => 'DESC',
        'numberposts'    => 1
    ) );
    if( is_array( $attach ) && is_object( current( $attach ) ) ) {
        return current( $attach )->guid;
    }
}
add_filter( 'big_image_size_threshold', '__return_false' );


function news_home($name_category = '') {
	$the_query = new WP_Query( array( 'category_name' => $name_category,'posts_per_page' => 5) );
	if ( $the_query->have_posts() ) {	
		$string .='<div class="row my-3 my-lg-4">';
		$stt = 1;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();		
			if($stt == 1) {
				if ( has_post_thumbnail() ) {
					$string .= '<div class="col-12 col-lg-7 my-3 my-lg-2 first-news"><div class="news-home-inner position-relative">
			          	<a class="post-media d-block h-100" href="' . get_the_permalink() .'" title="' . get_the_title() .'" ><div class="vertical-img">' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block','alt' => get_the_title(), 'loading'=> 'lazy') ).'</div></a>
				        <div class="post-content px-lg-2 pt-3 pb-lg-3">
				          <h3 class="text-capitalize title-item-post pb-lg-2"><a href="' . get_the_permalink() .'" title="' . get_the_title() .'" >' .get_the_title() .'</a></h3>
				          <div>'. trim_text_to_words(get_the_content(), 120) . '</div>
				        </div></div>
				    </div><div class="col-12 col-lg-5"><div class="row">';
				} 
			} else {

				if ( has_post_thumbnail() ) {
					$string .= '<div class="col-12 my-2 my-lg-2">
						<div class="row align-items-center">
							<div class="col-4">
								<div class="news-home-inner h-100">
						          	<a class="post-media d-block" href="' . get_the_permalink() .'" title="' . get_the_title() .'" ><div class="vertical-img">' .get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block','alt' => get_the_title(), 'loading'=> 'lazy') ).'</div></a>
						        </div>
						    </div>
						    <div class="col-8 pl-0">
						    	<div class="news-home-inner h-100">
							        <div class="post-content px-2 pb-2">
							          <h3 class="text-capitalize title-item-post"><a href="' . get_the_permalink() .'" title="' . get_the_title() .'" >' .get_the_title() .'</a></h3>
							          <div class="d-none d-sm-block">'. trim_text_to_words(get_the_content(), 120) . '</div>
							        </div>
							    </div>
							</div>
					    </div>
				    </div>';
				} 				
			}

			$stt++;
		}
	$string .= '</div></div></div>';
	}else{/*no posts found*/}
	return $string;
	/* Restore original Post Data */
	wp_reset_postdata();
}

add_action('init', 'my_category_module');
function my_category_module() {
	add_action( 'category_add_form_fields',  'add_category_image' , 10, 2 );
	add_action( 'created_category',  'save_category_image' , 10, 2 );
	add_action( 'category_edit_form_fields',  'update_category_image' , 10, 2 );
	add_action( 'edited_category',  'updated_category_image' , 10, 2 );

	add_action( 'admin_enqueue_scripts', 'load_media' );
	add_action( 'admin_footer',  'add_script' );
}
function load_media() {
 wp_enqueue_media();
}
function add_category_image ( $taxonomy ) { ?>
   <div class="form-field term-group">
     <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
     <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
     <div id="category-image-wrapper"></div>
     <p>
       <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
       <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
    </p>
   </div>
<?php }
function save_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
     $image = $_POST['category-image-id'];
     add_term_meta( $term_id, 'category-image-id', $image, true );
   }
}
function update_category_image ( $term, $taxonomy ) { ?>
   <tr class="form-field term-group-wrap">
     <th scope="row">
       <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
     </th>
     <td>
       <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
       <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
       <div id="category-image-wrapper">
         <?php if ( $image_id ) { ?>
           <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
         <?php } ?>
       </div>
       <p>
         <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
         <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
       </p>
     </td>
   </tr>
<?php }
function updated_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
     $image = $_POST['category-image-id'];
     update_term_meta ( $term_id, 'category-image-id', $image );
   } else {
     update_term_meta ( $term_id, 'category-image-id', '' );
   }
}
function add_script() { ?>
   <script>
     jQuery(document).ready( function($) {
       function ct_media_upload(button_class) {
         var _custom_media = true,
         _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) {
           var button_id = '#'+$(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = $(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if ( _custom_media ) {
               $('#category-image-id').val(attachment.id);
               $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
            }
         wp.media.editor.open(button);
         return false;
       });
     }
     ct_media_upload('.ct_tax_media_button.button'); 
     $('body').on('click','.ct_tax_media_remove',function(){
       $('#category-image-id').val('');
       $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });
     // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
     $(document).ajaxComplete(function(event, xhr, settings) {
       var queryStringArr = settings.data.split('&');
       if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
         var xml = xhr.responseXML;
         $response = $(xml).find('term_id').text();
         if($response!=""){
           // Clear the thumb image
           $('#category-image-wrapper').html('');
         }
       }
     });
   });
 </script>
<?php }


function related_taxomy_posts($post_page='4') {
	global $post;
	$taxonomies_curren_post = get_post_taxonomies($post->ID);
	$get_temr = get_the_terms($post->ID , $taxonomies_curren_post);
	$temr_id = $get_temr[0]->term_id;
	$taxomy_id = $get_temr[0]->taxonomy;
	$custom_taxterms = wp_get_object_terms($post->ID, $taxomy_id, array('fields' => 'ids') );
	$args = array(
	'post_type' => get_post_type($post->ID),
	'post_status' => 'publish',
	'posts_per_page' => $post_page, // you may edit this number
	'orderby' => 'rand',
	'tax_query' => array(
	    array(
	        'taxonomy' => $taxomy_id,
	        'field' => 'id',
	        'terms' => $temr_id,
	        'operator' => 'IN'
	    )
	),
	'post__not_in' => array ($post->ID),
	);
	$related_items = new WP_Query($args );
	// loop over query
	if ($related_items->have_posts()) :
		echo '<div class="related-product"><h2 class="text-capitalize title-item item-line mb-2">'.$get_temr[0]->name.' liên quan</h2><div class="row">';
		while ($related_items->have_posts() ) : $related_items->the_post();
        	echo '<div class="col-6 col-md-3 my-3">';
                echo '<a class="d-block item-prod w-100 p-0 rounded overflow-hidden mb-3" href="' . get_the_permalink() . '" title="' . get_the_title() .'">
                  <div class="post-media fit-img-1">
                    <div class="inner-fit-img">'. get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto d-block', 'alt' => get_the_title(), 'loading'=> 'lazy')) .'</div>
                  </div>
                </a>';
                echo '<h3 class="text-capitalize text-left title-prod"><a href="' . get_the_permalink() . '" title="' . get_the_title() .'">'. get_the_title() .'</a></h3>';
            echo '</div>'; 
            
		endwhile;
		echo '</div></div>';
	endif;
	// Reset Post Data
	wp_reset_postdata();
}

function slideshow_register() {
    register_post_type( 'slideshow',  	
		array(
		  'labels' => array(
		    'name' => __( 'Banner' ),
		    'singular_name' => __( 'Banner' )
		  ),
		  'hierarchical' => true,
		  'show_ui' => true, 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'menu_position' => 4,
		  'can_export' => true,
		  'capability_type' => 'post',
		  'rewrite' => array('slug' => 'slideshow'),
		  'menu_icon' => 'dashicons-camera', 
        'supports' => array('title','thumbnail'),
		)
	);
	register_taxonomy( 'slider-location', array( 'slideshow' ),
		array(
			'labels' => array(
				'name' => 'Banner Location',
				'menu_name' => 'Banner Location',
				'singular_name' => 'Banner Location',
				'all_items' => 'Banner Location'
			),
			'public' => true,
			'hierarchical' => true,
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'slider-location', 'hierarchical' => true, 'with_front' => false ),
		)
	);

}
add_action('init', 'slideshow_register');
add_action("admin_init", "admin_init");
function admin_init(){
  add_meta_box("url-meta", "Banner Options", "url_meta", "slideshow", "side", "low");
}
function url_meta(){
  global $post;
  $custom = get_post_custom($post->ID);
  $url = $custom["url"][0];
  $url_open = $custom["url_open"][0];
  ?>
  <label>URL:</label>
  <input name="url" value="<?php echo $url; ?>" />
  <input type="checkbox" name="url_open"<?php if($url_open == "on"): echo " checked"; endif ?>>URL open in new window?<br />
  <?php
}

add_action('save_post', 'save_details');
function save_details(){
  global $post;

  if( $post->post_type == "slideshow" ) {
      if(!isset($_POST["url"])):
         return $post;
      endif;
      if($_POST["url_open"] == "on") {
        $url_open_checked = "on";
      } else {
        $url_open_checked = "off";
      }
      update_post_meta($post->ID, "url", $_POST["url"]);
      update_post_meta($post->ID, "url_open", $url_open_checked);
  }
}
function banner_meta_box() {
	add_meta_box( 'banner-info', 'Thông tin banner', 'banner_output', 'slideshow' );
}
add_action( 'add_meta_boxes', 'banner_meta_box' );

function banner_output($post) {
	$des_banner = get_post_meta($post->ID,'des_banner',true);
	wp_nonce_field( 'save_banner', 'banner_nonce' );?>
	<p>
		<label for="des_banner">Description: </label><br>
		<input type="text" style="height:38px;width: 100%" id="des_banner" name="des_banner" value="<?php echo esc_attr($des_banner); ?>"/>
 	</p>	
<?php }
function banner_save($post_id) {
	$banner_nonce = $_POST['banner_nonce'];
	if( !isset($banner_nonce ) ) { return; }
	// Kiểm tra nếu giá trị nonce không trùng khớp
	if( !wp_verify_nonce($banner_nonce, 'save_banner' ) ) { return; }
	$des_banner = sanitize_text_field($_POST['des_banner'] );	
	update_post_meta($post_id, 'des_banner', $des_banner);
}
add_action( 'save_post', 'banner_save' );


function getSliderBanner($post_page = '-1') {  
  	$args = array(
    'post_type' => 'slideshow',
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => $post_page,
    );
    $listbanner = new WP_Query($args); 
    if ($listbanner->have_posts()) {
		while ($listbanner->have_posts() ) : $listbanner->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );	
			$post_id = get_the_ID();		
			$des_banner = get_post_meta($post_id, 'des_banner', true );
			$custom = get_post_custom($post->ID);
		    $url = $custom["url"][0]; 
		    $url_open = $custom["url_open"][0];
		    $custom_title = "#".$post->ID; 
		    //if ($url != "") { 
		    ?>
		    <div class="item">		    	
		    	<img loading="lazy" class="img-fluid mx-auto d-block" src="<?php echo $thumb['0']; ?>" alt="<?php echo get_the_title(); ?>"></div>
		    <?php ?>
		<?php endwhile;
	}
	wp_reset_query(); 
}
function gallery_enqueue_hook($hook) { 
    if ( 'post.php' == $hook || 'post-new.php' == $hook ) { 
		wp_enqueue_media();
		wp_enqueue_script('jquery-addmin', get_template_directory_uri() . '/assets/js/jquery-addmin.min.js'); 		
		wp_enqueue_script('gallery-metabox', get_template_directory_uri() . '/assets/js/gallery-metabox.js'); 
		wp_enqueue_script('ajax-upload', get_template_directory_uri() . '/assets/js/ajax-upload.js'); 		
		wp_enqueue_style('gallery-metabox', get_template_directory_uri() . '/assets/css/gallery-metabox.css'); 
    } 
} 
add_action('admin_enqueue_scripts', 'gallery_enqueue_hook');
function add_gallery_metabox($post_type) {
	//$types = array('post','events','khoa_hoc','products');
	$types = array('post','linhvuchoatdong','duan','gallery');
	if (in_array($post_type, $types)) {
  		add_meta_box('gallery-metabox','Slider Hình Ảnh','gallery_meta_callback',$post_type,'normal','high');}  
	}
add_action('add_meta_boxes', 'add_gallery_metabox');

function gallery_meta_callback($post) {
   wp_nonce_field( basename(__FILE__), 'gallery_meta_nonce' );
   $ids = get_post_meta($post->ID, 'tdc_gallery_id', true);
?>
 <table class="form-table" id="gallery-metabox">
   <tr><td>
      <a class="gallery-add button" href="#" data-uploader-title="Thêm hình ảnh" data-uploader-button-text="Thêm nhiều hình ảnh">Thêm nhiều hình ảnh</a>
      <ul id="gallery-metabox-list">
        <?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>
        <li>
           <input type="hidden" name="tdc_gallery_id[<?php echo $key; ?>]" value="<?php echo $value; ?>">
           <img class="image-preview" src="<?php echo $image[0]; ?>">
           <a class="change-image button button-small" href="#" data-uploader-title="Đổi hình khác" data-uploader-button-text="Đổi hình khác">Đổi hình khác</a><br>
           <small><a class="remove-image" href="#">Xóa hình</a></small>
        </li>
        <?php endforeach; endif; ?>
     </ul>
  </td></tr>
 </table>
 <?php }

function gallery_meta_save($post_id) {
  if (!isset($_POST['gallery_meta_nonce']) || !wp_verify_nonce($_POST['gallery_meta_nonce'], basename(__FILE__))) return;
  if (!current_user_can('edit_post', $post_id)) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  if(isset($_POST['tdc_gallery_id'])) {
    update_post_meta($post_id, 'tdc_gallery_id', $_POST['tdc_gallery_id']);
  } else {
    delete_post_meta($post_id, 'tdc_gallery_id');
  }
 }
add_action('save_post', 'gallery_meta_save');


// add_action( 'the_content', 'wpse_260756_the_content', 10, 1 );
// function wpse_260756_the_content( $content ) {
//   $pattern = "/<table(.*?)>(.*?)<\/table>/i";
//   $replacement = '<div class="table-responsive"><table$1>$2</table></div>';

//   return preg_replace( $pattern, $replacement, $content );
// }

add_action( 'wp_footer', 'add_js_to_wp_footer' );
function add_js_to_wp_footer(){ ?>
<script type="text/javascript">
	$(function() {
	    $('table').wrap('<div class="table-responsive"></div>');
	})
	</script>
<?php }


function create_posttype_partners() {
	register_post_type( 'partners',  	
		array(
		  'labels' => array(
		    'name' => __( 'Đối Tác' ),
		    'singular_name' => __( 'Đối Tác' )
		  ),
		  'hierarchical' => true,
		  'show_ui' => true, 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'menu_position' => 9,
		  'can_export' => true,
		  'show_in_nav_menus' => true,
		  'publicly_queryable' => true,
		  'capability_type' => 'post',
		  'rewrite' => array('slug' => 'doi-tac'),
		  'menu_icon' => 'dashicons-image-filter', 
		  'supports' => array('title','editor','thumbnail','comments','excerpt', 'custom-fields','author','trackbacks','post-formats','revisions')
		)
	);
}
add_action( 'init', 'create_posttype_partners' );



function show_partners() {
	$post_partners = new WP_Query(array(
      'post_type' => 'partners',
      'post_status' => 'publish',
      'posts_per_page' => -1,          
    ));
    if($post_partners->have_posts()) {
      	echo '<div data-partner>';
      	while ($post_partners->have_posts()) {
	        $post_partners->the_post(); 
	        $post_id = get_the_ID();
	        echo '<div class="item p-2 p-md-3">
        	<div class="part-img">'. get_the_post_thumbnail( $post_id, 'full', array( 'class' =>'img-fluid mx-auto d-block', 'alt' => get_the_title(), 'loading'=> 'lazy')).'</div></div>';
      	} 
     	echo '</div>';
    }  
    wp_reset_postdata();  
}

function create_posttype_linhvuchoatdong() {
	register_post_type( 'linhvuchoatdong',  	
		array(
		  'labels' => array(
		    'name' => __( 'Lĩnh Vực Hoạt Động' ),
		    'singular_name' => __( 'Lĩnh Vực Hoạt Động' )
		  ),
		  'hierarchical' => true,
		  'show_ui' => true, 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'menu_position' => 7,
		  'can_export' => true,
		  'capability_type' => 'post',
		  'rewrite' => array('slug' => 'linh-vuc-hoat-dong'),
		  'menu_icon' => 'dashicons-open-folder', 
		  'supports' => array('title','editor','thumbnail','comments','excerpt', 'custom-fields','author','trackbacks','post-formats','revisions')
		)
	);
}
add_action( 'init', 'create_posttype_linhvuchoatdong' );

function create_posttype_duan() {
	register_post_type( 'duan',  	
		array(
		  'labels' => array(
		    'name' => __( 'Dự án đã thi công' ),
		    'singular_name' => __( 'Dự án đã thi công' )
		  ),
		  'hierarchical' => true,
		  'show_ui' => true, 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'menu_position' => 8,
		  'can_export' => true,
		  'capability_type' => 'post',
		  'rewrite' => array('slug' => 'du-an'),
		  'menu_icon' => 'dashicons-images-alt', 
		  'supports' => array('title','editor','thumbnail','comments','excerpt', 'custom-fields','author','trackbacks','post-formats','revisions')
		)
	);
}
add_action( 'init', 'create_posttype_duan' );

function create_posttype_tuyendung() {
	register_post_type( 'tuyendung',  	
		array(
		  'labels' => array(
		    'name' => __( 'Tuyển dụng' ),
		    'singular_name' => __( 'Tuyển dụng' )
		  ),
		  'hierarchical' => true,
		  'show_ui' => true, 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'menu_position' => 11,
		  'can_export' => true,
		  'capability_type' => 'post',
		  'rewrite' => array('slug' => 'tuyen-dung'),
		  'menu_icon' => 'dashicons-buddicons-buddypress-logo', 
		  'supports' => array('title','editor','thumbnail','comments','excerpt', 'custom-fields','author','trackbacks','post-formats','revisions')
		)
	);
}
add_action( 'init', 'create_posttype_tuyendung' );

function tuyendung_meta_box() {
	add_meta_box( 'tuyendung-info', 'Thông tin tuyển dụng', 'tuyendung_output', 'tuyendung' );
}
add_action( 'add_meta_boxes', 'tuyendung_meta_box' );

function tuyendung_output($post) {  
	$soluong = get_post_meta($post->ID,'soluong',true);
	$diachi_lamviec = get_post_meta($post->ID,'diachi_lamviec',true);

	wp_nonce_field( 'save_tuyendung', 'tuyendung_nonce' );?>
	<p>
		<label for="soluong" style="color: red">Số lượng nhân viên: </label><br>		
		<input type="text" style="height:38px;width: 100%" id="soluong" name="soluong" placeholder="Nhập vào Số lượng nhân viên cần tuyển" value="<?php echo esc_attr($soluong); ?>"/>
 	</p>
 	<p>
		<label for="diachi_lamviec" style="color: red">Địa chỉ làm việc: </label><br>		
		<input type="text" style="height:38px;width: 100%" id="diachi_lamviec" name="diachi_lamviec" placeholder="Nhập vào Địa chỉ làm việc" value="<?php echo esc_attr($diachi_lamviec); ?>"/>
 	</p>
<?php }
function tuyendung_save($post_id) {
	 
	$tuyendung_nonce = $_POST['tuyendung_nonce'];
	// Kiểm tra nếu nonce chưa được gán giá trị
	if( !isset($tuyendung_nonce ) ) { return; }
	// Kiểm tra nếu giá trị nonce không trùng khớp
	if( !wp_verify_nonce($tuyendung_nonce, 'save_tuyendung' ) ) { return; }
	
	$soluong = (isset($_POST["soluong"])) ? $_POST["soluong"] : '';
	update_post_meta($post_id, 'soluong', $soluong);

	$diachi_lamviec = (isset($_POST["diachi_lamviec"])) ? $_POST["diachi_lamviec"] : '';
	update_post_meta($post_id, 'diachi_lamviec', $diachi_lamviec);
}
add_action( 'save_post', 'tuyendung_save' );
// remove_filter( 'the_content', 'wpautop' );

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Tin Tức';
    $submenu['edit.php'][5][0] = 'Tin Tức';
    $submenu['edit.php'][10][0] = 'Thêm Tin Tức';
    $submenu['edit.php'][16][0] = 'Thẻ Tin Tức';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Tin Tức';
    $labels->singular_name = 'Tin Tức';
    $labels->add_new = 'Thêm Tin Tức';
    $labels->add_new_item = 'Thêm Tin Tức';
    $labels->edit_item = 'Chỉnh Sửa Tin Tức';
    $labels->new_item = 'Tin Tức';
    $labels->view_item = 'Xem Tin Tức';
    $labels->search_items = 'Tìm Kiếm Tin Tức';
    $labels->not_found = 'Tin Tức Không Tìm Thấy';
    $labels->not_found_in_trash = 'Tin Tức Không Tìm Thấy Trong Thùng Rác';
    $labels->all_items = 'Tất Cả Tin Tức';
    $labels->menu_name = 'Tin Tức';
    $labels->name_admin_bar = 'Tin Tức';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

add_post_type_support( 'page', 'excerpt' );
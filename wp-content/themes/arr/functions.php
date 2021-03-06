<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */



function get_home_page_images( $id )
{
	if( is_int( $id ) )
	{
		$images = get_field( 'slider_images', $id );
		// $fallback = get_field('mobile_fallback');

		if( $images != false )
		{
			//$fallback != false ? $html .= '<div class="home-image"><img src="'.$fallback['url'].'" atl="" /></div>': '' ;

			$html .= '<ul id="js-home-slider">';

			foreach( $images as $img )
			{

				$html .= '<li>
										<img src="'.$img['slider_image']['url'].'" />
									</li>';
			}

			$html .= '</ul>';
		}
	}

	return $html;
}




function get_faq_questions( $id )
{
	if( is_int( $id ) )
	{
		$faqs = get_field( 'faqs', $id );

		if( $faqs != false )
		{
			$html = '<ul class="faq-questions" id="faq-top">';

			foreach( $faqs as $faq )
			{
				$html .= '<li><a href="#'.substr( str_replace(' ','',$faq['faq_question']), 0, 20).'" data-scroll-to="true">'.$faq['faq_question'].'</a></li>';
			}

			$html .= '</ul>';
		}
	}

	return $html;
}


function get_faq_answers( $id )
{
	if( is_int( $id ) )
	{
		$faqs = get_field( 'faqs', $id );

		if( $faqs != false )
		{
			$html .= '<ul class="faq-answers">';

			foreach( $faqs as $faq )
			{
				$html .= '<li class="faq-" id="'.substr( str_replace(' ','',$faq['faq_question']), 0, 20).'">
				<div class="faq-question"><h3>'.$faq['faq_question'].'</h3></div>
				<div class="faq-answer">'.$faq['faq_answer'].'</div>
				<div class="back-to-top"><a href="#faq-top" data-scroll-to="true">Back to top</a></div>
				</li>';
			}

			$html .= '</ul>';
		}
	}

	return $html;
}



/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );



	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );


	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );


	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}



/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_scripts() {

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}

	wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20131209', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );



if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;



/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );



// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

function filter_ptags_on_images($content){
   //return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);

}

add_filter('the_content', 'filter_ptags_on_images');

add_filter( 'show_admin_bar', '__return_false' );

add_filter('the_content', 'remove_img_titles');

function remove_img_titles($text) {

    // Get all title="..." tags from the html.
    $result = array();
    preg_match_all('|title="[^"]*"|U', $text, $result);

    // Replace all occurances with an empty string.
    foreach($result[0] as $img_tag) {
        $text = str_replace($img_tag, '', $text);
    }

    return $text;
}

function page_bodyclass() {  // add class to <body> tag
	global $wp_query;
	$page = '';
	if (is_front_page() ) {
    	   $page = 'home';
	} elseif (is_page()) {
   	   $page = $wp_query->query_vars["pagename"];
	}
	if ($page)
		echo 'class= "'. $page. '"';
}

add_filter( 'the_content', 'attachment_image_link_remove_filter' );

function attachment_image_link_remove_filter( $content ) {
    $content =
        preg_replace(
            array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
                '{ wp-image-[0-9]*" /></a>}'),
            array('<img','" />'),
            $content
        );
    return $content;
}

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

// Add Favicon //

function diww_favicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/favicon.ico" />';
}
add_action('wp_head', 'diww_favicon');
add_action('admin_head', 'diww_favicon');

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/logo.png);
            background-size:auto;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

add_action( 'init', 'create_post_type' );
function create_post_type() {

	$args1 = array(
		'labels' => array(
			'name' => __( 'Services' ),
			'singular_name' => __( 'Service' )
		),
		'public' => true,
		//'has_archive' => true,
		'menu_icon' => 'dashicons-plus-alt',
		'rewrite' => array('with_front' => false, 'slug' => 'services'),
		'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	);

  register_post_type( 'Services', $args1);

  	$args2 = array(
		'labels' => array(
			'name' => __( 'Case Files' ),
			'singular_name' => __( 'Case File' )
		),
		'public' => true,
		//'has_archive' => true,
		'menu_icon' => 'dashicons-portfolio',
		'rewrite' => array('with_front' => false, 'slug' => 'case-file'),
		'supports' => array( 'title', 'editor' )
	);

  	register_post_type( 'Case Files', $args2);

  	$args3 = array(
		'labels' => array(
			'name' => __( 'Case Updates' ),
			'singular_name' => __( 'Case Update' )
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-update',
		'rewrite' => array('with_front' => false, 'slug' => 'case-updates'),
		'supports' => array( 'title', 'editor' )
	);

  	register_post_type( 'Case Updates', $args3);

  	$args4 = array(
		'labels' => array(
			'name' => __( 'Stories' ),
			'singular_name' => __( 'Story' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-book',
		'rewrite' => array('with_front' => false, 'slug' => 'stories'),
		'supports' => array( 'title', 'editor' )
	);

  	register_post_type( 'Stories', $args4);

  	$args5 = array(
		'labels' => array(
			'name' => __( 'Adoptions' ),
			'singular_name' => __( 'Adoption' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-smiley',
		'rewrite' => array('with_front' => false, 'slug' => 'adoptions'),
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);

  	register_post_type( 'Adoptions', $args5);

  	$args6 = array(
		'labels' => array(
			'name' => __( 'Testimonials' ),
			'singular_name' => __( 'Testimonial' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-editor-quotes',
		'rewrite' => array('with_front' => false, 'slug' => 'adoptions'),
		'supports' => array( 'title', 'editor' )
	);

  	register_post_type( 'Testimonials', $args6);


  flush_rewrite_rules();
}

//Adds gallery shortcode defaults of size="full" and columns="2"
function amethyst_gallery_atts( $out, $pairs, $atts ) {

    $atts = shortcode_atts( array(
        'columns' => '2',
        'size' => 'full',
         ), $atts );

    $out['columns'] = $atts['columns'];
    $out['size'] = $atts['size'];

    return $out;

}
add_filter( 'shortcode_atts_gallery', 'amethyst_gallery_atts', 10, 3 );



/* Hook meta box to just the 'place' post type. */
add_action( 'add_meta_boxes_caseupdates', 'my_add_meta_boxes' );

/* Creates the meta box. */
function my_add_meta_boxes( $post ) {

    add_meta_box(
        'my-caseupdates-parent',
        __( 'Case File', 'example-textdomain' ),
        'my_caseupdates_parent_meta_box',
        $post->post_type,
        'side',
        'core'
    );
}

/* Displays the meta box. */
function my_caseupdates_parent_meta_box( $post ) {

    $parents = get_posts(
        array(
            'post_type'   => 'casefiles',
            'orderby'     => 'title',
            'order'       => 'ASC',
            'numberposts' => -1
        )
    );

    if ( !empty( $parents ) ) {

        echo '<select name="parent_id" class="widefat">'; // !Important! Don't change the 'parent_id' name attribute.

        foreach ( $parents as $parent ) {
            printf( '<option value="%s"%s>%s</option>', esc_attr( $parent->ID ), selected( $parent->ID, $post->post_parent, false ), esc_html( $parent->post_title ) );
        }

        echo '</select>';
    }
}

//add the case file parent in the column of case update dashboard

// add_action("manage_posts_custom_column",  "caseupdates_custom_columns");
// add_filter("manage_caseupdates_posts_columns", "caseupdates_edit_columns");

// function caseupdates_edit_columns($columns){
//     $columns = array(
//         "cb" => "<input type=\"checkbox\" />",
//         "title" => "Case Update Title",
//         "case_file" => "Case File associated with",
//   );
//   return $columns;
// }

// function caseupdates_custom_columns($column){
//     global $post;

//     $custom = get_post_custom();

//     switch ($column) {

//     case "case_file":
//       $parents = get_posts(
//         array(
//             'post_type'   => 'casefiles',
//             'orderby'     => 'title',
//             'order'       => 'ASC',
//             'numberposts' => -1
//         )
//     );

//     if ( !empty( $parents ) ) {

//         //echo '<select name="parent_id" class="widefat">'; // !Important! Don't change the 'parent_id' name attribute.

//         foreach ( $parents as $parent ) {
//             printf( '<div %s>%s</div>',  selected( $parent->ID, $post->post_parent, false ), esc_html( $parent->post_title ) );
//         }

//         //echo '</select>';
//     }

//             break;

//     }
// }


// add_filter( 'manage_edit-caseupdates_columns', 'my_edit_caseupdates_columns' ) ;

// function my_edit_caseupdates_columns( $columns ) {

// 	$columns = array(
// 		'cb' => '<input type="checkbox" />',
// 		'title' => __( 'Case Update Title' ),
// 		'case_file' => __( 'Case File associated with' )
// 	);

// 	return $columns;
// }

// add_action( 'manage_caseupdates_posts_custom_column', 'my_manage_caseupdates_columns', 10, 2 );

// function my_manage_caseupdates_columns( $column, $post_id ) {
// 	global $post;

// 	switch( $column ) {

// 		/* If displaying the 'genre' column. */
// 		case 'case_file' :

// 			/* Get the genres for the post. */
// 			$terms = get_post($post->post_parent);
// 			$parents = get_posts(
//         array(
//             'post_type'   => 'casefiles',
//             'orderby'     => 'title',
//             'order'       => 'ASC',
//             'numberposts' => -1
//         ));




// 				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
// 				foreach ( $parents as $parent ) {

// 						//esc_url( add_query_arg( array( 'post_type' => 'Case Updates', 'caseupdates' => $parent->slug ), 'edit.php' ) ),
// 						echo $parent->post_title;

// 				}


// 			break;

// 		/* Just break out of the switch statement for everything else. */
// 		default :
// 			break;
// 	}
// }

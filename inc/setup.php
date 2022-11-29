<?php
if ( ! function_exists( 'prakmed_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function prakmed_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on PrakMed, use a find and replace
		* to change 'prakmed' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'prakmed', get_template_directory() . '/languages' );

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

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/custom-logo/
		*/
		add_theme_support( 'custom-logo' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'prakmed' ),
			'header' => esc_html__( 'Header Menu', 'prakmed' ),
			'footer' => esc_html__( 'Footer Menu', 'prakmed' ),
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
			add_theme_support( 'custom-background', apply_filters( 'prakmed_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );
		}
	endif;
	add_action( 'after_setup_theme', 'prakmed_setup' );

	/**
	* Set the content width in pixels, based on the theme's design and stylesheet.
	*
	* Priority 0 to make it available to lower priority callbacks.
	*
	* @global int $content_width
	*/
	function prakmed_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'prakmed_content_width', 960 );
	}
	add_action( 'after_setup_theme', 'prakmed_content_width', 0 );


	/* === ADD USER BUTTON  === */
	function prakmed_add_user_content_navitem($items, $args ) {
		if( $args->theme_location == 'header' ) {
			if ( ! is_user_logged_in() ) {
				$login_item  = '<li class="menu-item login-toggle button featured activate mobile hide">';
				$login_item .= '<a href="javascript: return false;" data-toggled="header-login" class="login" aria-controls="article-menu" aria-expanded="false">';
				$login_item .= __( 'Login', 'prakmed' );
			}
			else { // If logged in:
				$login_item  = '<li class="menu-item user button featured activate mobile hide">';
				$login_item .= '<a href="javascript: return false;" data-toggled="header-login" class="user" aria-controls="article-menu" aria-expanded="false">';
				$login_item .= '' . wp_get_current_user()->display_name . "\n";
			}
			$login_item .= '</a></li>';
		}
		if (isset($login_item)) {
			$items .= $login_item;
		}
		return $items;
	}
	add_filter('wp_nav_menu_items', 'prakmed_add_user_content_navitem', 10, 2);

	function prakmed_add_footer_navitem($items, $args ) {
		if( $args->theme_location == 'footer' ) {
			$login_item  = '<li class="activate share menu-item menu-item-type-post_type menu-item-object-page menu-item-sharepanel menu-item-sharepanel desktop hide">';
			$login_item .= '<a href="javascript: return false;" data-toggled="sharepanel-container" class="" aria-controls="article-menu" aria-expanded="false">';
			$login_item .= '<span class="screen-reader-text">' . __( 'sharepanel', 'prakmed' ) . '</span>';
			$login_item .= '</a></li>';
			$login_item .= '<li class="activate search menu-item menu-item-type-post_type menu-item-object-page menu-item-search menu-item-search desktop hide">';
			$login_item .= '<a href="javascript: return false;" data-toggled="search-container" class="" aria-controls="article-menu" aria-expanded="false">';
			$login_item .= '<span class="screen-reader-text">' . __( 'search', 'prakmed' ) . '</span>';
			$login_item .= '</a></li>';
		}
		if (isset($login_item)) {
			$items .= $login_item;
		}
		return $items;
		}
		add_filter('wp_nav_menu_items', 'prakmed_add_footer_navitem', 10, 2);

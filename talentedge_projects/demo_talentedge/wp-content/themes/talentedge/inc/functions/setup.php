<?php
/**
 * ShopIsle setup functions
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

/**
 * Assign the ShopIsle version to a var
 */
$theme 					= wp_get_theme();
$talentedge_version 	= $theme['Version'];

if ( ! function_exists( 'talentedge_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function talentedge_setup() {

		/*
		 * Load Localisation files.
		 *
		 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
		 */

		// wp-content/languages/themes/talentedge-it_IT.mo
		load_theme_textdomain( 'talentedge', trailingslashit( WP_LANG_DIR ) . 'themes/' );

		// wp-content/themes/child-theme-name/languages/it_IT.mo
		load_theme_textdomain( 'talentedge', get_stylesheet_directory() . '/languages' );

		// wp-content/themes/theme-name/languages/it_IT.mo
		load_theme_textdomain( 'talentedge', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'		=> __( 'Primary Menu', 'talentedge' )
		) );

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
		) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'talentedge_custom_background_args', array(
			'default-color' => apply_filters( 'talentedge_default_background_color', 'fcfcfc' ),
			'default-image' => '',
		) ) );

		// Add support for the Site Logo plugin and the site logo functionality in JetPack
		// https://github.com/automattic/site-logo
		// http://jetpack.me/
		//add_theme_support( 'site-logo', array( 'size' => 'full' ) );

		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );

		// Declare support for title theme feature
		add_theme_support( 'title-tag' );
		
		/* Custom header */
		add_theme_support( 'custom-header', array( 'default-image' => get_template_directory_uri().'/assets/images/header.jpg' ));
		
		register_default_headers( array(
			'header' => array(
				'url'           => get_template_directory_uri().'/assets/images/header.jpg',
				'thumbnail_url' => get_template_directory_uri().'/assets/images/header.jpg'
			)
		));
		
		/* tgm-plugin-activation */
		require_once get_template_directory() . '/class-tgm-plugin-activation.php';
	}
endif; // talentedge_setup

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function talentedge_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'talentedge' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer area 1', 'talentedge' ),
		'id'            => 'sidebar-footer-area-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer area 2', 'talentedge' ),
		'id'            => 'sidebar-footer-area-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer area 3', 'talentedge' ),
		'id'            => 'sidebar-footer-area-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer area 4', 'talentedge' ),
		'id'            => 'sidebar-footer-area-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Shop Page', 'talentedge' ),
		'id'            => 'talentedge-sidebar-shop-archive',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}

/**
 * Enqueue scripts and styles.
 * @since  1.0.0
 */
function talentedge_scripts() {
	global $talentedge_version;

wp_enqueue_style( 'bundle', get_template_directory_uri() . '/css/bundle.css', array(), '1.1' );

wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/theme_custom.css', array(), '1.2' );

wp_enqueue_style( 'global', get_template_directory_uri() . '/css/global.css', array(), '1.8' );

wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/js/theme_scripts.js', array(), '20160412', true );
wp_enqueue_script( 'theme-custom', get_template_directory_uri() . '/js/theme_custom.js', array(), '20160412', true );
wp_enqueue_script( 'theme-global', get_template_directory_uri() . '/js/global.js', array(), '20172202', true );

}

function talentedge_admin_styles() {
	wp_enqueue_media();
    wp_enqueue_style( 'talentedge_admin_stylesheet', get_template_directory_uri() . '/assets/css/admin-style.css' );
}

add_action('tgmpa_register', 'talentedge_register_required_plugins');

function talentedge_register_required_plugins() {	
	
	$plugins = array(
				array(
					'name'      => 'WooCommerce',
					'slug'      => 'woocommerce',
					'required'  => false,
				)
			);
	
    $config = array(
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',
        'strings' => array(
            'page_title' => __('Install Required Plugins', 'talentedge'),
            'menu_title' => __('Install Plugins', 'talentedge'),
            'installing' => __('Installing Plugin: %s', 'talentedge'),
            'oops' => __('Something went wrong with the plugin API.', 'talentedge'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','talentedge'),
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','talentedge'),
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','talentedge'),
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','talentedge'),
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','talentedge'),
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','talentedge'),
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','talentedge'),
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','talentedge'),
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins','talentedge'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins','talentedge'),
            'return' => __('Return to Required Plugins Installer', 'talentedge'),
            'plugin_activated' => __('Plugin activated successfully.', 'talentedge'),
            'complete' => __('All plugins installed and activated successfully. %s', 'talentedge'),
            'nag_type' => 'updated'
        )
    );
    tgmpa($plugins, $config);
}

function talentedge_add_id() {
	
	$migrate = get_option( 'talentedge_migrate_translation' );
	
	if( isset($migrate) && $migrate == false ) {
		
		/* Slider section */
		$talentedge_slider = get_theme_mod('talentedge_slider', json_encode(
							array( array('image_url' => get_template_directory_uri().'/assets/images/slide1.jpg' ,'link' => '#', 'text' => __('ShopIsle','talentedge'), 'subtext' => __('WooCommerce Theme','talentedge'), 'label' => __('FIND OUT MORE','talentedge') ), array('image_url' => get_template_directory_uri().'/assets/images/slide2.jpg' ,'link' => '#', 'text' => __('ShopIsle','talentedge'), 'subtext' => __('Hight quality store','talentedge') , 'label' => __('FIND OUT MORE','talentedge')), array('image_url' => get_template_directory_uri().'/assets/images/slide3.jpg' ,'link' => '#', 'text' => __('ShopIsle','talentedge'), 'subtext' => __('Responsive Theme','talentedge') , 'label' => __('FIND OUT MORE','talentedge') ))
		));
		
		if(!empty($talentedge_slider)){
			
			$talentedge_slider_decoded = json_decode($talentedge_slider);
			foreach($talentedge_slider_decoded as &$it){
				if(!array_key_exists ( "id" , $it ) || !($it->id) ){
					$it = (object) array_merge( (array)$it, array( 'id' => 'talentedge_'.uniqid() ) );
				}
			}
			
			$talentedge_slider = json_encode($talentedge_slider_decoded);
			set_theme_mod( 'talentedge_slider', $talentedge_slider );
		}
		
		/* Banners section */
		$talentedge_banners = get_theme_mod('talentedge_banners', json_encode(
							array( array('image_url' => get_template_directory_uri().'/assets/images/banner1.jpg' ,'link' => '#' ),array('image_url' => get_template_directory_uri().'/assets/images/banner2.jpg' ,'link' => '#'),array('image_url' => get_template_directory_uri().'/assets/images/banner3.jpg' ,'link' => '#') )
		));
		
		if(!empty($talentedge_banners)){
			
			$talentedge_banners_decoded = json_decode($talentedge_banners);
			foreach($talentedge_banners_decoded as &$it){
				if(!array_key_exists ( "id" , $it ) || !($it->id) ){
					$it = (object) array_merge( (array)$it, array( 'id' => 'talentedge_'.uniqid() ) );
				}
			}
			
			$talentedge_banners = json_encode($talentedge_banners_decoded);
			set_theme_mod( 'talentedge_banners', $talentedge_banners );
		}
		
		/* Footer socials */
		$talentedge_socials = get_theme_mod('talentedge_socials', json_encode(
							array( array('icon_value' => 'social_facebook' ,'link' => '#' ),array('icon_value' => 'social_twitter' ,'link' => '#'), array('icon_value' => 'social_dribbble' ,'link' => '#'), array('icon_value' => 'social_skype' ,'link' => '#') )
		));
		
		if(!empty($talentedge_socials)){
			
			$talentedge_socials_decoded = json_decode($talentedge_socials);
			foreach($talentedge_socials_decoded as &$it){
				if(!array_key_exists ( "id" , $it ) || !($it->id) ){
					$it = (object) array_merge( (array)$it, array( 'id' => 'talentedge_'.uniqid() ) );
				}
			}
			
			$talentedge_socials = json_encode($talentedge_socials_decoded);
			set_theme_mod( 'talentedge_socials', $talentedge_socials );
		}
		
		/* Our team */
		$talentedge_team_members = get_theme_mod('talentedge_team_members', json_encode(
							array( array('image_url' => get_template_directory_uri().'/assets/images/team1.jpg' , 'text' => 'Eva Bean', 'subtext' => 'Developer', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.' ),array('image_url' => get_template_directory_uri().'/assets/images/team2.jpg' ,'text' => 'Maria Woods', 'subtext' => 'Designer', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.' ), array('image_url' => get_template_directory_uri().'/assets/images/team3.jpg' , 'text' => 'Booby Stone', 'subtext' => 'Director', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.'), array('image_url' => get_template_directory_uri().'/assets/images/team4.jpg' , 'text' => 'Anna Neaga', 'subtext' => 'Art Director', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.') )
		));
		
		if(!empty($talentedge_team_members)){
			
			$talentedge_team_members_decoded = json_decode($talentedge_team_members);
			foreach($talentedge_team_members_decoded as &$it){
				if(!array_key_exists ( "id" , $it ) || !($it->id) ){
					$it = (object) array_merge( (array)$it, array( 'id' => 'talentedge_'.uniqid() ) );
				}
			}
			
			$talentedge_team_members = json_encode($talentedge_team_members_decoded);
			set_theme_mod( 'talentedge_team_members', $talentedge_team_members );
		}
		
		/* Our advantages */
		$talentedge_advantages = get_theme_mod('talentedge_advantages', json_encode(
							array( array('icon_value' => 'icon_lightbulb' , 'text' => __('Ideas and concepts','talentedge'), 'subtext' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','talentedge')), array('icon_value' => 'icon_tools' , 'text' => __('Designs & interfaces','talentedge'), 'subtext' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','talentedge')), array('icon_value' => 'icon_cogs' , 'text' => __('Highly customizable','talentedge'), 'subtext' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','talentedge')), array('icon_value' => 'icon_like', 'text' => __('Easy to use','talentedge'), 'subtext' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','talentedge')))
		));
		
		if(!empty($talentedge_advantages)){
			
			$talentedge_advantages_decoded = json_decode($talentedge_advantages);
			foreach($talentedge_advantages_decoded as &$it){
				if(!array_key_exists ( "id" , $it ) || !($it->id) ){
					$it = (object) array_merge( (array)$it, array( 'id' => 'talentedge_'.uniqid() ) );
				}
			}
			
			$talentedge_advantages = json_encode($talentedge_advantages_decoded);
			set_theme_mod( 'talentedge_advantages', $talentedge_advantages );
		}
		
		
		update_option( 'talentedge_migrate_translation', true );
	}
}
add_action( 'shutdown', 'talentedge_add_id' );



/* Polylang repeater translate */

if(function_exists('icl_unregister_string') && function_exists('icl_register_string')){
	
	/* Slider section */
	
	$talentedge_slider_pl = get_theme_mod('talentedge_slider');
	
	if( !empty($talentedge_slider_pl) ) {
		
		$talentedge_slider_pl_decoded = json_decode($talentedge_slider_pl);
		
		if ( !empty($talentedge_slider_pl_decoded) ) {
		
			foreach($talentedge_slider_pl_decoded as $talentedge_slider){
				
				if( !empty($talentedge_slider->id) ) {
					$id = $talentedge_slider->id;
				}
				$text = $talentedge_slider->text;
				$subtext = $talentedge_slider->subtext;
				$image_url = $talentedge_slider->image_url;
				$link = $talentedge_slider->link;
				$label = $talentedge_slider->label;
				
				if(!empty($id)) {

					if(!empty($image_url)){
						icl_unregister_string( 'Slide '.$id, 'Slide image' );
						icl_register_string( 'Slide '.$id, 'Slide image', $image_url );
					} else {
						icl_unregister_string( 'Slide '.$id, 'Slide image' );
					}

					if(!empty($text)){
						icl_unregister_string( 'Slide '. $id, 'Slide text' );
						icl_register_string( 'Slide '. $id, 'Slide text', $text );
					} else {
						icl_unregister_string( 'Slide '. $id, 'Slide text' );
					}

					if(!empty($subtext)){
						icl_unregister_string( 'Slide '.$id, 'Slide subtext' );
						icl_register_string( 'Slide '.$id, 'Slide subtext',$subtext );
					} else {
						icl_unregister_string( 'Slide '.$id, 'Slide subtext' );
					}

					if(!empty($link)){
						icl_unregister_string( 'Slide '.$id, 'Slide button link' );
						icl_register_string( 'Slide '.$id, 'Slide button link', $link );
					} else {
						icl_unregister_string( 'Slide '.$id, 'Slide button link' );
					}

					if(!empty($label)){
						icl_unregister_string( 'Slide '.$id, 'Slide button label' );
						icl_register_string( 'Slide '.$id, 'Slide button label', $label );
					} else {
						icl_unregister_string( 'Slide '.$id, 'Slide button label' );
					}
				}
			}
		}	
	}
	
	/* Banners section */
	
	$talentedge_banners_pl = get_theme_mod('talentedge_banners');
	
	if( !empty($talentedge_banners_pl) ) {
		
		$talentedge_banners_pl_decoded = json_decode($talentedge_banners_pl);
		
		if ( !empty($talentedge_banners_pl_decoded) ) {
		
			foreach($talentedge_banners_pl_decoded as $talentedge_banners){
				
				if( !empty($talentedge_banners->id) ) {
					$id = $talentedge_banners->id;
				}

				$image_url = $talentedge_banners->image_url;
				$link = $talentedge_banners->link;

				if(!empty($id)) {

					if(!empty($link)){
						icl_unregister_string( 'Banner '.$id, 'Banner link' );
						icl_register_string( 'Banner '.$id, 'Banner link', $link );
					} else {
						icl_unregister_string( 'Banner '.$id, 'Banner link' );
					}

					if(!empty($image_url)){
						icl_unregister_string( 'Banner '.$id, 'Banner image' );
						icl_register_string( 'Banner '.$id, 'Banner image', $image_url );
					} else {
						icl_unregister_string( 'Banner '.$id, 'Banner image' );
					}
					
				}
			}
		}	
	}
	
	/*Footer socials */
	
	$talentedge_socials_pl = get_theme_mod('talentedge_socials');
	
	if( !empty($talentedge_socials_pl) ) {
		
		$talentedge_socials_pl_decoded = json_decode($talentedge_socials_pl);
		
		if ( !empty($talentedge_socials_pl_decoded) ) {
		
			foreach($talentedge_socials_pl_decoded as $talentedge_socials){
				
				if( !empty($talentedge_socials->id) ) {
					$id = $talentedge_socials->id;
				}
				$icon_value = $talentedge_socials->icon_value;
				$link = $talentedge_socials->link;

				if(!empty($id)) {
					if(!empty($icon_value)){
						icl_unregister_string( 'Social '.$id, 'Social icon' );
						icl_register_string( 'Social '.$id, 'Social icon', $icon_value );
					} else {
						icl_unregister_string( 'Social '.$id, 'Social icon' );
					}
					if(!empty($link)){
						icl_unregister_string( 'Social '.$id, 'Social link' );
						icl_register_string( 'Social '.$id, 'Social link', $link );
					} else {
						icl_unregister_string( 'Social '.$id, 'Social link' );
					}
				}
			}
		}	
	}
	
	/*************************/
    /***	About us page  ***/
	/*************************/
	
	
	/* Our team */
	$talentedge_team_members_pl = get_theme_mod('talentedge_team_members');
	
	if( !empty($talentedge_team_members_pl) ) {
		
		$talentedge_team_members_pl_decoded = json_decode($talentedge_team_members_pl);
		
		if ( !empty($talentedge_team_members_pl_decoded) ) {
		
			foreach($talentedge_team_members_pl_decoded as $talentedge_team_members){
				
				if( !empty($talentedge_team_members->id) ) {
					$id = $talentedge_team_members->id;
				}
				$image_url = $talentedge_team_members->image_url;
				$text = $talentedge_team_members->text;
				$subtext = $talentedge_team_members->subtext;
				$description = $talentedge_team_members->description;

				if(!empty($id)) {
					if(!empty($image_url)){
						icl_unregister_string( 'Team member '.$id, 'Team member image' );
						icl_register_string( 'Team member '.$id, 'Team member image', $image_url );
					} else {
						icl_unregister_string( 'Team member '.$id, 'Team member image' );
					}

					if(!empty($text)){
						icl_unregister_string( 'Team member '.$id, 'Team member name' );
						icl_register_string( 'Team member '.$id, 'Team member name', $text );
					} else {
						icl_unregister_string( 'Team member '.$id, 'Team member name' );
					}

					if(!empty($subtext)){
						icl_unregister_string( 'Team member '.$id, 'Team member job' );
						icl_register_string( 'Team member '.$id, 'Team member job', $subtext );
					} else {
						icl_unregister_string( 'Team member '.$id, 'Team member job' );
					}

					if(!empty($description)){
						icl_unregister_string( 'Team member '.$id, 'Team member description' );
						icl_register_string( 'Team member '.$id, 'Team member description', $description );
					} else {
						icl_unregister_string( 'Team member '.$id, 'Team member description' );
					}
					
				}
			}
		}	
	}
	
	// /* Our advantages */
	$talentedge_advantages_pl = get_theme_mod('talentedge_advantages');
	
	if( !empty($talentedge_advantages_pl) ) {
		
		$talentedge_advantages_pl_decoded = json_decode($talentedge_advantages_pl);
		
		if ( !empty($talentedge_advantages_pl_decoded) ) {
		
			foreach($talentedge_advantages_pl_decoded as $talentedge_advantages){
				
				if( !empty($talentedge_advantages->id) ) {
					$id = $talentedge_advantages->id;
				}
				$icon_value = $talentedge_advantages->icon_value;
				$text = $talentedge_advantages->text;
				$subtext = $talentedge_advantages->subtext;
				
				if(!empty($id)) {
					if(!empty($icon_value)){
						icl_unregister_string( 'Advantage '.$id, 'Advantage icon' );
						icl_register_string( 'Advantage '.$id, 'Advantage icon',$icon_value );
					} else {
						icl_unregister_string( 'Advantage '.$id, 'Advantage icon' );
					}

					if(!empty($text)){
						icl_unregister_string( 'Advantage '.$id, 'Advantage text' );
						icl_register_string( 'Advantage '.$id, 'Advantage text', $text );
					} else {
						icl_unregister_string( 'Advantage '.$id, 'Advantage text' );
					}

					if(!empty($subtext)){
						icl_unregister_string( 'Advantage '.$id ,'Advantage subtext' );
						icl_register_string( 'Advantage '.$id ,'Advantage subtext', $subtext );
					} else {
						icl_unregister_string( 'Advantage '.$id ,'Advantage subtext' );
					}
					
				}
			}
		}	
	}
	
	
	
}


add_action('wp_footer','talentedge_php_style', 100);
function talentedge_php_style() {

	echo '<style type="text/css">';

	$talentedge_body_font_size = get_theme_mod('talentedge_font_size');
	echo  !empty($talentedge_body_font_size) ? 'body{font-size:'.$talentedge_body_font_size.'}' : '' ;

	echo '</style>';
}

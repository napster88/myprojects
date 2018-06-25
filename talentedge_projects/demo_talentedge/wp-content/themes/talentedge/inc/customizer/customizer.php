<?php

/**
 *
 * Customizer
 *
 */

/**
 * Register settings and controls for customize
 *
 * @since  1.0.0
 */ 
function talentedge_customize_register( $wp_customize ) {

	class ShopIsle_Message extends WP_Customize_Control{
		private $message = '';
		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			if(!empty($args['talentedge_message'])){
				$this->message = $args['talentedge_message'];
			}
		}

		public function render_content(){
			echo '<span class="customize-control-title">'.$this->label.'</span>';
			echo $this->message;
		}
	}

	class ShopIsle_Contact_Page_Instructions extends WP_Customize_Control {
		public function render_content() {
			echo __( 'To customize the Contact Page you need to first select the template "Contact page" for the page you want to use for this purpose. Then open that page in the browser and press "Customize" in the top bar.','talentedge' ).'<br><br>'. __( 'Need further assistance? Check out this','talentedge' ).' <a href="http://docs.themeisle.com/article/211-shopisle-customizing-the-contact-and-about-us-page" target="_blank">'.__( 'doc','talentedge' ).'</a>';
		}
	}

	class ShopIsle_Front_Page_Instructions extends WP_Customize_Control {
		public function render_content() {
			echo __( 'To customize the Frontpage sections please create a page and select the template "Frontpage" for that page. After that, go to Appearance -> Customize -> Static Front Page and under "Static Front Page" select "A static page". Finally, for "Front page" choose the page you previously created.','talentedge' ).'<br><br>'.__( 'Need further informations? Check this','talentedge' ).' <a href="http://docs.themeisle.com/article/236-how-to-set-up-the-home-page-for-llorix-one">'.__( 'doc','talentedge').'</a>';
		}
	}
	
	class ShopIsle_Aboutus_Page_Instructions extends WP_Customize_Control {
		public function render_content() {
			echo __( 'To customize the About us Page you need to first select the template "About us page" for the page you want to use for this purpose. Then open that page in the browser and press "Customize" in the top bar.','talentedge' ).'<br><br>'. __( 'Need further assistance? Check out this','talentedge' ).' <a href="http://docs.themeisle.com/article/211-shopisle-customizing-the-contact-and-about-us-page" target="_blank">'.__( 'doc','talentedge' ).'</a>';
		}
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/******************************/
	/**********  Header ***********/
	/******************************/
	
	$wp_customize->add_section( 'talentedge_header_section', array(
        'title'    => __( 'Header', 'talentedge' ),
        'priority' => 40
    ) );
	
	/* Logo */
	$wp_customize->add_setting( 'talentedge_logo', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'esc_url'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'talentedge_logo', array(
		'label'    => __( 'Logo', 'talentedge' ),
		'section'  => 'talentedge_header_section',
		'priority'    => 1,
	)));

	/***********************************************************************************/
	/******  Frontpage - instructions for users when not on Frontpage template *********/
	/***********************************************************************************/
	$wp_customize->add_section( 'talentedge_front_page_instructions', array(
		'title'    => __( 'Frontpage settings', 'talentedge' ),
		'priority' => 41
	) );
	$wp_customize->add_setting( 'talentedge_front_page_instructions', array(
		'sanitize_callback' => 'talentedge_sanitize_text'
	) );
	$wp_customize->add_control( new ShopIsle_Front_Page_Instructions( $wp_customize, 'talentedge_front_page_instructions', array(
		'section' => 'talentedge_front_page_instructions'
	)));

	/****************************************************************/
	/******************  	FRONTPAGE SECTIONS    *******************/
	/****************************************************************/
	$wp_customize->add_panel( 'talentedge_front_page_sections', array(
		'title'    => __( 'Frontpage sections', 'talentedge' ),
		'priority' => 42
	) );
	
	/*******************************/
	/******    Slider section ******/
	/*******************************/
	
	$wp_customize->add_section( 'talentedge_slider_section' , array(
		'title'       => __( 'Slider section', 'talentedge' ),
		'priority'    => 41,
		'panel' => 'talentedge_front_page_sections'
	));
	
	/* Hide slider */
	$wp_customize->add_setting( 'talentedge_slider_hide', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text'
	));

	$wp_customize->add_control(
		'talentedge_slider_hide',
		array(
			'type' => 'checkbox',
			'label' => __('Hide slider section?','talentedge'),
			'description' => __('If you check this box, the Slider section will disappear from homepage.','talentedge'),
			'section' => 'talentedge_slider_section',
			'priority'    => 1,
		)
	);
	
	/* Slider */
	$wp_customize->add_setting( 'talentedge_slider', array(
		'sanitize_callback' => 'talentedge_sanitize_repeater',
		'default' => json_encode(array( array('image_url' => get_template_directory_uri().'/assets/images/slide1.jpg' ,'link' => '#', 'text' => __('ShopIsle','talentedge'), 'subtext' => __('WooCommerce Theme','talentedge'), 'label' => __('FIND OUT MORE','talentedge') ), array('image_url' => get_template_directory_uri().'/assets/images/slide2.jpg' ,'link' => '#', 'text' => __('ShopIsle','talentedge'), 'subtext' => __('Hight quality store','talentedge') , 'label' => __('FIND OUT MORE','talentedge')), array('image_url' => get_template_directory_uri().'/assets/images/slide3.jpg' ,'link' => '#', 'text' => __('ShopIsle','talentedge'), 'subtext' => __('Responsive Theme','talentedge') , 'label' => __('FIND OUT MORE','talentedge') ))))
	);
	
	$wp_customize->add_control( new talentedge_Repeater_Controler( $wp_customize, 'talentedge_slider', array(
		'label'   => __('Add new slide','talentedge'),
		'section' => 'talentedge_slider_section',
		'active_callback' => 'is_front_page',
		'priority' => 2,
        'talentedge_image_control' => true,
        'talentedge_text_control' => true,
        'talentedge_link_control' => true,
		'talentedge_subtext_control' => true,
		'talentedge_label_control' => true,
		'talentedge_icon_control' => false,
		'talentedge_box_label' => __('Slide','talentedge'),
		'talentedge_box_add_label' => __('Add new slide','talentedge')
	) ) );
	
	/********************************/
    /*********	Banners section *****/
	/********************************/
	
	$wp_customize->add_section( 'talentedge_banners_section' , array(
		'title'       => __( 'Banners section', 'talentedge' ),
		'priority'    => 42,
		'panel' => 'talentedge_front_page_sections'
	));
	
	/* Hide banner */
	$wp_customize->add_setting( 'talentedge_banners_hide', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text'
	));

	$wp_customize->add_control(
		'talentedge_banners_hide',
		array(
			'type' => 'checkbox',
			'label' => __('Hide banners section?','talentedge'),
			'description' => __('If you check this box, the Banners section will disappear from homepage.','talentedge'),
			'section' => 'talentedge_banners_section',
			'priority'    => 1,
		)
	);
	
	/* Banner */
	$wp_customize->add_setting( 'talentedge_banners', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_repeater',
		'default' => json_encode(array( array('image_url' => get_template_directory_uri().'/assets/images/banner1.jpg' ,'link' => '#' ),array('image_url' => get_template_directory_uri().'/assets/images/banner2.jpg' ,'link' => '#'),array('image_url' => get_template_directory_uri().'/assets/images/banner3.jpg' ,'link' => '#') ))
	));
	$wp_customize->add_control( new talentedge_Repeater_Controler( $wp_customize, 'talentedge_banners', array(
		'label'   => __('Add new banner','talentedge'),
		'section' => 'talentedge_banners_section',
		'active_callback' => 'is_front_page',
		'priority' => 2,
        'talentedge_image_control' => true,
        'talentedge_link_control' => true,
        'talentedge_text_control' => false,
		'talentedge_subtext_control' => false,
		'talentedge_label_control' => false,
		'talentedge_icon_control' => false,
		'talentedge_description_control' => false,
		'talentedge_box_label' => __('Banner','talentedge'),
		'talentedge_box_add_label' => __('Add new banner','talentedge')
	) ) );
	
	
	/*********************************/
    /*******  Products section *******/
	/********************************/
	
	$wp_customize->add_section( 'talentedge_products_section' , array(
		'title'       => __( 'Products section', 'talentedge' ),
		'description' => __( 'If no shortcode or no category is selected , WooCommerce latest products are displaying.', 'talentedge' ),
		'priority'    => 43,
		'panel' => 'talentedge_front_page_sections'
	));
	
	/* Hide products */
	$wp_customize->add_setting( 'talentedge_products_hide', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text'
	));

	$wp_customize->add_control( 'talentedge_products_hide', array(
		'type' => 'checkbox',
		'label' => __('Hide products section?','talentedge'),
		'description' => __('If you check this box, the Products section will disappear from homepage.','talentedge'),
		'section' => 'talentedge_products_section',
		'priority'    => 1,
	));
	
	/* Title */
	$wp_customize->add_setting( 'talentedge_products_title', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'Latest products', 'talentedge' )
	));

	$wp_customize->add_control( 'talentedge_products_title', array(
		'label'    => __( 'Section title', 'talentedge' ),
		'section'  => 'talentedge_products_section',
		'priority'    => 2,
	));
	
	/* Shortcode */
	$wp_customize->add_setting( 'talentedge_products_shortcode', array(
		'sanitize_callback' => 'talentedge_sanitize_text'
	));

	$wp_customize->add_control( 'talentedge_products_shortcode', array(
		'label'    => __( 'WooCommerce shortcode', 'talentedge' ),
		'section'  => 'talentedge_products_section',
		'description'  => __( 'Insert a WooCommerce shortcode', 'talentedge' ),
		'priority'    => 3,
	));
	
	$talentedge_prod_categories_array = array('-' => __('Select category','talentedge'));

	$talentedge_prod_categories = get_categories( array('taxonomy' => 'product_cat', 'hide_empty' => 0, 'title_li' => '') );

	if( !empty($talentedge_prod_categories) ):
		foreach ($talentedge_prod_categories as $talentedge_prod_cat):
		
			if( !empty($talentedge_prod_cat->term_id) && !empty($talentedge_prod_cat->name) ):
				$talentedge_prod_categories_array[$talentedge_prod_cat->term_id] = $talentedge_prod_cat->name;
			endif;	
				
		endforeach;
	endif;
	
	/* Category */	
	$wp_customize->add_setting( 'talentedge_products_category', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text'
	));
	$wp_customize->add_control( 'talentedge_products_category', array(
		'type' 		   => 'select',
		'label' 	   => __( 'Products category', 'talentedge' ),
		'description'  => __( 'OR pick a product category', 'talentedge' ),
		'section' 	   => 'talentedge_products_section',
		'choices'      => $talentedge_prod_categories_array,
		'priority' 	   => 4,
	));
	
	/****************************************/
	/*********** Video section **************/
	/****************************************/
	
	$wp_customize->add_section( 'talentedge_video_section' , array(
		'title'       => __( 'Video section', 'talentedge' ),
		'priority'    => 44,
		'panel' => 'talentedge_front_page_sections'
	));
	
	/* Hide video */
	$wp_customize->add_setting( 'talentedge_video_hide', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text'
	));

	$wp_customize->add_control( 'talentedge_video_hide', array(
		'type' => 'checkbox',
		'label' => __('Hide video section?','talentedge'),
		'description' => __('If you check this box, the Video section will disappear from homepage.','talentedge'),
		'section' => 'talentedge_video_section',
		'priority'    => 1,
	));
	
	/* Title */
	$wp_customize->add_setting( 'talentedge_video_title', array(
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'talentedge_video_title', array(
		'label'    => __( 'Title', 'talentedge' ),
		'section'  => 'talentedge_video_section',
		'priority'    => 2,
	));
	
	/* Youtube link */
	$wp_customize->add_setting( 'talentedge_yt_link', array(
		'sanitize_callback' => 'esc_url'
	));

	$wp_customize->add_control( 'talentedge_yt_link', array(
		'label'    => __( 'Youtube link', 'talentedge' ),
		'section'  => 'talentedge_video_section',
		'priority'    => 3,
	));
	
	/****************************************/
    /*******  Products slider section *******/
	/****************************************/
	
	$wp_customize->add_section( 'talentedge_products_slider_section' , array(
		'title'       => __( 'Products slider section', 'talentedge' ),
		'description' => __( 'If no category is selected , WooCommerce products from the first category found are displaying.', 'talentedge' ),
		'priority'    => 45,
		'panel' => 'talentedge_front_page_sections'
	));
	
	/* Hide products slider on frontpage */
	$wp_customize->add_setting( 'talentedge_products_slider_hide', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text'
	));

	$wp_customize->add_control(
		'talentedge_products_slider_hide',
		array(
			'type' => 'checkbox',
			'label' => __('Hide products slider section on frontpage?','talentedge'),
			'description' => __('If you check this box, the Products slider section will disappear from homepage.','talentedge'),
			'section' => 'talentedge_products_slider_section',
			'priority'    => 1,
		)
	);

	/* Hide products slider on single product page */
	$wp_customize->add_setting( 'talentedge_products_slider_single_hide', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text'
	));

	$wp_customize->add_control(
		'talentedge_products_slider_single_hide',
		array(
			'type' => 'checkbox',
			'label' => __('Hide products slider section on single product page?','talentedge'),
			'description' => __('If you check this box, the Products slider section will disappear from each single product page.','talentedge'),
			'section' => 'talentedge_products_slider_section',
			'priority'    => 2,
		)
	);
	
	/* Title */
	$wp_customize->add_setting( 'talentedge_products_slider_title', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'Exclusive products', 'talentedge' )
		)
	);

	$wp_customize->add_control( 'talentedge_products_slider_title', array(
		'label'    => __( 'Section title', 'talentedge' ),
		'section'  => 'talentedge_products_slider_section',
		'priority'    => 3,
	));
	
	/* Subtitle */
	$wp_customize->add_setting( 'talentedge_products_slider_subtitle', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'Special category of products', 'talentedge' )
	));

	$wp_customize->add_control( 'talentedge_products_slider_subtitle', array(
		'label'    => __( 'Section subtitle', 'talentedge' ),
		'section'  => 'talentedge_products_slider_section',
		'priority'    => 4,
	));
	
	/* Category */
	$wp_customize->add_setting( 'talentedge_products_slider_category', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text'
	));
	$wp_customize->add_control(
		'talentedge_products_slider_category',
		array(
			'type' 		   => 'select',
			'label' 	   => __( 'Products category', 'talentedge' ),
			'section' 	   => 'talentedge_products_slider_section',
			'choices'      => $talentedge_prod_categories_array,
			'priority' 	   => 5,
		)
	);
	
	/*******************************/
    /***********  Footer ***********/
	/*******************************/
	
	$wp_customize->add_section( 'talentedge_footer_section', array(
        'title'    => __( 'Footer', 'talentedge' ),
        'priority' => 50
    ) );
	
	/* Copyright */
	$wp_customize->add_setting( 'talentedge_copyright', array(
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( '&copy; Themeisle, All rights reserved', 'talentedge'),
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'talentedge_copyright', array(
		'label'    => __( 'Copyright', 'talentedge' ),
		'section'  => 'talentedge_footer_section',
		'priority'    => 1,
	));

	/* Hide site info */
	$wp_customize->add_setting( 'talentedge_site_info_hide', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_text'
	));

	$wp_customize->add_control(
		'talentedge_site_info_hide',
		array(
			'type' => 'checkbox',
			'label' => __('Hide site info?','talentedge'),
			'description' => __('If you check this box, the Site info will disappear from footer.','talentedge'),
			'section' => 'talentedge_footer_section',
			'priority' => 2,
		)
	);
	
	/* socials */
	$wp_customize->add_setting( 'talentedge_socials', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_repeater',
		'default' => json_encode(array( array('icon_value' => 'social_facebook' ,'link' => '#' ),array('icon_value' => 'social_twitter' ,'link' => '#'), array('icon_value' => 'social_dribbble' ,'link' => '#'), array('icon_value' => 'social_skype' ,'link' => '#') )),
	));
	$wp_customize->add_control( new talentedge_Repeater_Controler( $wp_customize, 'talentedge_socials', array(
		'label'   => __('Add new social','talentedge'),
		'section' => 'talentedge_footer_section',
		'active_callback' => 'is_front_page',
		'priority' => 3,
        'talentedge_image_control' => false,
        'talentedge_link_control' => true,
        'talentedge_text_control' => false,
		'talentedge_subtext_control' => false,
		'talentedge_label_control' => false,
		'talentedge_icon_control' => true,
		'talentedge_description_control' => false,
		'talentedge_box_label' => __('Social','talentedge'),
		'talentedge_box_add_label' => __('Add new social','talentedge')
	) ) );
	
	/*********************************/
	/******  Contact page  ***********/
	/*********************************/
	
	$wp_customize->add_section( 'talentedge_contact_page_section', array(
        'title'    => __( 'Contact page', 'talentedge' ),
        'priority' => 51
    ) );
	
	/* Contact Form  */
	$wp_customize->add_setting( 'talentedge_contact_page_form_shortcode', array( 
		'sanitize_callback' => 'talentedge_sanitize_text', 
	));
	
	$wp_customize->add_control( 'talentedge_contact_page_form_shortcode', array(
		'label'    => __( 'Contact form shortcode', 'talentedge' ),
		'description' => __('Create a form, copy the shortcode generated and paste it here. We recommend <a href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a> but you can use any plugin you like.','talentedge'),
		'section'  => 'talentedge_contact_page_section',
		'active_callback' => 'talentedge_is_contact_page',
		'priority'    => 1
	));
	
	/* Map ShortCode  */
	$wp_customize->add_setting( 'talentedge_contact_page_map_shortcode', array( 
		'sanitize_callback' => 'talentedge_sanitize_text',
	));
	
	$wp_customize->add_control( 'talentedge_contact_page_map_shortcode', array(
		'label'    => __( 'Map shortcode', 'talentedge' ),
		'description' => __('To use this section please install <a href="https://wordpress.org/plugins/intergeo-maps/">Intergeo Maps</a> plugin then use it to create a map and paste here the shortcode generated','talentedge'),
		'section'  => 'talentedge_contact_page_section',
		'active_callback' => 'talentedge_is_contact_page',
		'priority'    => 2
	));
	
	/***********************************************************************************/
	/******  Contact page - instructions for users when not on Contact page  ***********/
	/***********************************************************************************/
	
	$wp_customize->add_section( 'talentedge_contact_page_instructions', array(
        'title'    => __( 'Contact page', 'talentedge' ),
        'priority' => 51
    ) );
	
	$wp_customize->add_setting( 'talentedge_contact_page_instructions', array(
		'sanitize_callback' => 'talentedge_sanitize_text',
	));
	
	$wp_customize->add_control( new ShopIsle_Contact_Page_Instructions( $wp_customize, 'talentedge_contact_page_instructions', array(
	    'section' => 'talentedge_contact_page_instructions',
		'active_callback' => 'talentedge_is_not_contact_page',
	)));
	
	
	
	/*********************************/
	/******  About us page  **********/
	/*********************************/
	
	if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_panel( 'panel_team', array(
			'priority' => 52,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'About us page', 'talentedge' )
		) );
	
		$wp_customize->add_section( 'talentedge_about_page_section', array(
			'title'    => __( 'Our team', 'talentedge' ),
			'priority' => 1,
			'panel' => 'panel_team'
		) );
		
	else:
	
		$wp_customize->add_section( 'talentedge_about_page_section', array(
			'title'    => __( 'About us page - our team', 'talentedge' ),
			'priority' => 52
		) );

	endif;
	
	/* Our team title */
	$wp_customize->add_setting( 'talentedge_our_team_title', array(
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'Meet our team', 'talentedge'), 
		'transport' => 'postMessage' 
	));

	$wp_customize->add_control( 'talentedge_our_team_title', array(
		'label'    => __( 'Title', 'talentedge' ),
		'section'  => 'talentedge_about_page_section',
		'active_callback' => 'talentedge_is_aboutus_page',
		'priority'    => 1,
	));
	
	/* Our team subtitle */
	$wp_customize->add_setting( 'talentedge_our_team_subtitle', array(
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'An awesome way to introduce the members of your team.', 'talentedge'), 
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'talentedge_our_team_subtitle', array(
		'label'    => __( 'Subtitle', 'talentedge' ),
		'section'  => 'talentedge_about_page_section',
		'active_callback' => 'talentedge_is_aboutus_page',
		'priority'    => 2,
	));
	
	/* Team members */
	$wp_customize->add_setting( 'talentedge_team_members', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_repeater',
		'default' => json_encode(array( array('image_url' => get_template_directory_uri().'/assets/images/team1.jpg' , 'text' => 'Eva Bean', 'subtext' => 'Developer', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.' ),array('image_url' => get_template_directory_uri().'/assets/images/team2.jpg' ,'text' => 'Maria Woods', 'subtext' => 'Designer', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.' ), array('image_url' => get_template_directory_uri().'/assets/images/team3.jpg' , 'text' => 'Booby Stone', 'subtext' => 'Director', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.'), array('image_url' => get_template_directory_uri().'/assets/images/team4.jpg' , 'text' => 'Anna Neaga', 'subtext' => 'Art Director', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.') )),
	));
	$wp_customize->add_control( new talentedge_Repeater_Controler( $wp_customize, 'talentedge_team_members', array(
		'label'   => __('Add new team member','talentedge'),
		'section' => 'talentedge_about_page_section',
		'active_callback' => 'talentedge_is_aboutus_page',
		'priority' => 3,
        'talentedge_image_control' => true,
        'talentedge_link_control' => false,
        'talentedge_text_control' => true,
		'talentedge_subtext_control' => true,
		'talentedge_label_control' => false,
		'talentedge_icon_control' => false,
		'talentedge_description_control' => true,
		'talentedge_box_label' => __('Team member','talentedge'),
		'talentedge_box_add_label' => __('Add new team member','talentedge')
	) ) );
	
	/***********************************************************************************/
	/******  About us page - instructions for users when not on About us page  *********/
	/***********************************************************************************/
	
	$wp_customize->add_section( 'talentedge_aboutus_page_instructions', array(
        'title'    => __( 'About us page', 'talentedge' ),
        'priority' => 52
    ) );
	
	$wp_customize->add_setting( 'talentedge_aboutus_page_instructions', array(
		'sanitize_callback' => 'talentedge_sanitize_text' 	
	));
	
	$wp_customize->add_control( new ShopIsle_Aboutus_Page_Instructions( $wp_customize, 'talentedge_aboutus_page_instructions', array(
	    'section' => 'talentedge_aboutus_page_instructions',
		'active_callback' => 'talentedge_is_not_aboutus_page',
	)));
	
	
	if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_section( 'talentedge_about_page_video_section', array(
			'title'    => __( 'Video', 'talentedge' ),
			'priority' => 2,
			'panel' => 'panel_team'
		) );
		
	else:
	
		$wp_customize->add_section( 'talentedge_about_page_video_section', array(
			'title'    => __( 'About us page - video', 'talentedge' ),
			'priority' => 53
		) );

	endif;
	
	/* Video title */
	$wp_customize->add_setting( 'talentedge_about_page_video_title', array(
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'Presentation', 'talentedge'), 
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'talentedge_about_page_video_title', array(
		'label'    => __( 'Title', 'talentedge' ),
		'section'  => 'talentedge_about_page_video_section',
		'active_callback' => 'talentedge_is_aboutus_page',
		'priority'    => 1,
	));
	
	/* Video subtitle */
	$wp_customize->add_setting( 'talentedge_about_page_video_subtitle', array(
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'What the video about our new products', 'talentedge'), 
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'talentedge_about_page_video_subtitle', array(
		'label'    => __( 'Subtitle', 'talentedge' ),
		'section'  => 'talentedge_about_page_video_section',
		'active_callback' => 'talentedge_is_aboutus_page',
		'priority'    => 2,
	));
	
	/* Video background */
	$wp_customize->add_setting( 'talentedge_about_page_video_background', array(
		'default' => get_template_directory_uri().'/assets/images/background-video.jpg', 
		'transport' => 'postMessage',
		'sanitize_callback' => 'esc_url'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'talentedge_about_page_video_background', array(
		'label'    => __( 'Background', 'talentedge' ),
		'section'  => 'talentedge_about_page_video_section',
		'active_callback' => 'talentedge_is_aboutus_page',
		'priority'    => 3,
	)));
	
	/* Video link */
	$wp_customize->add_setting( 'talentedge_about_page_video_link', array(
		'sanitize_callback' => 'talentedge_sanitize_text',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'talentedge_about_page_video_link', array(
		'label'    => __( 'Video', 'talentedge' ),
		'section'  => 'talentedge_about_page_video_section',
		'active_callback' => 'talentedge_is_aboutus_page',
		'priority'    => 4,
	));
	
	if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_section( 'talentedge_about_page_advantages_section', array(
			'title'    => __( 'Our advantages', 'talentedge' ),
			'priority' => 3,
			'panel' => 'panel_team'
		) );
		
	else:
	
		$wp_customize->add_section( 'talentedge_about_page_advantages_section', array(
			'title'    => __( 'About us page - our advantages', 'talentedge' ),
			'priority' => 54
		) );

	endif;
	
	/* Our advantages title */
	$wp_customize->add_setting( 'talentedge_our_advantages_title', array(
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'Our advantages', 'talentedge'), 
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'talentedge_our_advantages_title', array(
		'label'    => __( 'Title', 'talentedge' ),
		'section'  => 'talentedge_about_page_advantages_section',
		'active_callback' => 'talentedge_is_aboutus_page',
		'priority'    => 1,
	));
	
	/* Advantages */
	$wp_customize->add_setting( 'talentedge_advantages', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'talentedge_sanitize_repeater',
		'default' => json_encode(array( array('icon_value' => 'icon_lightbulb' , 'text' => __('Ideas and concepts','talentedge'), 'subtext' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','talentedge')), array('icon_value' => 'icon_tools' , 'text' => __('Designs & interfaces','talentedge'), 'subtext' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','talentedge')), array('icon_value' => 'icon_cogs' , 'text' => __('Highly customizable','talentedge'), 'subtext' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','talentedge')), array('icon_value' => 'icon_like', 'text' => __('Easy to use','talentedge'), 'subtext' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','talentedge')))), 
		));
		
	$wp_customize->add_control( new talentedge_Repeater_Controler( $wp_customize, 'talentedge_advantages', array(
		'label'   => __('Add new advantage','talentedge'),
		'section' => 'talentedge_about_page_advantages_section',
		'active_callback' => 'talentedge_is_aboutus_page',
		'priority' => 2,
        'talentedge_image_control' => false,
        'talentedge_link_control' => false,
        'talentedge_text_control' => true,
		'talentedge_subtext_control' => true,
		'talentedge_label_control' => false,
		'talentedge_icon_control' => true,
		'talentedge_description_control' => false,
		'talentedge_box_label' => __('Advantage','talentedge'),
		'talentedge_box_add_label' => __('Add new advantage','talentedge')
	) ) );
	
	/*********************************/
	/**********  404 page  ***********/
	/*********************************/
	
	$wp_customize->add_section( 'talentedge_404_section', array(
        'title'    => __( '404 Not found page', 'talentedge' ),
        'priority' => 54
    ) );
	
	/* Background */
	$wp_customize->add_setting( 'talentedge_404_background', array(
		'default' => get_template_directory_uri().'/assets/images/404.jpg', 
		'transport' => 'postMessage',
		'sanitize_callback' => 'esc_url'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'talentedge_404_background', array(
		'label'    => __( 'Background image', 'talentedge' ),
		'section'  => 'talentedge_404_section',
		'priority'    => 1,
	)));
	
	/* Title */
	$wp_customize->add_setting( 'talentedge_404_title', array(
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'Error 404', 'talentedge'), 
		'transport' => 'postMessage',
	));

	$wp_customize->add_control( 'talentedge_404_title', array(
		'label'    => __( 'Title', 'talentedge' ),
		'section'  => 'talentedge_404_section',
		'priority'    => 2,
	));
	
	/* Text */
	$wp_customize->add_setting( 'talentedge_404_text', array(
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'The requested URL was not found on this server.<br> That is all we know.', 'talentedge'), 
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'talentedge_404_text', array(
		'type' 		   => 'textarea',
		'label'    => __( 'Text', 'talentedge' ),
		'section'  => 'talentedge_404_section',
		'priority'    => 3,
	));
	
	/* Button link */
	$wp_customize->add_setting( 'talentedge_404_link', array(
		'sanitize_callback' => 'esc_url', 
		'default' => '#', 
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'talentedge_404_link', array(
		'label'    => __( 'Button link', 'talentedge' ),
		'section'  => 'talentedge_404_section',
		'priority'    => 4,
	));
	
	/* Button label */
	$wp_customize->add_setting( 'talentedge_404_label', array(
		'sanitize_callback' => 'talentedge_sanitize_text', 
		'default' => __( 'Back to home page', 'talentedge'), 
		'transport' => 'postMessage'
	));

	$wp_customize->add_control( 'talentedge_404_label', array(
		'label'    => __( 'Button label', 'talentedge' ),
		'section'  => 'talentedge_404_section',
		'priority'    => 5,
	));
	
	/********************************************************/
	/************** ADVANCED OPTIONS  ***********************/
	/********************************************************/
	
	$wp_customize->add_section( 'talentedge_general_section' , array(
		'title'       => __( 'Advanced options', 'talentedge' ),
      	'priority'    => 55
	));
	
	$blogname = $wp_customize->get_control('blogname');
	$blogdescription = $wp_customize->get_control('blogdescription');
	$show_on_front = $wp_customize->get_control('show_on_front');
	$page_on_front = $wp_customize->get_control('page_on_front');
	$page_for_posts = $wp_customize->get_control('page_for_posts');
	
	if(!empty($blogname)):
		$blogname->section = 'talentedge_general_section';
		$blogname->priority = 1;
	endif;
	
	if(!empty($blogdescription)):
		$blogdescription->section = 'talentedge_general_section';
		$blogdescription->priority = 2;
	endif;
	
	if(!empty($show_on_front)):
		$show_on_front->section = 'talentedge_general_section';
		$show_on_front->priority = 3;
	endif;
	
	if(!empty($page_on_front)):
		$page_on_front->section = 'talentedge_general_section';
		$page_on_front->priority = 4;
	endif;
	
	if(!empty($page_for_posts)):
		$page_for_posts->section = 'talentedge_general_section';
		$page_for_posts->priority = 5;
	endif;
	
	$wp_customize->remove_section('static_front_page');
	$wp_customize->remove_section('title_tagline');

	
	$nav_menu_locations_primary = $wp_customize->get_control('nav_menu_locations[primary]');
	if(!empty($nav_menu_locations_primary)){
		$nav_menu_locations_primary->section = 'talentedge_general_section';
		$nav_menu_locations_primary->priority = 6;
	}
	
	/* Disable preloader */
	$wp_customize->add_setting( 'talentedge_disable_preloader', array( 
		'sanitize_callback' => 'talentedge_sanitize_text',
		'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'talentedge_disable_preloader', array(
		'type' => 'checkbox',
		'label' => __('Disable preloader?','talentedge'),
		'description' => __('If this box is checked, the preloader will be disabled from homepage.','talentedge'),
		'section' => 'talentedge_general_section',
		'priority'    => 7,
	));

	/* Body font size */
	$wp_customize->add_setting( 'talentedge_font_size', array(
		'default' => '13px',
		'sanitize_callback' => 'talentedge_sanitize_text'
	) );

	$wp_customize->add_control(
		'talentedge_font_size',
		array(
			'type' 		=> 'select',
			'label' 	=> 'Select font size:',
			'section' 	=> 'talentedge_general_section',
			'choices' 	=> array(
				'12px' => '12px',
				'13px' => '13px',
				'14px' => '14px',
				'15px' => '15px',
				'16px' => '16px',
			),
		)
	);

	/*********************************/
	/******* PLUS SECTIONS ***********/
	/*********************************/
	/*
	$wp_customize->add_section( 'talentedge_sections_order_pro' , array(
		'title'       => __( 'Sections management', 'talentedge' ),
		'priority' => 20
	));
	$wp_customize->add_setting( 'talentedge_sections_management', array(
		'sanitize_callback' => 'talentedge_sanitize_text',
	) );
	$wp_customize->add_control( new ShopIsle_Message( $wp_customize, 'talentedge_sections_management',
		array(
			'label'    => __( 'Sections management', 'talentedge' ),
			'section' => 'talentedge_sections_order_pro',
			'priority' => 1,
			'talentedge_message' => sprintf( __('Check out the %1$s for full control over the frontpage SECTIONS ORDER!', 'talentedge' ), sprintf( '<a href="http://themeisle.com/themes/talentedge-pro/">%s</a>', esc_html__( 'PRO version','talentedge' )) )
		)
	));
	$wp_customize->add_section( 'talentedge_colors_section_pro' , array(
		'title'       => esc_html__( 'Color schemes', 'talentedge' ),
		'priority'    => 48,
	));
	$wp_customize->add_setting( 'talentedge_colors_schemes', array(
		'sanitize_callback' => 'talentedge_sanitize_text',
	) );
	$wp_customize->add_control( new ShopIsle_Message( $wp_customize, 'talentedge_colors_schemes',
		array(
			'label'    => __( 'Color schemes', 'talentedge' ),
			'section' => 'talentedge_colors_section_pro',
			'priority' => 1,
			'talentedge_message' => sprintf( __('Check out the %1$s for full control over the COLOR SCHEME!', 'talentedge' ), sprintf( '<a href="http://themeisle.com/themes/talentedge-pro/">%s</a>', esc_html__( 'PRO version','talentedge' )) )
		)
	));

	$wp_customize->add_section( 'talentedge_new_features_pro' , array(
		'title'       => esc_html__( 'New Features', 'talentedge' ),
		'priority'    => 76,
	));
	$wp_customize->add_setting( 'talentedge_new_services', array(
		'sanitize_callback' => 'talentedge_sanitize_text',
	) );
	$wp_customize->add_control( new ShopIsle_Message( $wp_customize, 'talentedge_new_services',
		array(
			'label'    => __( 'Services section', 'talentedge' ),
			'section' => 'talentedge_new_features_pro',
			'priority' => 1,
			'talentedge_message' => sprintf( __('Check out the %1$s for full control over a new Services section!', 'talentedge' ), sprintf( '<a href="http://themeisle.com/themes/talentedge-pro/">%s</a>', esc_html__( 'PRO version','talentedge' )) )
		)
	));

	$wp_customize->add_setting( 'talentedge_new_ribbon', array(
		'sanitize_callback' => 'talentedge_sanitize_text',
	) );
	$wp_customize->add_control( new ShopIsle_Message( $wp_customize, 'talentedge_new_ribbon',
		array(
			'label'    => __( 'Ribbon section', 'talentedge' ),
			'section' => 'talentedge_new_features_pro',
			'priority' => 2,
			'talentedge_message' => sprintf( __('Check out the %1$s for full control over a new Ribbon section!', 'talentedge' ), sprintf( '<a href="http://themeisle.com/themes/talentedge-pro/">%s</a>', esc_html__( 'PRO version','talentedge' )) )
		)
	));
	$wp_customize->add_setting( 'talentedge_new_shortcodes', array(
		'sanitize_callback' => 'talentedge_sanitize_text',
	) );
	$wp_customize->add_control( new ShopIsle_Message( $wp_customize, 'talentedge_new_shortcodes',
		array(
			'label'    => __( 'Shortcodes section', 'talentedge' ),
			'section' => 'talentedge_new_features_pro',
			'priority' => 3,
			'talentedge_message' => sprintf( __('Check out the %1$s for full control over a new Shortcodes section!', 'talentedge' ), sprintf( '<a href="http://themeisle.com/themes/talentedge-pro/">%s</a>', esc_html__( 'PRO version','talentedge' )) )
		)
	));
	*/

}

function talentedge_is_contact_page() { 
	return is_page_template('template-contact.php');
};
function talentedge_is_not_contact_page() { 
	return !is_page_template('template-contact.php');
};

function talentedge_is_aboutus_page() { 
	return is_page_template('template-about.php');
};
function talentedge_is_not_aboutus_page() { 
	return !is_page_template('template-about.php');
};

function talentedge_sanitize_repeater($input){
	  
	$input_decoded = json_decode($input,true);
	$allowed_html = array(
								'br' => array(),
								'em' => array(),
								'strong' => array(),
								'a' => array(
									'href' => array(),
									'class' => array(),
									'id' => array(),
									'target' => array()
								),
								'button' => array(
									'class' => array(),
									'id' => array()
								)
							);
	
	
	if(!empty($input_decoded)) {
		foreach ($input_decoded as $boxk => $box ){
			foreach ($box as $key => $value){
				if ($key == 'text'){
					$value = html_entity_decode($value);
					$input_decoded[$boxk][$key] = wp_kses( $value, $allowed_html);
				} else {
					$input_decoded[$boxk][$key] = wp_kses_post( force_balance_tags( $value ) );
				}

			}
		}

		return json_encode($input_decoded);
	}
	
	return $input;
}

function wp_themeisle_customize_preview_js() {
	wp_enqueue_script( 'wp_themeisle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'wp_themeisle_customize_preview_js' );
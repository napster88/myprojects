/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description a' ).text( to );
		} );
	} );

	/******************************/
	/**********  Colors ***********/
	/******************************/

	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			$( '.talentedge_header_title h1 a' ).css( {
				'color': to
			} );
			$( '.talentedge_header_title h2 a' ).css( {
				'color': to
			} );
		} );
	} );
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( {
				'background': to
			} );
			if( $( '.front-page-main' ).length > 0 ) { 
				$( '.front-page-main' ).css( {
					'background': to
				} );
			}
		} );
	} );

	/******************************/
	/**********  Header ***********/
	/******************************/
	wp.customize( 'talentedge_logo', function( value ) {
		value.bind( function( to ) {

			if( to != '' ) {
				$( '.talentedge_header_title .logo-image' ).removeClass( 'talentedge_hidden_if_not_customizer' );
				$( '.talentedge_header_title h1' ).addClass( 'talentedge_hidden_if_not_customizer' );
				$( '.talentedge_header_title h2' ).addClass( 'talentedge_hidden_if_not_customizer' );
			}
			else {
				$( '.talentedge_header_title .logo-image' ).addClass( 'talentedge_hidden_if_not_customizer' );
				$( '.talentedge_header_title h1' ).removeClass( 'talentedge_hidden_if_not_customizer' );
				$( '.talentedge_header_title h2' ).removeClass( 'talentedge_hidden_if_not_customizer' );
			}
			$( '.talentedge_header_title img' ).attr( 'src', to );

		} );
	} );
	
	/*******************************/
	/******    Slider section ******/
	/*******************************/
	wp.customize( 'talentedge_slider_hide', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( 'section.home-section' ).removeClass( 'talentedge_hidden_if_not_customizer' );
				$( '.navbar-custom' ).removeClass( 'navbar-color-customizer' );
				$('.main').css('margin-top', 0 );
			}
			else {
				$( 'section.home-section' ).addClass( 'talentedge_hidden_if_not_customizer' );
				$( '.navbar-custom' ).addClass( 'navbar-color-customizer' );
				$('.main').css('margin-top', $('.navbar-custom').outerHeight() );
			}
		} );
	} );


	/********************************/
    /*********	Banners section *****/
	/********************************/
	wp.customize( 'talentedge_banners_hide', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( '.home-banners' ).removeClass( 'talentedge_hidden_if_not_customizer' );
			}
			else {
				$( '.home-banners' ).addClass( 'talentedge_hidden_if_not_customizer' );
			}
		} );
	} );
	
	// Add new banner (Repeater)
	wp.customize( "talentedge_banners", function( value ) {
		value.bind( function( to ) {
			var obj = JSON.parse( to );
			var result ="";
			obj.forEach(function(item) {
				result += '<div class="col-sm-4"><div class="content-box mt-0 mb-0"><div class="content-box-image"><a href="' + item.link + '"><img src="' + item.image_url + '"></a></div></div></div>';
			});
			$( '.talentedge_bannerss_section' ).html( result );
		} );
	} );


	/*********************************/
    /*******  Products section *******/
	/********************************/
	wp.customize( 'talentedge_products_hide', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( '#latest' ).removeClass( 'talentedge_hidden_if_not_customizer' );
			}
			else {
				$( '#latest' ).addClass( 'talentedge_hidden_if_not_customizer' );
			}
		} );
	} );
	wp.customize( 'talentedge_products_title', function( value ) {
		value.bind( function( to ) {
			$( '.product-hide-title' ).text( to );
		} );
	} );

	/****************************************/
	/*********** Video section **************/
	/****************************************/
	wp.customize( 'talentedge_video_hide', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( '.module-video' ).removeClass( 'talentedge_hidden_if_not_customizer' );
			}
			else {
				$( '.module-video' ).addClass( 'talentedge_hidden_if_not_customizer' );
			}
		} );
	} );
	wp.customize( 'talentedge_video_title', function( value ) {
		value.bind( function( to ) {
			$( '.video-title' ).text( to );
		} );
	} );

	/****************************************/
    /*******  Products slider section *******/
	/****************************************/
	wp.customize( 'talentedge_products_slider_hide', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( '.home-product-slider' ).removeClass( 'talentedge_hidden_if_not_customizer' );
			}
			else {
				$( '.home-product-slider' ).addClass( 'talentedge_hidden_if_not_customizer' );
			}
		} );
	} );
	wp.customize( 'talentedge_products_slider_single_hide', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( '.module-small-bottom' ).removeClass( 'talentedge_hidden_if_not_customizer' );
			}
			else {
				$( '.module-small-bottom' ).addClass( 'talentedge_hidden_if_not_customizer' );
			}
		} );
	} );
	wp.customize( 'talentedge_products_slider_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-prod-title' ).text( to );
		} );
	} );
	wp.customize( 'talentedge_products_slider_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.home-prod-subtitle' ).text( to );
		} );
	} );

	/*******************************/
    /***********  Footer ***********/
	/*******************************/
	wp.customize( 'talentedge_copyright', function( value ) {
		value.bind( function( to ) {
			$( '.copyright' ).text( to );
		} );
	} );


	/*******************************************/
	/******    Hide site info from footer ******/
	/*******************************************/
	wp.customize( 'talentedge_site_info_hide', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( '.talentedge-poweredby-box' ).removeClass( 'talentedge_hidden_if_not_customizer' );
			}
			else {
				$( '.talentedge-poweredby-box' ).addClass( 'talentedge_hidden_if_not_customizer' );
			}
		} );
	} );

	// socials (Repeater)
	wp.customize( "talentedge_socials", function( value ) {
		value.bind( function( to ) {
			var obj = JSON.parse( to );
			var result ="";
			obj.forEach(function(item) {
				result+=  '<a href="' + item.link + '" class="social-icon"><i class="fa ' + item.icon_value + '"></i></a>';
			});
			$( '.footer-social-links' ).html( result );
		} );
	} );

	/*********************************/
	/******  About us page  **********/
	/*********************************/
	wp.customize( 'talentedge_our_team_title', function( value ) {
		value.bind( function( to ) {
			$( '.meet-out-team-title' ).text( to );
		} );
	} );
	wp.customize( 'talentedge_our_team_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.meet-out-team-subtitle' ).text( to );
		} );
	} );
	wp.customize( 'talentedge_about_page_video_title', function( value ) {
		value.bind( function( to ) {
			$( '.video-title' ).text( to );
		} );
	} );
	wp.customize( 'talentedge_about_page_video_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.video-subtitle' ).text( to );
		} );
	} );
	wp.customize( 'talentedge_about_page_video_background', function( value ) {
		value.bind( function( to ) {
			$( '.about-page-video' ).css( 'background-image', 'url(' + to + ')' );
		} );
	} );
	wp.customize( 'talentedge_about_page_video_link', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$( '.video-box-icon' ).removeClass( 'talentedge_hidden_if_not_customizer' );
			}
			else {
				$( '.video-box-icon' ).addClass( 'talentedge_hidden_if_not_customizer' );
			}

		} );
	} );
	wp.customize( 'talentedge_our_advantages_title', function( value ) {
		value.bind( function( to ) {
			$( '.our_advantages' ).text( to );
		} );
	} );

	/* Team members (Repeater) */
	wp.customize( "talentedge_team_members", function( value ) {
		value.bind( function( to ) {
			var obj = JSON.parse( to );
			var result ="";
			obj.forEach(function(item) {
				result += '<div class="col-sm-6 col-md-3 mb-sm-20 fadeInUp"><div class="team-item"><div class="team-image"><img src="' + item.image_url + '" alt="' + item.text + '"><div class="team-detail"><p class="font-serif">' + item.description + '</p></div><!-- .team-detail --></div><!-- .team-image --><div class="team-descr font-alt"><div class="team-name">' + item.text + '</div><div class="team-role">' + item.subtext + '</div></div><!-- .team-descr --></div><!-- .team-item --></div>';
			});
			$( '.about-team-member .slides' ).html( result );
		} );
	} );

	/* Advantages (Repeater) */
	wp.customize( "talentedge_advantages", function( value ) {
		value.bind( function( to ) {
			var obj = JSON.parse( to );
			var result ="";
			obj.forEach(function(item) {
				result += '<div class="col-sm-6 col-md-3 col-lg-3"><div class="features-item"><div class="features-icon"><span class="' + item.icon_value + '"></span></div><h3 class="features-title font-alt">' + item.text + '</h3>' + item.subtext + '</div></div>';
			});
			$( '.module-advantages .multi-columns-row' ).html( result );
		} );
	} );

	/*********************************/
	/**********  404 page  ***********/
	/*********************************/
	wp.customize( 'talentedge_404_background', function( value ) {
		value.bind( function( to ) {
			$( '.error-page-background' ).css( 'background-image', 'url(' + to + ')' );
		} );
	} );
	wp.customize( 'talentedge_404_title', function( value ) {
		value.bind( function( to ) {
			$( '.error-page-title' ).text( to );
		} );
	} );
	wp.customize( 'talentedge_404_text', function( value ) {
		value.bind( function( to ) {
			$( '.error-page-text' ).text( to );
		} );
	} );
	wp.customize( 'talentedge_404_link', function( value ) {
		value.bind( function( to ) {
			$( '.error-page-button-text a' ).attr( 'href', to );
		} );
	} );
	wp.customize( 'talentedge_404_label', function( value ) {
		value.bind( function( to ) {
			$( '.error-page-button-text a' ).text( to );
		} );
	} );

} )( jQuery );


<?php
/**
 * Template functions used for posts.
 *
 */

if ( ! function_exists( 'talentedge_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 * @since 1.0.0
	 */
	function talentedge_post_header() { ?>
		<div class="post-header font-alt">
			<h2 class="post-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
		</div>	
		
		<?php
	}
}

if ( ! function_exists( 'talentedge_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 * @since 1.0.0
	 */
	function talentedge_post_content() {
		?>
		<div class="post-entry" itemprop="articleBody">
		<?php
		the_content(
			sprintf(
				__( 'Continue reading %s', 'talentedge' ),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'talentedge' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		
		<?php
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'talentedge' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'talentedge' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		?>
		
		<?php
	}
}

if ( ! function_exists( 'talentedge_post_meta' ) ) {
	/**
	 * Display the post meta
	 * @since 1.0.0
	 */
	function talentedge_post_meta() {
	?>
		<div class="post-header font-alt">
			<div class="post-meta"><?php talentedge_posted_on(); ?></div>
		</div>
	<?php
	}
}

if ( ! function_exists( 'talentedge_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function talentedge_paging_nav() {
		echo '<div class="clear"></div>';
		?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'talentedge' ); ?></h1>
			<div class="nav-links">
				<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'talentedge' ) ); ?></div>
				<?php endif; ?>
				<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'talentedge' ) ); ?></div>
				<?php endif; ?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
		/*global $wp_query;

		$args = array(
			'type' 		=> 'list',
			'next_text' => __( 'Next', 'talentedge' ) . '&nbsp;<span class="meta-nav">&rarr;</span>',
			'prev_text'	=> '<span class="meta-nav">&larr;</span>&nbsp' . __( 'Previous', 'talentedge' ),
			);

		the_posts_pagination( $args ); */
	}
}

if ( ! function_exists( 'talentedge_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function talentedge_post_nav() {
		$args = array(
			'next_text' => '%title &nbsp;<span class="meta-nav">&rarr;</span>',
			'prev_text'	=> '<span class="meta-nav">&larr;</span>&nbsp;%title',
			);
		the_post_navigation( $args );
	}
}

if ( ! function_exists( 'talentedge_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function talentedge_posted_on() {
		$talentedge_post_author = get_the_author();
										
		if( !empty($talentedge_post_author) ):
			echo __('By ','talentedge').'<a href="'. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ).'</a> | ';
		endif;	
										
		$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		if( !empty($time_string) ):
			echo '<a href="' . get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')) . '" rel="bookmark">' . $time_string . '</a> | ';
		endif;
		
	
		$talentedge_num_comments = get_comments_number();

		if ( $talentedge_num_comments == 0 ) {
			$talentedge_comments = __('No Comments', 'talentedge');
		} elseif ( $talentedge_num_comments > 1 ) {
			$talentedge_comments = $talentedge_num_comments . __(' Comments','talentedge');
		} else {
			$talentedge_comments = __('1 Comment','talentedge');
		}
		if( !empty($talentedge_comments) ):
			echo '<a href="' . get_comments_link() .'">'. $talentedge_comments.'</a> | ';
		endif;	
										
		$talentedge_categories = get_the_category();
		$separator = ', ';
		$shop_isleoutput = '';
		if($talentedge_categories){
			foreach($talentedge_categories as $talentedge_category) {
				$shop_isleoutput .= '<a href="'.get_category_link( $talentedge_category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'talentedge' ), $talentedge_category->name ) ) . '">'.$talentedge_category->cat_name.'</a>'.$separator;
			}
			echo trim($shop_isleoutput, $separator);
		}

	}
}

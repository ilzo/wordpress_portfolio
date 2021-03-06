

<div id="content" class="site-content">
	<div class="container">
		<div class="content-left-wrap col-md-9">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
				<?php $wp_query = new WP_Query( array('post_type' => 'my_project') );
					if ( $wp_query->have_posts() ) : 
				
						while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						
						endwhile;
						
						zerif_paging_nav();
						
					else :
					
						get_template_part( 'content', 'none' ); 
						
					endif; ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .content-left-wrap -->
		<div class="sidebar-wrap col-md-3 content-left-wrap">
			<?php get_sidebar(); ?>
		</div><!-- .sidebar-wrap -->
	</div><!-- .container -->
<?php get_footer(); ?>
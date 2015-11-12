<?php
/**
 * The template for displaying Archive pages.
 */
get_header(); ?>
<div class="clear"></div>
</header> <!-- / END HOME SECTION  -->
<div id="content" class="site-content">
 <a href="#cd-nav" class="cd-nav-trigger">
	Menu<span></span>
</a>    
<div class="container">
<div class="content-left-wrap col-md-9">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <section class="cd-section projects cd-selected">
		<?php 
            if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title">
				<?php
						if ( is_category() ) :
							single_cat_title();
						elseif ( is_tag() ) :
							single_tag_title();
						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'zerif-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );
						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'zerif-lite' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'zerif-lite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'zerif-lite' ) ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'zerif-lite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'zerif-lite' ) ) . '</span>' );
						elseif ( is_tax()) :
                    
                        $term =	$wp_query->queried_object;
							_e( $term->name , 'zerif-lite' );
						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'zerif-lite');
						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'zerif-lite');
						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'zerif-lite' );
						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'zerif-lite' );
						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'zerif-lite' );
						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'zerif-lite' );
						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'zerif-lite' );
						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'zerif-lite' );
						else :
							_e( 'All projects', 'zerif-lite' );
						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
            <div class="cd-content">
                <div class="test-wrapper">
                    <?php while ( have_posts() ) : the_post(); 
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                    ?>

                            <?php get_template_part( 'content', get_post_format() ); ?>

                    <?php
                        endwhile;  

                        zerif_paging_nav(); 

                    else:

                        get_template_part( 'content', 'none' ); ?>
                    </div>
                </div>
			<?php endif; ?>
            </section>    
		</main><!-- #main -->
        
        <!-- CUSTOM SIDEBAR NAVIGATION -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>

            <ul class="cd-nav">
                
                <li class="home" data-menu="home">
                    <a href="#">
                        <span>
                            <svg class="nc-icon outline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64"><g transform="translate(0, 0)"> <polyline data-cap="butt" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" points="10,24.9 10,60 26,60 26,44 38,44 38,60 54,60 54,24.9 " stroke-linejoin="square" stroke-linecap="butt"></polyline> <polyline data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points=" 4,30 32,6 60,30 " stroke-linejoin="square"></polyline> <rect data-color="color-2" x="26" y="24" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="12" height="10" stroke-linejoin="square"></rect> </g></svg>
                        </span>

                        <em>Home</em>
                    </a>
                </li>
                <li class="cd-selected" data-menu="archive">
                    <a href="index.php">
                        <span>
                            <svg class="nc-icon outline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64"> <g transform="translate(0, 0)"> <polyline data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points=" 22,12 22,4 42,4 42,12 " stroke-linejoin="square"></polyline> <line fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="44" y1="44" x2="20" y2="44" stroke-linejoin="square"></line> <polyline fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points="12,44 2,44 2,12 62,12 62,44 52,44 " stroke-linejoin="square"></polyline> <polyline fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points="58,44 58,60 6,60 6,44 " stroke-linejoin="square"></polyline> <rect data-color="color-2" x="22" y="22" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="20" height="10" stroke-linejoin="square"></rect> <rect data-color="color-2" x="12" y="40" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="8" height="8" stroke-linejoin="square"></rect> <rect data-color="color-2" x="44" y="40" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="8" height="8" stroke-linejoin="square"></rect> </g> </svg>
                        </span>

                        <em>Projects</em>
                    </a>
                </li>
                 <li data-menu="about">
                    <a href="#">
                        <span>
                            <svg class="nc-icon outline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64"> <g transform="translate(0, 0)"> <polyline data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" points="24,40 28,48 36,48 40,40 " stroke-linejoin="square" stroke-linecap="butt"></polyline> <line data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" x1="24" y1="62" x2="28" y2="48" stroke-linejoin="square" stroke-linecap="butt"></line> <line data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" x1="36" y1="48" x2="40" y2="62" stroke-linejoin="square" stroke-linecap="butt"></line> <path data-cap="butt" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" d="M39.7,40H40c12.2,0,22,9.8,22,22v0H2 v0c0-12.2,9.8-22,22-22h0.3" stroke-linejoin="square" stroke-linecap="butt"></path> <path data-cap="butt" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" d="M47.9,27.5C47.2,35.7,40.3,42,32,42 h0c-8.3,0-15.2-6.4-15.9-14.5" stroke-linejoin="square" stroke-linecap="butt"></path> <path fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M16,18c0-8.8,7.2-16,16-16 h0c8.8,0,16,7.2,16,16" stroke-linejoin="square"></path> <path data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M12.1,18 c0,0.3-0.1,0.7-0.1,1c0,6.1,4.9,11,11,11c3.7,0,7-1.9,9-4.7c2,2.8,5.3,4.7,9,4.7c6.1,0,11-4.9,11-11c0-0.3,0-0.7-0.1-1H12.1z" stroke-linejoin="square"></path> </g> </svg>
                        </span>

                        <em>About Me</em>
                    </a>
                </li>
              

               
            </ul>
        </nav>
        <div class="cd-overlay"><!-- shadow layer visible when navigation is visible --></div>
	</div><!-- #primary -->
</div><!-- .content-left-wrap -->
<div class="sidebar-wrap col-md-3 content-left-wrap">
	<?php get_sidebar(); ?>
</div><!-- .sidebar-wrap -->
</div><!-- .container -->
<?php get_footer(); ?>
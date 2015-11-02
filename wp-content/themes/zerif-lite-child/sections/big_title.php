<div class="home-header-wrap">

<?php

	$zerif_parallax_img1 = get_theme_mod('zerif_parallax_img1',get_template_directory_uri() . '/images/background1.jpg');
	$zerif_parallax_img2 = get_theme_mod('zerif_parallax_img2',get_template_directory_uri() . '/images/background2.png');
	$zerif_parallax_use = get_theme_mod('zerif_parallax_show');

	if ( $zerif_parallax_use == 1 && (!empty($zerif_parallax_img1) || !empty($zerif_parallax_img2)) ) {
		echo '<ul id="parallax_move">';
				if( !empty($zerif_parallax_img1) ) { 
				echo '<li class="layer layer1" data-depth="0.10" style="background-image: url(' . $zerif_parallax_img1 . ');"></li>';
			}
			if( !empty($zerif_parallax_img2) ) { 
				echo '<li class="layer layer2" data-depth="0.20" style="background-image: url(' . $zerif_parallax_img2 . ');"></li>';
			}

		echo '</ul>';
		}

	echo '<div class="header-content-wrap">';

		echo '<div class="container">';

		$zerif_bigtitle_title = get_theme_mod('zerif_bigtitle_title',__('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG','zerif-lite'));

		if( !empty($zerif_bigtitle_title) ):

			echo '<h1 class="intro-text">'.$zerif_bigtitle_title.'</h1>';

		endif;

		$zerif_bigtitle_aboutbutton_label = get_theme_mod('zerif_bigtitle_aboutbutton_label',__('About me','zerif-lite'));

		$zerif_bigtitle_aboutbutton_url = get_theme_mod('zerif_bigtitle_aboutbutton_url', esc_url( home_url( '/' ) ).'#aboutus');

		$zerif_bigtitle_worksbutton_label = get_theme_mod('zerif_bigtitle_worksbutton_label',__("Projects",'zerif-lite'));

		$zerif_bigtitle_worksbutton_url = get_theme_mod('zerif_bigtitle_worksbutton_url',esc_url( home_url( '/' ) ).'#latestnews');

		if( (!empty($zerif_bigtitle_aboutbutton_label) && !empty($zerif_bigtitle_aboutbutton_url)) || (!empty($zerif_bigtitle_worksbutton_label) && !empty($zerif_bigtitle_worksbutton_url))):

			echo '<div class="buttons">';

				if ( !empty($zerif_bigtitle_aboutbutton_label) && !empty($zerif_bigtitle_aboutbutton_url) ):

					echo '<a href="'.$zerif_bigtitle_aboutbutton_url.'" class="custom-button about-btn">'.$zerif_bigtitle_aboutbutton_label.'</a>';

				endif;

				if ( !empty($zerif_bigtitle_worksbutton_label) && !empty($zerif_bigtitle_worksbutton_url) ):

					echo '<a href="'.$zerif_bigtitle_worksbutton_url.'" class="custom-button works-btn">'.$zerif_bigtitle_worksbutton_label.'</a>';

				endif;

			echo '</div>';

		endif;

		echo '</div>';

	echo '</div><!-- .header-content-wrap -->';
		echo '<div class="clear"></div>';

?>

</div>
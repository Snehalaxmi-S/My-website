<?php 

	$education_insight_logo_max_height = get_theme_mod('education_insight_logo_max_height');

	if($education_insight_logo_max_height != false){

		$education_insight_custom_style .='.custom-logo-link img{';

			$education_insight_custom_style .='max-height: '.esc_html($education_insight_logo_max_height).'px;';
			
		$education_insight_custom_style .='}';
	}

	// sticky

	$education_insight_custom_style= "";

	if( get_option( 'education_insight_sticky_header',true) != 'on') {

		$education_insight_custom_style .='.wrap_figure.fixed{';

			$education_insight_custom_style .='position: static;';
			
		$education_insight_custom_style .='}';
	}

	if( get_option( 'education_insight_sticky_header',false) != 'off') {

		$education_insight_custom_style .='.wrap_figure.fixed{';

			$education_insight_custom_style .='position: fixed;';
			
		$education_insight_custom_style .='}';
	}
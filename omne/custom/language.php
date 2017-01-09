<?php
/* languages customizations
- add require_once(get_stylesheet_directory().'/custom/language.php'); to functions.php to make this work.
*/
	if ( !function_exists('eai_change_theme_text') ){
		function eai_change_theme_text( $translated_text, $text, $domain ) {
			 /* if ( is_singular() ) { */
			 	$theme_text_domain = 'oshin';
				switch ($domain) {
					case $theme_text_domain:	 // theme strings.
					    switch ( $translated_text ) {
							case 'Category Archives: %s' :
				                $translated_text = __( '%s',  $domain  );
				                break;
		        		}
						break;
					case 'event-tickets-plus': // string for events tickets plus
						switch ( $translated_text ) {
							case 'Tickets' :
								$translated_text = __('Registration', $domain);
								break;
						}
						break;
				}
	    	return $translated_text;
		}
		add_filter( 'gettext', 'eai_change_theme_text', 20, 3 );
	}

?>

<?php

define( 'COOKIE_DOMAIN', $_SERVER['HTTP_HOST'] );
/*  ----------------------------------------------------------------------------
    Newspaper V9.0+ Child theme - Please do not use this child theme with older versions of Newspaper Theme

    What can be overwritten via the child theme:
     - everything from /parts folder
     - all the loops (loop.php loop-single-1.php) etc
	 - please read the child theme documentation: http://forum.tagdiv.com/the-child-theme-support-tutorial/

 */

/*  ----------------------------------------------------------------------------
    add the parent style + style.css from this folder
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 11 );
function theme_enqueue_styles() {
	wp_enqueue_style( 'td-theme', get_template_directory_uri() . '/style.css', '', TD_THEME_VERSION, 'all' );
	wp_enqueue_style( 'td-theme-child', get_stylesheet_directory_uri() . '/style.css', array( 'td-theme' ),
		TD_THEME_VERSION . 'c', 'all' );
}

/*  ----------------------------------------------------------------------------
    add the user IP Location
 */
add_action( 'wp_ajax_getIpdata', 'getIpdata' );
add_action( 'wp_ajax_nopriv_getIpdata', 'getIpdata' );
function getIpdata() {
	
	return wp_send_json( $_SERVER["HTTP_CF_IPCOUNTRY"] );
}

/*  ----------------------------------------------------------------------------
    Change Login Page Logo into Website Logo
 */
function my_login_logo_one() {
	$url = site_url( '/wp-content/uploads/2021/07/Hindupost-Logo.png' );
	?>
	<style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo $url; ?>);
            padding-bottom: 30px;
        }
	</style>
	<?php
}

add_action( 'login_enqueue_scripts', 'my_login_logo_one' );

/**
 * Automatic Posting a Koo
 */
function so_post_40744782( $new_status, $old_status, $post ) {
	if ( $new_status == 'publish' && $old_status != 'publish' ) {
		$data = [
			'koo'      => substr( strip_tags( get_post_field( 'post_content', $post->ID ) ), 0, 340 ) . ' ...',
			'language' => 'hi',
			'link'     => get_the_permalink( $post->ID )
		];
		
		$url      = 'https://api.kooapp.com/api/post/koo';
		$response = wp_remote_post(
			$url,
			array(
				'method'      => 'POST',
				'timeout'     => 45,
				'redirection' => 5,
				'httpversion' => '1.0',
				'sslverify'   => false,
				'blocking'    => false,
				'headers'     => array(
					'Content-Type'    => 'application/json',
					'X-KOO-API-TOKEN' => 'xxxxxxxxx-xxxxxxxx-xxxxxx',
					'Accept'          => 'application/json',
				),
				'body'        => json_encode( $data ),
				'cookies'     => array()
			)
		);
	}
}

add_action( 'transition_post_status', 'so_post_40744782', 10, 3 );


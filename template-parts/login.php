<?php
/**
* @package dagens
*/
if ( ! is_user_logged_in() ) { // Display WordPress login form:	?>
	<div id="login-box" class="wrapper header bg dark">
		<?php
		$args = array(
			'form_id'        => 'loginform-header',
			'label_username' => __( 'E-mail' ),
			'label_password' => __( 'Password' ),
			'label_remember' => __( 'Husk mig' ),
			'label_log_in'   => __( 'Log ind' ),
			'remember'       => true
		);
		wp_login_form( $args );
		?>
	</div>
	<?php	} else { ?>
		<div id="user-box" class="login-wrapper header bg dark">
			<a class="button" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ) ?>" title="<?php _e('My Account','prakmed') ?>"><?php _e('My Account','dagens') ?></a>
			<div class="button"><?php wp_loginout( home_url() ) // Display "Log Out" link. ?></div>
		</div>
		<?php } ?>

<?php

add_shortcode( 'prakmed_login', 'prakmed_login_box' );

if ( ! function_exists( 'prakmed_login_box' ) ) :
	function prakmed_login_box() {
		if ( ! is_user_logged_in() ) { // Display WordPress login form:
			$args = array(
				'echo'           => false,
				'form_id' => 'loginform-entry',
				'label_username' => __( 'E-mail' ),
				'label_password' => __( 'Password' ),
				'label_remember' => __( 'Husk mig' ),
				'label_log_in' => __( 'Log ind' ),
				'remember' => true
			);
      $logintext  = '<h3>' . esc_html__( 'Do you have account?', 'prakmed' ) . '</h3>';
      $logintext .= '<p>' . esc_html__( 'Log in here.', 'prakmed' ) . '</p>';

      $loginform  = wp_login_form( $args );
			$loginform .= '<a class="lost_password" class="button" href="' . esc_url( wc_lostpassword_url() ) . '">' . __( 'Lost your password?', 'prakmed' ) . '</a>';

			return '<div class="login-box">' . $logintext . $loginform . '</div>' ;
		}
	}
endif;

add_shortcode( 'prakmed_access', 'prakmed_access' );

if ( ! function_exists( 'prakmed_access' ) ) :
	function prakmed_access() {
    // bail if Memberships isn't active
    if ( ! function_exists( 'wc_memberships' ) ) {
      return;
    }

    $user_id = get_current_user_id();
    $_get_access_path = '/faa-adgang/';
    $_get_access_url = site_url( $_get_access_path );

    // Bail if the user already has active membership
    if ( wc_memberships_is_user_active_member( $user_id, 'access' )) {
      return;
    }

      $get_access  = '<h3>' . esc_html__( 'How to get access', 'prakmed' ) . '</h3>';
      $get_access .= '<p>' . esc_html__( 'In order to read articles, you need to register as user.', 'prakmed' ) . '</p>';
      $get_access .= '<div class="get_access twelve columns"><p>';
      $get_access .= '<span><a href="' . $_get_access_url . '" class="button">' . esc_html__('Create user', 'prakmed') . '</a>';
      $get_access .= '</span></p></div>';
      return $get_access;

    }
endif;

if ( ! function_exists( 'prakmed_access_box' ) ) :
	function prakmed_access_box() {
    // bail if Memberships isn't active
    if ( ! function_exists( 'wc_memberships' ) ) {
      return;
    }

    $user_id = get_current_user_id();
    $_get_access_product_id = get_option( 'woocommerce_prakmed_access_with_code', 1 );
    $_get_access_path = '/faa-adgang/?add-to-cart=' . $_get_access_product_id;
    $_get_access_url = site_url( $_get_access_path );

    $_buy_access_path = '/koeb-bogen/';
    $_buy_access_url = site_url( $_buy_access_path );


    // Bail if the user already has active membership
    if ( wc_memberships_is_user_active_member( $user_id, 'access' )) {
      return;
    }

      $get_access  = '<h3>' . esc_html__( 'How to get access', 'prakmed' ) . '</h3>';
      $get_access .= '<p>' . esc_html__( 'In order to read articles, you need to either have the book Praktisk Medicin or buy digital subscription.', 'prakmed' ) . '</p>';
      $get_access .= '<div class="get_access six columns"><p><span>' . esc_html__('If you have the book', 'prakmed');
      $get_access .= '</span><a href="' . $_get_access_url . '" class="button">' . esc_html__('Use code here', 'prakmed') . '</a>';
      $get_access .= '</p></div>';
      $get_access .= '<div class="buy_access six columns"><p><span>' . esc_html__('If you want digital access', 'prakmed');
      $get_access .= '</span><a href="' . $_buy_access_url . '" class="button">' . esc_html__('Buy access here', 'prakmed') . '</a>';
      $get_access .= '</p></div>';
      return $get_access;

    }
endif;

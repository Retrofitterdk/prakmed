<?php
add_action( 'after_setup_theme', 'homepage_setup' );

function homepage_setup () {
  add_action( 'homepage', 'prakmed_the_search', 10 );
  add_action( 'homepage', 'prakmed_the_sections', 20 );
  add_action( 'homepage', 'prakmed_get_access', 30 );
}

/**
* Check if product purchasing is retricted
* Example: Add a restricted product notice
* Display a top notice to non-members for members-only products
*/
function prakmed_get_access() {

  // bail if Memberships isn't active
  if ( ! function_exists( 'wc_memberships' ) ) {
    return;
  }

  $user_id = get_current_user_id();
  $_get_access_product_id = get_option( 'woocommerce_prakmed_access_with_code', 1 );
  $_get_access_path = '/faa-adgang/?add-to-cart=' . $_get_access_product_id;
  $_get_access_url = site_url( $_get_access_path );

  // Bail if the user already has active membership
  if ( wc_memberships_is_user_active_member( $user_id, 'access' )) {
    return;
  }

  // Add our top notice if purchasing is restricted
  if (is_front_page() ) {

    $get_access  = '<div class="woocommerce"><div class="woocommerce-info wc-memberships-content-restricted-message">';
    $get_access .= '<h1>' . esc_html__( 'How to get access', 'prakmed' ) . '</h1>';
    $get_access .= '<p>' . esc_html__( 'In order to read articles, you need to either have the book Praktisk Medicin 2017 or buy digital subscription.', 'prakmed' ) . '</p>';
    $get_access .= '<div class="get_access six columns"><p><span>' . esc_html__('If you have the book', 'prakmed');
    $get_access .= '</span><a href="' . $_get_access_url . '" class="button">' . esc_html__('Use code here', 'prakmed') . '</a>';
    $get_access .= '</p></div>';
    $get_access .= '<div class="buy_access six columns"><p><span>' . esc_html__('If you want digital access', 'prakmed');
    $get_access .= '</span><a href="http://prakmed.dev/koeb-bogen/" class="button">' . esc_html__('Buy access here', 'prakmed') . '</a>';
    $get_access .= '</p></div></div></div>';
    echo $get_access;

  }
}

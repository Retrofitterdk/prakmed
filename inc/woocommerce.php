<?php // only copy this line if needed

/**
* Check if product purchasing is retricted
* Example: Add a restricted product notice
* Display a top notice to non-members for members-only products
*/
add_action( 'before_main_content', 'prakmed_get_access' );
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

    $get_access  = '<h1>' . esc_html__( 'How to get access', 'prakmed' ) . '</h1>';
    $get_access .= '<p>';
    $get_access .= '<span>' . esc_html__('If you have code from book', 'prakmed');
    $get_access .= '</span><a href="' . $_get_access_url . '" class="button get_access">' . esc_html__('Get access here', 'prakmed') . '</a>';
    $get_access .= '</p>';

    $get_access .= '<p>';
    $get_access .= '<span>' . esc_html__('If you want to buy access', 'prakmed');
    $get_access .= '</span><a href="http://prakmed.dev/koeb-bogen/" class="button buy_access">' . esc_html__('Get access here', 'prakmed') . '</a>';
    $get_access .= '</p>';
    echo $get_access;

  }
}

add_filter( 'woocommerce_product_settings', 'prakmed_add_a_setting' );
function prakmed_add_a_setting( $settings ) {
  $settings[] = array( 'name' => __( 'Featured products', 'prakmed' ), 'type' => 'title', 'desc' => '', 'id' => 'woocommerce_prakmed_settings' );

  $settings[] = array(
    'title'    	=> __( 'Product to buy with code from book', 'prakmed' ),
    'desc'     	=> '',
    'id'       	=> 'woocommerce_prakmed_access_with_code',
    'desc'  	=> __( 'Add ID for product, that can be bought for free with book code', 'prakmed' ),
    'type'     	=> 'text',
    'default'	=> '',
    'desc_tip'	=> false,
    'placeholder' => __( 'Product ID', 'prakmed' ),
  );

  $settings[] = array( 'type' => 'sectionend', 'id' => 'woocommerce_prakmed_settings');

  return $settings;

}

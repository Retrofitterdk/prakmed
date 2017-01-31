<?php // only copy this line if needed

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

  // Bail if the user already has active membership
  if ( wc_memberships_is_user_active_member( $user_id, 'access' )) {
    return;
  }

  // Add our top notice if purchasing is restricted
  if (is_front_page() ) {

    $get_access  = '<h1>' . esc_html__( 'How to get access', 'prakmed' ) . '</h1>';
    $get_access .= '<p>';
    $get_access .= '<span>' . esc_html__('If you have code from book', 'prakmed');
    $get_access .= '</span><a href="http://prakmed.dev/faa-adgang/?add-to-cart=1981" class="button">' . esc_html__('Get access here', 'prakmed') . '</a>';
    $get_access .= '</p>';

    $get_access .= '<p>';
    $get_access .= '<span>' . esc_html__('If you want to buy access', 'prakmed');
    $get_access .= '</span><a href="http://prakmed.dev/koeb-bogen/" class="button">' . esc_html__('Get access here', 'prakmed') . '</a>';
    $get_access .= '</p>';
    echo $get_access;

  }
}
add_action( 'before_main_content', 'prakmed_get_access' );


/**
* Change the add to cart text on single product pages
*/
add_filter( 'woocommerce_checkout_coupon_message', 'prakmed_custom_coupon_message');
function prakmed_custom_coupon_message() {

  foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
    $_product = $values['data'];
    $_get_access_product_id = '1978';

    if( $_get_access_product_id == $_product->id ) {
      return '<i class="fa fa-ticket" aria-hidden="true"></i> Have a coupon from book? – enter it below';
    }
else {
  return;
}
}
}

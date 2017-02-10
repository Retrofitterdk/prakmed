<?php // only copy this line if needed

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
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

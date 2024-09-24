<?php
$this->load_parts( array( 'html-start' ) );
global $post, $product;
$postid = $post->ID;
?>
	<div class="all_content">
		<?php $this->load_parts( array( 'header-bar' ) ); ?>
		<div class="dima-main clearfix">
			<?php dima_amp_template_part( 'views/page-title' ); ?>
			<div class="page-section-content boxed-blog blog-list blog-single">
				<div class="container">
					<div class="mini-width" role="main">
						<article
								class="amp-wp-article <?php echo esc_attr( apply_filters( 'dima_amp_body_classes', array( '' ) ) ); ?>">

							<div class="amp-wp-article-content">
								<?php

								do_action( 'woocommerce_before_single_product' );
								echo( $this->get( 'post_amp_content' ) );
								?>
								<div class="double-clear"></div>
								<p class="product_meta">
								<?php
									echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' );
									echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' );
								?>
								</p>
								<div class="double-clear"></div>
								<?php if ( $product->is_in_stock() ) { ?>
									<?php
									if ( $product->get_price() != '' ) {
										echo apply_filters(
											'woocommerce_loop_add_to_cart_link',
											sprintf(
												'<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="single_add_to_cart_button dima-button fill %s product_type_%s">%s</a>',
												esc_url( $product->add_to_cart_url() ),
												esc_attr( $product->get_id() ),
												esc_attr( $product->get_sku() ),
												esc_attr( isset( $quantity ) ? $quantity : 1 ),
												$product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart add_to_cart_button' . $class : '',
												esc_attr( $product->get_type() ),
												$product->single_add_to_cart_text()
											),
											$product
										);
									}
								}
								dima_amp_template_part( 'woo-tabs' );
								echo( DIMA_AMP::dima_share_buttons() );

								?>
								<?php do_action( 'woocommerce_after_single_product' ); ?>
							</div>

						</article>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
/*
------------------------------*/
// Add Pagination
/*------------------------------*/
if ( is_single() ) :
	// Call article schemas
	// !☺: It will work if the option is on from cuzmezer.
	do_action( 'dima_end_of_post' );
	// Call Pagination.
	dima_post_navigation();
endif;

?>

<?php $this->load_parts( array( 'footer' ) ); ?>

<?php
do_action( 'amp_post_template_footer', $this );

$this->load_parts( array( 'html-end' ) );

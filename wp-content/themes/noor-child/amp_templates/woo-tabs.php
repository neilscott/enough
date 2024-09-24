<?php
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
global $wp_query, $post;
$postid = $post->ID;
if ( ! empty( $tabs ) && dima_helper::dima_am_i_true( dima_helper::dima_get_option( 'dima_shop_product_tap_display' ) ) ) { ?>
    <amp-accordion>
		<?php foreach ( $tabs as $key => $tab ) : ?>

            <section>
                <h4><?php echo apply_filters( 'woocommerce_product_' . esc_attr( $key ) . '_tab_title', esc_html( $tab['title'] ), $key ); ?></h4>
                <div>
					<?php
					if ( 'description' == $key ) {
						the_excerpt();
					} else if ( 'reviews' == $key ) {
						$comments_link_url = get_permalink( $postid );
						?>
						<?php if ( $comments_link_url ) : ?>
							<?php $comments_link_text = __( 'Submit Review', 'noor' );
							?>
                            <a class="dima-button fill float-center"
                               href="<?php echo esc_url( $comments_link_url . "#tab-reviews" ); ?>">
								<?php echo esc_html( $comments_link_text ); ?>
                            </a>
						<?php endif;
					} else {
						call_user_func( $tab['callback'], $key, $tab );
					}
					?>
                </div>
            </section>

		<?php endforeach; ?>
    </amp-accordion>
<?php } ?>
<?php
$this->load_parts( array( 'html-start' ) );
?>
    <div class="all_content">
		<?php $this->load_parts( array( 'header-bar' ) ); ?>
        <div class="dima-main clearfix">
			<?php dima_amp_template_part( 'views/page-title' ); ?>
            <div class="page-section-content boxed-blog blog-list blog-single">
                <div class="container">
                    <div class="mini-width" role="main">
                        <article
                                class="entry-content <?php echo esc_attr( apply_filters( 'dima_amp_body_classes', array( '' ) ) ); ?>">
                            <header class="amp-dima-article-header">
								<?php
								dima_amp_get_query()->the_post();
								dima_get_entry_meta( true, '' );
								dima_amp_clear_query();
								?>
                            </header>

                            <div class="amp-wp-article-content">
								<?php
								echo( $this->get( 'post_amp_content' ) ); // amphtml content; no kses
								?>
                            </div>

                            <footer class="amp-wp-article-footer">
								<?php
								echo( DIMA_AMP::dima_share_buttons() );
								$this->load_parts( apply_filters( 'amp_post_article_footer_meta', array(
									'meta-taxonomy',
								) ) );
								$related_posts_is_on = dima_helper::dima_am_i_true( dima_helper::dima_get_option( 'dima_amp_related_posts' ) );
								if ( $related_posts_is_on ) {
									dima_amp_template_part( 'views/related' );
								}
								$this->load_parts( apply_filters( 'amp_post_article_footer_meta', array(
									'meta-comments-link'
								) ) );
								?>
                            </footer>

                        </article>
                    </div>
                </div>
            </div>
        </div>
		<?php
		/*------------------------------*/
		# Add Pagination
		/*------------------------------*/
		if ( is_single() ):
			// Call article schemas
			// !☺: It will work if the option is on from cuzmezer.
			do_action( 'dima_end_of_post' );
			// Call Pagination.
			dima_post_navigation();
		endif;
		?>
		<?php $this->load_parts( array( 'footer' ) ); ?>

		<?php do_action( 'amp_post_template_footer', $this ); ?>
    </div>
<?php
$this->load_parts( array( 'html-end' ) );
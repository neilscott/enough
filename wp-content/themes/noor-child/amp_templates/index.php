<?php
/**
 * Page view template.
 *
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */

$this->load_parts( array( 'html-start' ) );
?>
    <div class="all_content">
		<?php $this->load_parts( array( 'header' ) ); ?>
        <div class="dima-main clearfix">
			<?php dima_amp_template_part( 'views/page-title' ); ?>
            <div class="page-section-content">
                <div class="container">
                    <div class="mini-width" role="main">
                        <div class="boxed-blog blog-list dima-layout-standard">
							<?php
							if ( have_posts() ):
								while ( have_posts() ): the_post(); ?>
									<?php $post_id = get_the_ID(); ?>
                                    <article <?php dima_amp_post_classes( 'entry-content listing-item clearfix' ) ?>>

                                        <header class="amp-wp-article-header">
                                            <h3 class="amp-wp-title clearfix">
                                                <a href="<?php the_permalink() ?>"
                                                   title="<?php the_title_attribute( $post_id ) ?>">
													<?php the_title() ?>
                                                </a>
                                            </h3>

                                        </header>
                                        <hr class="entry-title-hr">
										<?php
										dima_get_entry_meta( true, '' );
										?>
                                        <div class="amp-wp-article-content">
											<?php
											$excerpt        = esc_attr( dima_helper::dima_get_option( 'dima_blog_blog_excerpt' ) );
											dima_amp_build_post_featured_image( $post_id, 'dima-post-standard-image' );
											dima_get_post_content( false, $excerpt );
											?>
                                        </div>
                                    </article>

								<?php endwhile;
							else:
								echo wpautop( 'Sorry, no posts were found' );
							endif;
							?>
							<?php
							dima_pagination();
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php $this->load_parts( array( 'footer' ) ); ?>
    </div>
<?php
$this->load_parts( array( 'html-end' ) );
<?php
get_header(); ?>

    <div class="page-section-content boxed-blog blog-list blog-single">
        <div class="container">

            <div class="<?php dima_main_content_class(); ?>" role="main">
                <?php
                while ( have_posts() ) :
                    the_post();
                    // Above Post Banner.
                    dima_above_post_ad();

                    do_action( 'dima_action_before_post' );?>

                    <?php
                    /**
                     * @package Dima Framework
                     * @subpackage root views
                     * @version   1.0.0
                     * @since     1.0.0
                     * @author    PixelDima <info@pixeldima.com>
                     */
                    if ( is_singular() && ! is_page() ) {
                        // Single post.
                        $args = dima_helper::get_featured_args();
                    } else {
                        // post list.
                        $args = dima_helper::get_featured_args( $this );
                    }
                    ?>
                    <article <?php post_class( $args['post_class'] ); ?> >

                        <?php if ( is_sticky() && ( 'standard' === $args['blog_type'] || ! DIMA_NOUR_ASSISTANT_IS_ACTIVE ) && in_array( 'sticky', get_post_class() ) ) { ?>
                            <div class="post-icon on_the_front">
                                <ul class="icons-media">
                                    <li class="dima_go_sticky">
                                        <?php echo dima_helper::dima_get_sticky(); ?>
                                    </li>
                                </ul>
                            </div>
                            <?php
                        }

                        if ( ( $args['post_title_above'] && ! ( is_singular() && is_single() ) ) || ( is_singular() && is_single() ) ) {
                            dima_helper::dima_get_view( 'partials/contents', '_content', 'post-header' );
                        }



                        if ( $args['show_image'] ) {
                            ?>
                            <?php
                            dima_featured_image(
                                array(
                                    'post_type' => $args['blog_type'],
                                    'img_hover' => $args['img_hover'],
                                    'elm_hover' => $args['elm_hover'],
                                )
                            );
                            ?>
                            <?php
                        }

                        if ( ! $args['post_title_above'] && ! ( is_singular() && is_single() ) ) {
                            dima_helper::dima_get_view( 'partials/contents', '_content', 'post-header' );
                            ?>
                            <hr class="entry-title-hr">
                            <?php
                        }

                        if ( ( $args['blog_type'] == 'masonry' || $args['blog_type'] == 'slide' || $args['blog_type'] == 'grid' ) && ( ! is_singular() || is_page() ) ) {
                            dima_get_entry_meta( $args );
                        }
                        ?>
<div class="project-details">
                            <h6>Project Name</h6>
                            <p><?php echo the_title() ?></p>
                            <?php if(get_field('project_location')) {
                                echo '<h6>Location</h6>';
                                echo '<p>' . get_field('project_location'). '</p>';
                            }
                            if(get_field('project_website')) {
                                echo '<h6>Website</h6>';
                                $website_url=get_field('project_website');
                                echo '<p><a href="'.$website_url . '">'.$website_url.'</a></p>';
                            }
                            ?>
</div>
                        <div class="<?php dima_pots_content_class(); ?>">

                            <?php
                            dima_get_post_content( $args['is_full_post_content_blog'], $args['words'] );
                            dima_helper::dima_get_view( 'partials/contents', '_content', 'post-footer' );
                            ?>
                        </div>

                    </article>

                <div class="next-prev-links">
                    <div class="prev-link"><?php previous_post_link('%link', '« Previous Project');  ?></div>
                    <div class="next-link"><?php  next_post_link('%link', 'Next Project &raquo'); ?></div>

                </div>




                    <?php do_action( 'dima_action_after_post' );

                    // Below Post Banner.
                    dima_below_post_ad();

                    do_action( 'dima_action_before_author' );
                    dima_helper::dima_get_view( 'partials', 'about-the-author' );
                    do_action( 'dima_action_after_author' );

                   // dima_helper::dima_get_view( 'partials', 'related-post' );
                   // dima_helper::dima_get_view( 'partials/comments', 'comments-template' );
                endwhile;
                ?>
            </div>

            <?php get_sidebar(); ?>
        </div><!-- .container -->
    </div><!-- .page-section-content -->

<?php
// Add Pagination.
if ( is_single() ) :
    // Call article schemas
    // !☺: It will work if the option is on from cuzmezer.
    do_action( 'dima_end_of_post' );
    // Call Pagination.
    //dima_post_navigation();
endif;

get_footer();

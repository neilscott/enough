<?php
// Enqueue AMP carousel script
$query_args = dima_helper::dima_get_post_related_posts( dima_helper::dima_get_option( 'dima_post_related_count' ), null, 'tag' );
if ( $query_args ):
?>
<div class="double-clear"></div>
<div class="double-clear"></div>
<div class="related-post clearfix carousel">
    <h5 class="related-posts-title"><?php echo dima_helper::dima_get_option( 'dima_amp_check_also' ) ?></h5>
    <div class="noor-line"></div>
    <amp-carousel class="amp-carousel" type="carousel" height="220" layout="fixed-height">
		<?php
		if ( $query_args->have_posts() ):
			while ( $query_args->have_posts() ): $query_args->the_post(); ?>
				<?php
				$post_id = get_the_ID();
				?>
                <div class="<?php echo $post_id; ?> carousel-item">
                    <div class="related-entry-media">
                        <div class="related-entry-thumbnail">
                            <a class="img-holder" href="<?php the_permalink() ?>"></a>
							<?php
							dima_amp_build_post_featured_image( $post_id, 'dima-related-image' );
							?>
                        </div>
                    </div>
                    <div class="related-entry-title">
                        <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    </div>
                </div>
			<?php endwhile;
		endif;
		?>
    </amp-carousel>
</div>
<?php endif;
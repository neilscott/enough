<?php
$comments_link_url = $this->get( 'comments_link_url' );
if ( $comments_link_url ) : ?>
	<?php $comments_link_text = $this->get( 'comments_link_text' ); ?>
    <a class="button-block dima-button fill float-center" href="<?php echo esc_url( $comments_link_url ); ?>">
		<?php echo esc_html( dima_helper::dima_get_option( 'dima_amp_leave_a_comment' ) ); ?>
    </a>
<?php endif;
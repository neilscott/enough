<div class="post-footer">
	<?php
	$tags = get_the_tag_list(
		'',
		_x( ' ', 'Used between list items, there is a space after the comma.', 'noor' ),
		'',
		$this->ID
	); ?>
	<?php if ( $tags && ! is_wp_error( $tags ) ) : ?>
        <span class="amp-dima-meta amp-dima-tax-tag tags">
            <?php echo dima_get_svg_icon( "ic_label" ) ?>
            <span class="tags-title">
				<?php esc_html_e( 'Tags:', 'noor' ) ?>
			</span>
			<?php printf( '%s', $tags ); ?>
        </span>
	<?php endif; ?>
</div>
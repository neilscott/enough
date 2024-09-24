<?php
/**
 * Header bar template part.
 *
 * @package AMP
 */
$has_amp_menu = has_nav_menu( 'dima_amp_menu' );
$class        = '';
if ( $has_amp_menu ) {
	$class = ' amp_page_has_menu';
}
?>
<header id="top" class="amp-dima-header<?php echo esc_attr( $class ) ?>">
    <div class="container">
        <a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>">
			<?php $site_icon_url = $this->get( 'site_icon_url' ); ?>
			<?php if ( $site_icon_url ) : ?>
                <amp-img src="<?php echo esc_url( $site_icon_url ); ?>" width="32" height="32"
                         class="amp-wp-site-icon"></amp-img>
			<?php endif; ?>
            <span class="amp-site-title">
				<?php echo esc_html( wptexturize( $this->get( 'blog_name' ) ) ); ?>
			</span>
        </a>
		<?php if ( $has_amp_menu ) { ?>
            <span role="button" on="tap:sidebar1.toggle" tabindex="0"
                  class="hamburger"><?php echo dima_get_svg_icon( 'ic_menu' ) ?>
        </span>
		<?php } ?>
    </div>
</header>

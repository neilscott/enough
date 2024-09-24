<?php
/**
 * HTML start template part.
 *
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */
?>
	<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); // WPCS: XSS ok. ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
		<?php do_action( 'amp_post_template_head', $this ); ?>
		<style amp-custom>
			<?php $this->load_parts( array( 'style' ) ); ?>
			<?php do_action( 'amp_post_template_css', $this ); ?>
		</style>
	</head>

<body class="<?php echo esc_attr( $this->get( 'body_class' ) ); ?>">
<?php
$has_amp_menu = has_nav_menu( 'dima_amp_menu' );
$class        = '';
if ( $has_amp_menu ) {
	$class = ' amp_page_has_menu';
}
if ( $has_amp_menu ) {
	?>
	<amp-sidebar class="amp-burger-menu-side" id="sidebar1" layout="nodisplay" side="right">
		<?php dima_output_amp_navigation(); ?>
	</amp-sidebar>
<?php } ?>

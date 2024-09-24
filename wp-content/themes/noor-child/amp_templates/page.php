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
			<?php
            dima_amp_template_part( 'views/page-title' );
			?>
			<?php echo $this->get( 'post_amp_content' ); // WPCS: XSS ok. Handled in AMP_Content::transform(). ?>
        </div>

		<?php $this->load_parts( array( 'footer' ) ); ?>
    </div>
<?php
$this->load_parts( array( 'html-end' ) );

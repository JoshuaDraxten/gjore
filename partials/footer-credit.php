<?php
/**
 * @package Make
 */

/**
 * Allow toggling of the footer credit.
 *
 * @since 1.2.3.
 *
 * @param bool    $show    Whether or not to show the footer credit.
 */
?>

<div class="site-info">
	<?php if ( make_get_thememod_value( 'footer-text' ) || is_customize_preview() ) : ?>
	<div class="footer-text">
		<?php echo make_get_thememod_value( 'footer-text' ); ?>
	</div>
	<?php endif; ?>
</div>

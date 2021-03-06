<?php
/**
 * The Start widget areas.
 *
 * @package required+ Foundation
 * @since required+ Foundation 0.1.0
 */
?>

<?php
	/* The start widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'sidebar-start-1' )
		&& ! is_active_sidebar( 'sidebar-start-2' )
		&& ! is_active_sidebar( 'sidebar-start-3' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<!-- START: sidebar-start.php -->
<div id="startwidgets" class="row">
	<?php if ( is_active_sidebar( 'sidebar-start-1' ) ) : ?>
	<div id="start-first" class="widget-area <?php echo required_footer_sidebar_columns(); ?>">
		<?php dynamic_sidebar( 'sidebar-start-1' ); ?>
	</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-start-2' ) ) : ?>
	<div id="start-second" class="widget-area <?php echo $required_c = (required_footer_sidebar_columns() == 'eight columns' ? 'four columns' : required_footer_sidebar_columns()); ?>">
		<?php dynamic_sidebar( 'sidebar-start-2' ); ?>
	</div><!-- #second .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-start-3' ) ) : ?>
	<div id="start-third" class="widget-area <?php echo $required_c = (required_footer_sidebar_columns() == 'four columns reverse' ? 'eight columns' : required_footer_sidebar_columns()); ?>">
		<?php dynamic_sidebar( 'sidebar-start-3' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>
</div><!-- #supplementary -->
<!-- END: sidebar-start.php -->
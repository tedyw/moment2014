<?php
/**
 *
 * @package required+ Foundation
 * @since required+ Foundation 0.3.0
 *
 * Template Name: Scroller
 *
 */

get_header(); ?>

<?php if(is_front_page()): ?>
	<?php get_template_part("timer"); ?>
<?php endif; ?>
<?php get_template_part("content", "scroller"); ?>
<?php get_footer(); ?>
	
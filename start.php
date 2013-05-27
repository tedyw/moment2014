<?php
/**
 *
 * @package required+ Foundation
 * @since required+ Foundation 0.3.0
 *
 * Template Name: Start
 *
 */

function getpostid($t){

	$page = get_page_by_title( $t );
	$page_id = $page->ID;

	return $page_id;

}

get_header(); ?>

<?php get_template_part( 'content', 'start' ); ?>
<?php get_template_part( 'content', 'about' ); ?>
<?php get_template_part( 'content', 'price' ); ?>
<?php get_template_part( 'content', 'find' ); ?>

<?php get_footer(); ?>
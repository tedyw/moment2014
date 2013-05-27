<?php while ( have_posts() ) : the_post(); ?>			
<?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'background' );
	$url = $thumb['0'];
?>
<div id="<?php echo $post->post_name; ?>" data-magellan-destination="<?php echo $post->post_name; ?>" class="post-box autocolor intro t" style="background-image:url(<?php echo $url?>)">
	<div class="tc vm">
		<div class="row">
		    <article id="post-<?php the_ID(); ?>" <?php post_class("twelve columns"); ?>>
		            <?php the_content(); ?>
		    </article>
		</div>
	</div>
</div>
<?php endwhile; // end of the loop. ?>
<?php while ( have_posts() ) : the_post(); ?>			
<div id="<?php echo $post->post_name; ?>" data-magellan-destination="<?php echo $post->post_name; ?>" class="post-box">
	<div class="tc vm">
		<div class="row">
		    <article id="post-<?php the_ID(); ?>" <?php post_class("twelve columns"); ?>>
		            <?php the_content(); ?>
		    </article>
		</div>
	</div>
</div>
<?php endwhile; // end of the loop. ?>
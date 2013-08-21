<?php while ( have_posts() ) : the_post(); ?>			

<section data-magellan-destination="<?php the_title(); ?>" id="<?php the_title(); ?>" class="screen screen-<?php echo $post->post_name; ?>" data-magellan-destination="<?php echo $post->post_name; ?>">
	<div class="inner">
		<div class="row">
			<div <?php post_class("twelve columns"); ?>>
				<?php if (has_post_thumbnail( $post->ID )) : 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full");
				?>
            	<div class="entry-thumbnail ">
            		<div class="main-image-container">
            			<div class="image" style="background-image:url(<?php echo $image[0];  ?>)" title="<?php the_title(); ?>">
            				<div class="frame">
            					<span><h1><?php the_title(); ?></h1></span>
            				</div>
            			</div>
            		</div>
            	</div>
		        <?php endif; ?>
				<article id="post-<?php the_ID(); ?>">
			            <?php the_content(); ?>
			    </article>
			</div>
		</div>
	</div>
</section>

<?php endwhile; // end of the loop. ?>
<?php if(is_front_page()): ?>
	<? // php get_template_part("shuttle"); ?>
<?php endif; ?>

<?php $parent = $post->ID; ?>
<?php $parent_name = $post->post_name; ?>

<?php
query_posts('post_type=page&order=ASC&orderby=menu_order&post_parent='.$parent);
 while (have_posts()) : the_post();
?>

<section data-magellan-destination="<?php echo $post->post_name; ?>" id="<?php echo $post->post_name; ?>" class="screen screen-<?php echo $post->post_name; ?>" data-magellan-destination="<?php echo $post->post_name; ?>">
	<div class="inner">
		<div class="row">
			<div <?php post_class("twelve columns"); ?>>
				<article id="post-<?php the_ID(); ?>" >
		            <header class="entry-header">
		            	<?php if (has_post_thumbnail( $post->ID )) : 
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full");
						?>
		            	<div class="entry-thumbnail ">
		            		<div class="main-image-container">
		            			<div class="image" style="background-image:url(<?php echo $image[0];  ?>)" title="<?php the_title(); ?>">
		            				<div class="frame">
		            					<span><h1><?php the_title(); ?></h1></span>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
				        <?php else: ?>
		            	<h1 class="entry-title"><?php the_title(); ?></h1>
		           		<?php endif; ?>
		            </header>
		            <div class="entry-content">
		            	<?php the_content(); ?>
		        	</div>
			    </article>
			</div>
		</div>

		<?php if($post->post_name == "utstallare" || $post->post_name == "sponsorer"): ?>

	 		<?php       $args = array(
                        'post_type' => 'company',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'cat' => $post->post_name,
                        'orderby' => 'menu_order'
                        );     
            ?>
            <?php $superiors = new WP_Query($args);
            if($superiors->have_posts()):?>
            <div class="row">
            	<div class="twelve columns company-container">
					<ul class="block-grid four-up mobile-two-up">
						<?php while ($superiors->have_posts()) : $superiors->the_post(); ?>
						<li class="company">
							<?php if (has_post_thumbnail( $post->ID )) :  
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full");
							?>
			            		<div class="logo-container image-container">
			            			<div class="company-logo" style="background-image:url(<?php echo $image[0];?>)"></div>
			            		</div>
			            	<?php endif; ?>
						</li>
						<?php endwhile; wp_reset_postdata(); // end of the loop. ?> 
					</ul>
				</div>	
			</div>
			<?php endif; ?>
		<?php endif; ?>



		<?php if($post->post_name == "projektgruppen"): ?>

	 		<?php       $args = array(
                        'post_type' => 'superior',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'orderby' => 'menu_order'
                        );     
            ?>
            <?php $superiors = new WP_Query($args);
            if($superiors->have_posts()):?>
            <div class="row">
            	<div class="twelve columns company-container">
					<ul class="block-grid four-up mobile-two-up">
						<?php while ($superiors->have_posts()) : $superiors->the_post(); ?>
						<li class="superior">
							<?php if (has_post_thumbnail( $post->ID )) :  
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full");
							?>
			            		<div class="superior-container image-container">
			            			<div class="superior-image" style="background-image:url(<?php echo $image[0];?>)">
			            				<div class="overlay">
			            					<div class="inner">
				            					<div class="email"><span><?php echo str_replace("@", "(at)", get_field("contact-email")); ?></span></div>
				            					<div class="phone"><span><?php echo get_field("contact-phone"); ?></span></div>
				            					<div class="name"><span><?php the_title() ?></span></div>
				            					<div class="title"><span><?php echo get_field("contact-title"); ?></span></div>
			            					</div>
			            				</div>
			            			</div>
			            		</div>
			            	<?php endif; ?>
						</li>
						<?php endwhile; wp_reset_postdata(); // end of the loop. ?> 
					</ul>
				</div>	
			</div>
			<?php endif; ?>
		<?php endif; ?>		

	</div>
</section>

<?php endwhile; // end of the loop. ?>			
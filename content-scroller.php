<?php

	$adaptive_ID = $post->ID;
	if(is_front_page()){ 
	$sticky = get_option('sticky_posts');
	rsort( $sticky );
	$sticky = array_slice( $sticky, 0, 1);
    	$the_query = new WP_Query( array( 'post__in' => $sticky, 'caller_get_posts' => 1 ) );
    	if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$adaptive_ID = $the_query->post->ID;
			}
		}
	}	
?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php if($post->post_name == "af"): $sclass = "main-sponsor head"; endif; ?>		

<section data-magellan-destination="<?php echo sanitize_title($post->post_name); ?>" id="<?php echo sanitize_title($post->post_name); ?>" class="screen <?php echo $sclass; ?> screen-first screen-<?php echo sanitize_title($post->post_name); ?>">
	<div class="inner">
		<?php 
			if (has_post_thumbnail( $adaptive_ID) || $sclass != "") : 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $adaptive_ID ), "hd-background");
			endif;
		?>
    	<div class="entry-thumbnail ">
    		<div class="main-image-container">
    			<div class="image" <?php if($sclass == ""): ?>style="background-image:url(<?php echo $image[0];  ?>)" <?php endif; ?> title="<?php the_title(); ?>">
    				<?php if(is_front_page()): ?><a href="<?php echo get_permalink($adaptive_ID); ?>" title="<?php echo get_the_title($adaptive_ID); ?>"><?php endif; ?>
    				<div class="frame">
    						<h1><?php echo get_the_title($adaptive_ID); ?></h1>
    				</div>
    				<?php if(is_front_page()): ?></a>
    					<div class="hint scroll-down armed">
    						<div class="inner">▼</div>
    					</div>
    				<?php endif; ?>
    			</div>
    		</div>
    	</div>
		<div class="row">
			<div <?php post_class("twelve columns"); ?>>
				<article id="post-<?php the_ID(); ?>">
			        <?php the_content(); ?>
			    </article>
			</div>
		</div>
	</div>
</section>

<?php endwhile; // end of the loop. ?>
<?php endif; ?>

<?php if(is_front_page()): ?>
    <section class="screen screen-short-news">
    	<div class="short-news">
    		<div class="short-news-title-container"><h2 class="short-news-title">Senaste nytt</h2></div>
    	</div>
		<?php get_sidebar( 'start' ); ?>
	</section>
<?php endif; ?>

<?php $parent = $post->ID; ?>
<?php $parent_name = $post->post_name; ?>

<?php
query_posts('post_type=page&order=ASC&orderby=menu_order&post_parent='.$parent);
 while (have_posts()) : the_post();
?>

<section data-magellan-destination="<?php echo sanitize_title($post->post_name); ?>" id="<?php echo sanitize_title($post->post_name); ?>" class="screen screen-<?php echo sanitize_title($post->post_name); ?>">
	<div class="inner">
		<?php if (has_post_thumbnail( $post->ID )) : 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "hd-background");
		?>
    	<div class="entry-thumbnail ">
    		<div class="main-image-container">
    			<div class="image" style="background-image:url(<?php echo $image[0];  ?>)" title="<?php the_title(); ?>">
    				<div class="frame">
    					<h2><?php the_title(); ?></h2>
    				</div>
    			</div>
    		</div>
    	</div>
    <?php endif; ?>
		<article id="post-<?php the_ID(); ?>" >
			<?php if (!has_post_thumbnail( $post->ID )) : ?>
            <header class="entry-header">
            	<div class="entry-title-container"><h2 class="entry-title"><?php the_title(); ?></h2></div>
            </header>
            <?php endif; ?>
            <div class="row">
				<div <?php post_class("twelve columns"); ?>>
		            <div class="entry-content">
		            	<?php the_content(); ?>
		        	</div>
			    </div>
			</div>
	    </article>

		<?php if($post->post_name == "utstallare" || $post->post_name == "sponsorer"): ?>

	 		<?php       $args = array(
                        'post_type' => 'company',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'cat' => $post->post_name,
                        'orderby' => 'menu_order'
                        );   
            ?>
            <?php 
            	if($post->post_name == "utstallare"):
            		$participation = true;
            	else:
            		$participation = false;
            	endif;	  
            ?>
            <?php $superiors = new WP_Query($args);
            if($superiors->have_posts()):?>
            <?php if($participation == true): ?>
            <div class="row">
            	<div class="twelve columns participation-description">
	            	<ul class="participation-container">
	            		<li class="participation"><span class="dot-description">Delaktighet: </span></li>
	            		<li class="participation event">
	            			<span class="dot"></span>
	            			<span class="dot-description">Event</span>
	            		</li>
	            		<li class="participation monter">
	            			<span class="dot"></span>
	            			<span class="dot-description">Monter</span>
	            		</li>
	            		<li class="participation föreläsning">
	            			<span class="dot"></span>
	            			<span class="dot-description">Föreläsning</span>
	            		</li>
	            	</ul>
            	</div>	
            </div>
        	<?php endif ?>
            <div class="row">
            	<div class="twelve columns company-container">
					<ul class="block-grid four-up mobile-two-up">
						<?php while ($superiors->have_posts()) : $superiors->the_post(); ?>
						<li class="company">
							<?php if (has_post_thumbnail( $post->ID )) :  
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "hd-background");
							?>
			            		<div class="logo-container image-container">
			            			<div class="company-logo">
			            				<?php the_post_thumbnail("square"); ?>
			            			</div>
			            			<?php if(get_field("delaktighet") && $participation == true): ?>
			            			<ul class="participation-container">
			            				<li class="participation"><h2 class="company-title"><?php the_title(); ?></h2></li>
			            				<?php foreach (get_field("delaktighet") as $participation) { ?>
			            					<li class="participation <?php echo $participation; ?>">
			            						<span class="dot"></span>
			            					</li>
			            				<?php } ?>
			            			</ul>	
			            			<?php endif; ?>
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
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "hd-background");
							?>
			            		<div class="superior-container image-container">
			            			<div class="superior-image">
			            				<?php the_post_thumbnail("potrait"); ?>
			            				<ul class="contact-info">
			            					<li class="email"><span><?php echo str_replace("@", "(at)", get_field("contact-email")); ?></span></li>
			            					<li class="phone"><span><?php echo get_field("contact-phone"); ?></span></li>
			            					<li class="name"><span><?php the_title() ?></span></li>
			            					<li class="title"><span><?php echo get_field("contact-title"); ?></span></li>
			            				</ul>	
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
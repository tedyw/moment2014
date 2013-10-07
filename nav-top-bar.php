<?php
/**
 * Template part for a top bar navigation
 *
 * Used to display the main navigation with
 * our custom Walker Class to make sure the
 * navigation is rendered the way Foundation
 * does.
 *
 * @since  required+ Foundation 0.5.0
 */
?>
            <!-- START: nav-top-bar.php -->
            <!-- <div class="contain-to-grid"> // enable to contain to grid -->
            <header id="primary-nav" class="primary-nav">
                <hgroup class="row">
                    <div class="twelve columns">
                        <nav id="top-bar" class="top-bar">
                            <ul class="iconmenu">
                                <li><div aria-hidden="true" class="menu-logo"></div></li>
                                <li class="site-title"><a href="<?php echo bloginfo("url"); ?>"><?php echo bloginfo("name"); ?><span class="site-description"> - <?php echo bloginfo("description"); ?></span></a></li>                                
                                <li class="toggle-topbar"><a href="#"></a></li>
                            </ul>
                            <section>
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'depth' => 0,
                                    'items_wrap' => '<ul class="right">%3$s</ul>',
                                    'fallback_cb' => 'required_menu_fallback', // workaround to show a message to set up a menu
                                    'walker' => new REQ_Moment_Walker( array(
                                        'in_top_bar' => true,
                                        'item_type' => 'li'
                                    ) ),
                                ) );
                            ?>
                            </section>
                        </nav>
                    </div>
                </hgroup>
                <?php if(!is_search() && !is_404()): ?>
                    <?php $parent = $post->ID; ?>
                    <?php $parent_name = $post->post_name; ?>
                    <?php $parent_title = the_title("","",false); ?>

                    <?php
                    $secondary = new WP_Query('post_type=page&order=ASC&orderby=menu_order&post_parent='.$parent);
                        if($secondary->have_posts()) :
                    ?>
                    <hgroup class="magellan-container">
                        <nav class="magellan-bar">
                            <ul data-magellan-expedition>
                                <li data-magellan-arrival="<?php echo $parent_title ?>"><a href="#<?php echo $parent_title ?>"><?php echo $parent_title ?></a></li>
                                <?php while($secondary->have_posts()) : $secondary->the_post(); ?>
                                <li data-magellan-arrival="<?php echo $post->post_name; ?>">
                                    <a href="#<?php echo $post->post_name; ?>"><?php the_title() ?></a>
                                </li>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </ul>    
                        </nav>    
                    </hgroup>  
                    <?php
                        endif;
                    ?> 
                <?php endif; ?> 
            </header>    
            <!-- </div> -->
            <!-- END: nav-top-bar.php -->
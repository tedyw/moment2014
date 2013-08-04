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
            <header class="primary-nav">
                <div class="row">
                    <hgroup class="twelve columns">
                    <nav class="top-bar">
                        <ul class="iconmenu">
                            <li class="site-title">Moment</li>
                            <li><div aria-hidden="true" class="menu-logo"></div></li>
                            <li class="toggle-topbar"><a href="#"></a></li>
                        </ul>
                        <section>    
                        <ul class="iconmenu socialicons">
                            <li><div aria-hidden="true" class="icon-facebook"></div></li>
                            <li><div aria-hidden="true" class="icon-vimeo"></div></li>
                            <li><div aria-hidden="true" class="icon-instagram"></div></li>
                            <li><div aria-hidden="true" class="icon-twitter"></div></li>
                            <li><div aria-hidden="true" class="icon-mail"></div></li>
                        </ul>  
                        </section>
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
                    </hgroup>
                </div>
            </header>    
            <!-- </div> -->
            <!-- END: nav-top-bar.php -->
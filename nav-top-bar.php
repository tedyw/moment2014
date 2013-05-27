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
                    <nav class="top-bar ">
                        <ul>
                            <li class="name"><h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1></li>
                            <li class="toggle-topbar"><a href="#"></a></li>
                        </ul>
                        <section>
                            <ul id="menu" class="left" data-magellan-expedition>
                                <li data-magellan-arrival="start"><a href="#start">Start</a></li>
                                <li data-magellan-arrival="om-oss"><a href="#om-oss">Om oss</a></li>
                                <li data-magellan-arrival="priser-och-oppettider"><a href="#priser-och-oppettider">Priser och öppettider</a></li>
                                <li data-magellan-arrival="hitta-hit"><a href="#hitta-hit">Hitta hit</a></li>
                            </ul>
                        </section>
                    </nav>
                    </hgroup>
                </div>
            </header>    
            <!-- </div> -->
            <!-- END: nav-top-bar.php -->
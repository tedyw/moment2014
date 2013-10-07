<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the class=container div and all content after
 *
 * @package required+ Foundation
 * @since required+ Foundation 0.1.0
 */
?>
	<!-- <div class="screen main-sponsor">
		<div class="inner">
			<div class="main-sponsor-logo">
			</div>
			<div class="main-image-container">
    			<div class="image">
    				<div class="frame">
    					<span><h1>Huvudsamarbetspartner</h1></span>
    				</div>
    			</div>
    		</div>
		</div>
	</div> -->
	<div class="screen screen-footer">
		<div class="inner">

				<?php
					/*
						A sidebar in the footer? Yep. You can can customize
						your footer with three columns of widgets.
					*/
						get_sidebar( 'footer' );
					?>
				<div class="footer-container">
					<div id="footer" class="row" role="contentinfo">
						<div class="eight columns push-four">
							<?php wp_nav_menu( array(
								'theme_location' => 'secondary',
								'container' => false,
								'menu_class' => 'inline-list right',
								'fallback_cb' => false
							) ); ?>
						</div>
						<div class="four columns pull-eight">	
							<p><?php echo date("Y"); ?> &copy Moment. Maskinsektionens Arbetsmarknadsmässa</p>
							<a href="http://codeorig.in/" target="_blank" title="Tedy Warsitha" class="brand-link">
							<div class="brand">
								<p class="theme">Machinam</p>
								<div class="promotion"></div>
								<p>Designad av Tedy Warsitha.</p>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div><!-- Container End -->

		</div>
	</div>
	<ul id="socialicons" class="iconmenu socialicons hide-for-small">
        <li><a href="https://www.facebook.com/moment.maskinsektionen" target="_blank" title="Facebook"><div aria-hidden="true" class="icon-facebook"></div></a></li>
        <li><a href="http://vimeo.com/moment" target="_blank" title="Vimeo"><div aria-hidden="true" class="icon-vimeo"></div></a></li>
        <li><a href="http://instagr.am/moment2014" target="_blank" title="Instagram"><div aria-hidden="true" class="icon-instagram"></div></a></li>
        <li><a href="https://twitter.com/Moment2014" target="_blank" title="Twitter"><div aria-hidden="true" class="icon-twitter"></div></a></li>
        <li><a href="http://www.linkedin.com/company/moment-2014/" target="_blank" title="Linkedin"><div aria-hidden="true" class="icon-linkedin"></div></a></li>
        <!-- <li><a href="http://www.afconsult.com" target="_blank" title="ÅF"><div aria-hidden="true" class="icon-af"></div></a></li> -->
    </ul> 

	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	     chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7]>
		<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); ?>
</body>
</html>
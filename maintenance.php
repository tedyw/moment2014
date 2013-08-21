<?php
/**
 *
 * @package required+ Foundation
 * @since required+ Foundation 0.3.0
 *
 * Template Name: Maintenance
 *
 */

get_header(); ?>
<div id="frontoverlay" class="frontoverlay">
		<div class="inner">
			<div class="loader">
				<div aria-hidden="true" class="menu-logo loading-logo"></div>
				<div class="gear-container">
					<div class="gear gear-1"></div>
					<div class="gear gear-2"></div>
					<div class="gear gear-3"></div>
				</div>
			</div>
			<span>Laddar innehåll</span>
		</div>	
	</div>

<?php get_template_part("timer"); ?>
<div class="maintenance">
	Vi är snart igång igen!
</div>

<?php get_footer(); ?>
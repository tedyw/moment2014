<?php
/**
 *
 * @package required+ Foundation
 * @since required+ Foundation 0.3.0
 *
 * Template Name: Scroller
 *
 */

get_header(); ?>
<?php if(is_front_page()): ?>
	<div class="screen screen-welcome">
		<div class="inner">
			<div id="biglogo" class="biglogo">
				<div class="logosphere sphere sphere-1">
					<div class="digit digit-58"><div class="inner">T</div></div>
					<div class="digit digit-59"><div class="inner">N</div></div>
					<div class="digit digit-0"><div class="inner">E</div></div>
					<div class="digit digit-1"><div class="inner">M</div></div>
					<div class="digit digit-2"><div class="inner">O</div></div>
					<div class="digit digit-3"><div class="inner">M</div></div>
				</div>
				<div class="logosphere sphere sphere-2">
					<div class="digit digit-52"><div class="inner">S</div></div>
					<div class="digit digit-53"><div class="inner">N</div></div>
					<div class="digit digit-54"><div class="inner">E</div></div>
					<div class="digit digit-55"><div class="inner">N</div></div>
					<div class="digit digit-56"><div class="inner">O</div></div>
					<div class="digit digit-57"><div class="inner">I</div></div>
					<div class="digit digit-58"><div class="inner">T</div></div>
					<div class="digit digit-59"><div class="inner">K</div></div>
					<div class="digit digit-0"><div class="inner">E</div></div>
					<div class="digit digit-1"><div class="inner">S</div></div>
					<div class="digit digit-2"><div class="inner">N</div></div>
					<div class="digit digit-3"><div class="inner">I</div></div>
					<div class="digit digit-4"><div class="inner">K</div></div>
					<div class="digit digit-5"><div class="inner">S</div></div>
					<div class="digit digit-6"><div class="inner">A</div></div>
					<div class="digit digit-7"><div class="inner">M</div></div>
				</div>
				<div class="logosphere sphere sphere-3">
					<div class="digit digit-52"><div class="inner">G</div></div>
					<div class="digit digit-53"><div class="inner">A</div></div>
					<div class="digit digit-54"><div class="inner">D</div></div>
					<div class="digit digit-55"><div class="inner">S</div></div>
					<div class="digit digit-56"><div class="inner">D</div></div>
					<div class="digit digit-57"><div class="inner">A</div></div>
					<div class="digit digit-58"><div class="inner">N</div></div>
					<div class="digit digit-59"><div class="inner">K</div></div>
					<div class="digit digit-0"><div class="inner">R</div></div>
					<div class="digit digit-1"><div class="inner">A</div></div>
					<div class="digit digit-2"><div class="inner">M</div></div>
					<div class="digit digit-3"><div class="inner">S</div></div>
					<div class="digit digit-4"><div class="inner">T</div></div>
					<div class="digit digit-5"><div class="inner">E</div></div>
					<div class="digit digit-6"><div class="inner">B</div></div>
					<div class="digit digit-7"><div class="inner">R</div></div>
					<div class="digit digit-8"><div class="inner">A</div></div>
				</div>
				<div class="logosphere sphere sphere-4">
				</div>
				<div id="hollowlogo" class="hollow"></div>
				<div id="filledlogo" class="filled"></div>
			</div>	
		</div>
	</div>
	<div id="hint-student" class="hint hint-student">
		<div class="inner">
			⇣ Ner ⇣
		</div>
	</div>
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
<?php endif; ?>	

<?php get_template_part("content", "scroller"); ?>



<?php get_footer(); ?>
	
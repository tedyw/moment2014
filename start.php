<?php
/**
 *
 * @package required+ Foundation
 * @since required+ Foundation 0.3.0
 *
 * Template Name: Start
 *
 */

function getpostid($t){

	$page = get_page_by_title( $t );
	$page_id = $page->ID;

	return $page_id;

}

get_header(); ?>

<div class="background"></div>
<div class="background overlay"></div>

<div class="screen dates">
	<div class="inner">
		<div class="row">
			<div class="four columns"><div class="circle invert transparent-85 start"><div class="inner hero"><span>2014</span></div></div></div>
			<div class="four columns"><div class="circle invert transparent-85 start"><div class="inner hero">
				<span>01</span>
				<div id="countdown" class="countdownHolder hide-for-small">
				</div>
			</div></div></div>
			<div class="four columns"><div class="circle invert transparent-85 start"><div class="inner hero"><span>30</span></div></div></div>
		</div>
	</div>
</div>
<div class="screen second">
	<div class="inner">
		<div class="row">
			<div class="eight columns offset-by-four">
				<p>
					Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora.
				</p>
			</div>
		</div>
	</div>
</div>


<?php get_template_part( 'content', 'start' ); ?>

<?php get_footer(); ?>
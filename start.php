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

<div class="background overlay"></div>

<div class="screen dates circles armed">
	<div class="inner" >
		<div class="row">
			<div class="columns twelve">
				<div class="time-container">
					<div class="time ring ring-1 seconds">
						<div class="inner">
							<span class="digit-1">01</span>
							<span class="digit-2">02</span>
							<span class="digit-3">03</span>
							<span class="digit-4">04</span>
							<span class="digit-5">05</span>
							<span class="digit-6">06</span>
							<span class="digit-7">07</span>
							<span class="digit-8">08</span>
							<span class="digit-9">09</span>
							<span class="digit-10">10</span>
							<span class="digit-11">11</span>
							<span class="digit-12">12</span>
							<span class="digit-13">13</span>
							<span class="digit-14">14</span>
							<span class="digit-15">15</span>
							<span class="digit-16">16</span>
							<span class="digit-17">17</span>
							<span class="digit-18">18</span>
							<span class="digit-19">19</span>
							<span class="digit-20">20</span>
							<span class="digit-21">21</span>
							<span class="digit-22">22</span>
							<span class="digit-23">23</span>
							<span class="digit-24">24</span>
							<span class="digit-25">25</span>
							<span class="digit-26">26</span>
							<span class="digit-27">27</span>
							<span class="digit-28">28</span>
							<span class="digit-29">29</span>
							<span class="digit-30">30</span>
							<span class="digit-31">31</span>
							<span class="digit-32">32</span>
							<span class="digit-33">33</span>
							<span class="digit-34">34</span>
							<span class="digit-35">35</span>
							<span class="digit-36">36</span>
							<span class="digit-37">37</span>
							<span class="digit-38">38</span>
							<span class="digit-39">39</span>
							<span class="digit-40">40</span>
							<span class="digit-41">41</span>
							<span class="digit-42">42</span>
							<span class="digit-43">43</span>
							<span class="digit-44">44</span>
							<span class="digit-45">45</span>
							<span class="digit-46">46</span>
							<span class="digit-47">47</span>
							<span class="digit-48">48</span>
							<span class="digit-49">49</span>
							<span class="digit-50">50</span>
							<span class="digit-51">51</span>
							<span class="digit-52">52</span>
							<span class="digit-53">53</span>
							<span class="digit-54">54</span>
							<span class="digit-55">55</span>
							<span class="digit-56">56</span>
							<span class="digit-57">57</span>
							<span class="digit-58">58</span>
							<span class="digit-59">59</span>
							<span class="digit-60 active">60</span>
						</div>
					</div>
					<div class="time ring ring-2 minutes">
						<div class="inner">
							<span class="digit-1">01</span>
							<span class="digit-2">02</span>
							<span class="digit-3">03</span>
							<span class="digit-4">04</span>
							<span class="digit-5">05</span>
							<span class="digit-6">06</span>
							<span class="digit-7">07</span>
							<span class="digit-8">08</span>
							<span class="digit-9">09</span>
							<span class="digit-10">10</span>
							<span class="digit-11">11</span>
							<span class="digit-12">12</span>
							<span class="digit-13">13</span>
							<span class="digit-14">14</span>
							<span class="digit-15">15</span>
							<span class="digit-16">16</span>
							<span class="digit-17">17</span>
							<span class="digit-18">18</span>
							<span class="digit-19">19</span>
							<span class="digit-20">20</span>
							<span class="digit-21">21</span>
							<span class="digit-22">22</span>
							<span class="digit-23">23</span>
							<span class="digit-24">24</span>
							<span class="digit-25">25</span>
							<span class="digit-26">26</span>
							<span class="digit-27">27</span>
							<span class="digit-28">28</span>
							<span class="digit-29">29</span>
							<span class="digit-30">30</span>
							<span class="digit-31">31</span>
							<span class="digit-32">32</span>
							<span class="digit-33">33</span>
							<span class="digit-34">34</span>
							<span class="digit-35">35</span>
							<span class="digit-36">36</span>
							<span class="digit-37">37</span>
							<span class="digit-38">38</span>
							<span class="digit-39">39</span>
							<span class="digit-40">40</span>
							<span class="digit-41">41</span>
							<span class="digit-42">42</span>
							<span class="digit-43">43</span>
							<span class="digit-44">44</span>
							<span class="digit-45">45</span>
							<span class="digit-46">46</span>
							<span class="digit-47">47</span>
							<span class="digit-48">48</span>
							<span class="digit-49">49</span>
							<span class="digit-50">50</span>
							<span class="digit-51">51</span>
							<span class="digit-52">52</span>
							<span class="digit-53">53</span>
							<span class="digit-54">54</span>
							<span class="digit-55">55</span>
							<span class="digit-56">56</span>
							<span class="digit-57">57</span>
							<span class="digit-58">58</span>
							<span class="digit-59">59</span>
							<span class="digit-60 active">60</span>
						</div>
					</div>
					<div class="time ring ring-3 hours">
						<div class="inner">
							<span class="digit-1">01</span>
							<span class="digit-2">02</span>
							<span class="digit-3">03</span>
							<span class="digit-4">04</span>
							<span class="digit-5">05</span>
							<span class="digit-6">06</span>
							<span class="digit-7">07</span>
							<span class="digit-8">08</span>
							<span class="digit-9">09</span>
							<span class="digit-10">10</span>
							<span class="digit-11">11</span>
							<span class="digit-12">12</span>
							<span class="digit-13">13</span>
							<span class="digit-14">14</span>
							<span class="digit-15">15</span>
							<span class="digit-16">16</span>
							<span class="digit-17">17</span>
							<span class="digit-18">18</span>
							<span class="digit-19">19</span>
							<span class="digit-20">20</span>
							<span class="digit-21">21</span>
							<span class="digit-22">22</span>
							<span class="digit-23">23</span>
							<span class="digit-24 active">24</span>
						</div>
					</div>
					<div class="time ring ring-4 days">
						<div class="inner">
							<span class="digit-1">01</span>
							<span class="digit-2">02</span>
							<span class="digit-3">03</span>
							<span class="digit-4">04</span>
							<span class="digit-5">05</span>
							<span class="digit-6">06</span>
							<span class="digit-7">07</span>
							<span class="digit-8">08</span>
							<span class="digit-9">09</span>
							<span class="digit-10">10</span>
							<span class="digit-11">11</span>
							<span class="digit-12">12</span>
							<span class="digit-13">13</span>
							<span class="digit-14">14</span>
							<span class="digit-15">15</span>
							<span class="digit-16">16</span>
							<span class="digit-17">17</span>
							<span class="digit-18">18</span>
							<span class="digit-19">19</span>
							<span class="digit-20">20</span>
							<span class="digit-21">21</span>
							<span class="digit-22">22</span>
							<span class="digit-23">23</span>
							<span class="digit-24">24</span>
							<span class="digit-25">25</span>
							<span class="digit-26">26</span>
							<span class="digit-27">27</span>
							<span class="digit-28">28</span>
							<span class="digit-29">29</span>
							<span class="digit-30">30</span>
							<span class="digit-31 active">31</span>
						</div>
					</div>
					<div class="time ring ring-5 months">
						<div class="inner">
							<span class="digit-1">01</span>
							<span class="digit-2">02</span>
							<span class="digit-3">03</span>
							<span class="digit-4">04</span>
							<span class="digit-5">05</span>
							<span class="digit-6">06</span>
							<span class="digit-7">07</span>
							<span class="digit-8">08</span>
							<span class="digit-9">09</span>
							<span class="digit-10">10</span>
							<span class="digit-11">11</span>
							<span class="digit-12 active">12</span>
						</div>
					</div>
					<!-- <div class="years"></div> -->
				</div>
			</div>	
		</div>	

		<!--
		<div class="row">
			<div class="circle-container columns twelve">
				<div class="circle-holder"><div class="circle invert start counter"><div class="inner hero"><span>2014</span></div></div></div>
				<div class="circle-holder"><div class="circle invert start counter"><div class="inner hero">
					<span>01</span>
					<div id="countdown" class="countdownHolder hide-for-small">
					</div>
				</div></div></div>
				<div class="circle-holder"><div class="circle invert transparent-85 start counter"><div class="inner hero"><span>30</span></div></div></div>
			</div>
		</div>

		<div data-magellan-expedition class="circle-navigation" id="circle-navigation">
				<div class="row"><div class="four columns item first hidden" data-magellan-arrival='first'><div class="circle invert transparent-85 start"><div class="inner hero">
					<span>2014</span>
				</div></div></div></div>
				<div class="row"><div class="four columns item" data-magellan-arrival='about'><div class="circle invert transparent-85 start"><div class="inner hero">
					<span>Om Oss</span>
				</div></div></div></div>
				<div class="row"><div class="four columns item" data-magellan-arrival='third'><div class="circle invert transparent-85 start"><div class="inner hero">
					<span>Third</span>
				</div></div></div></div>
		</div> -->

	</div>
</div>

<div class="screen first" data-magellan-destination="first">
</div>

<div class="screen second" >
	<div class="inner" data-magellan-destination="about">
		<div class="row">
			<div class="eight columns offset-by-four">
				<p>
					Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora.
				</p>
			</div>
		</div>
	</div>
</div>
<div class="screen third" >
	<div class="inner" data-magellan-destination="third">
		<div class="row">
			<div class="eight columns offset-by-four">
				<p>
					Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora.
				</p>
			</div>
		</div>
	</div>
</div>

<div class="screen start-footer">
	<div class="inner">
		<?php get_footer(); ?>
	</div>
</div>
/**
 * Machine-JS Created by Tedy Warsitha, http://codeorig.in/
 */
(function($) {

	// requestAnimationFrame() shim by Paul Irish
	// http://paulirish.com/2011/requestanimationframe-for-smart-animating/
	window.requestAnimFrame = (function() {
		return window.requestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		window.oRequestAnimationFrame ||
		window.msRequestAnimationFrame ||
		function(/* function */ callback, /* DOMElement */ element){
		window.setTimeout(callback, 1000 / 60);
		};
	})();

	/**
	 * Behaves the same as setInterval except uses requestAnimationFrame() where possible for better performance
	 * @param {function} fn The callback function
	 * @param {int} delay The delay in milliseconds
	 */
		window.requestInterval = function(fn, delay) {
			if( !window.requestAnimationFrame       && 
				!window.webkitRequestAnimationFrame && 
				!(window.mozRequestAnimationFrame && window.mozCancelRequestAnimationFrame) && // Firefox 5 ships without cancel support
				!window.oRequestAnimationFrame      && 
				!window.msRequestAnimationFrame)
					return window.setInterval(fn, delay);
					
			var start = new Date().getTime(),
				handle = new Object();
				
			function loop() {
				var current = new Date().getTime(),
					delta = current - start;
					
				if(delta >= delay) {
					fn.call();
					start = new Date().getTime();
				}
		 
				handle.value = requestAnimFrame(loop);
			};
			
			handle.value = requestAnimFrame(loop);
			return handle;
		}
	 
	/**
	 * Behaves the same as clearInterval except uses cancelRequestAnimationFrame() where possible for better performance
	 * @param {int|object} fn The callback function
	 */
	    window.clearRequestInterval = function(handle) {
	    window.cancelAnimationFrame ? window.cancelAnimationFrame(handle.value) :
	    window.webkitCancelAnimationFrame ? window.webkitCancelAnimationFrame(handle.value) :
	    window.webkitCancelRequestAnimationFrame ? window.webkitCancelRequestAnimationFrame(handle.value) : /* Support for legacy API */
	    window.mozCancelRequestAnimationFrame ? window.mozCancelRequestAnimationFrame(handle.value) :
	    window.oCancelRequestAnimationFrame	? window.oCancelRequestAnimationFrame(handle.value) :
	    window.msCancelRequestAnimationFrame ? window.msCancelRequestAnimationFrame(handle.value) :
	    clearInterval(handle);
	};

	/**
	* Behaves the same as setTimeout except uses requestAnimationFrame() where possible for better performance
	* @param {function} fn The callback function
	* @param {int} delay The delay in milliseconds
	*/
	 
		window.requestTimeout = function(fn, delay) {
		if( !window.requestAnimationFrame &&
		!window.webkitRequestAnimationFrame &&
		!(window.mozRequestAnimationFrame && window.mozCancelRequestAnimationFrame) && // Firefox 5 ships without cancel support
		!window.oRequestAnimationFrame &&
		!window.msRequestAnimationFrame)
		return window.setTimeout(fn, delay);
		var start = new Date().getTime(),
		handle = new Object();
		function loop(){
		var current = new Date().getTime(),
		delta = current - start;
		delta >= delay ? fn.call() : handle.value = requestAnimFrame(loop);
		};
		handle.value = requestAnimFrame(loop);
		return handle;
		};
		 
		/**
		* Behaves the same as clearTimeout except uses cancelRequestAnimationFrame() where possible for better performance
		* @param {int|object} fn The callback function
		*/
		window.clearRequestTimeout = function(handle) {
		window.cancelAnimationFrame ? window.cancelAnimationFrame(handle.value) :
		window.webkitCancelAnimationFrame ? window.webkitCancelAnimationFrame(handle.value) :
		window.webkitCancelRequestAnimationFrame ? window.webkitCancelRequestAnimationFrame(handle.value) : /* Support for legacy API */
		window.mozCancelRequestAnimationFrame ? window.mozCancelRequestAnimationFrame(handle.value) :
		window.oCancelRequestAnimationFrame	? window.oCancelRequestAnimationFrame(handle.value) :
		window.msCancelRequestAnimationFrame ? window.msCancelRequestAnimationFrame(handle.value) :
		clearTimeout(handle);
	};

	Snake.prototype = {
		setCanvas: function(canvas) {
			this.canvas = canvas;
			this.context = canvas.getContext("2d");
			this.$canvas = $(canvas);
			this.canvasWidth = $canvas.width();
			this.canvasHeight = $canvas.height();
		},
		
		next: function() {
			this.draw();
			this.iterate();
			this.randomize();
	// 		this.limitSpeed();
	// 		this.reset(context);
			this.split();
			this.lifespan++;
			this.die();
		},
		
		draw: function() {
			var context = this.context;
			context.save();
			context.fillStyle = this.fillStyle;
			context.beginPath();
			context.moveTo(this.x, this.y);
			context.arc(this.x, this.y, this.radius, 0, 2*Math.PI, true);
			context.closePath();
			context.fill();
			context.restore();
		},
		
		iterate: function() {
			var lastX = this.x;
			var lastY = this.y;
			this.x += this.speed * Math.cos(this.angle);
			this.y += this.speed * -Math.sin(this.angle);
			this.radius *= (0.99 - this.generation/250); // minus 0.004 per generation
			var deltaDistance = Math.sqrt(Math.abs(lastX-this.x) + Math.abs(lastY-this.y));
			this.distance += deltaDistance;
			this.totalDistance += deltaDistance;
			if (this.speed > this.radius*2)
				this.speed = this.radius*2;
		},
		
		randomize: function() {
			this.angle += Math.random()/5 - 1/5/2;
		},
		
		reset: function(context) {
			var $canvas = $(context.canvas);
			var margin = 30+this.radius;
			var width = $canvas.width();
			var height = $canvas.height();
			
			if (this.x < -margin || this.x > width+margin || this.y < -margin || this.y > height+margin) {
	// 			this.x = width/2;
				this.y = height;
				// New color
				var grey = Math.floor(Math.random()*255).toString(16);
				this.fillStyle = "#" + grey + grey + grey;
			}
		},
		
		split: function() {
			// Calculate split chance
			var splitChance = 0;
			// Trunk
			if (this.generation == 0)
				splitChance = (this.distance-this.canvasHeight/5)/100;
			// Branch
			else if (this.generation < 3)
				splitChance = (this.distance-this.canvasHeight/10)/100;
			
			// Split if we are allowed
			if (Math.random() < splitChance) {
				var n = 2+Math.round(Math.random()*2);
				for (var i=0 ; i<n ; i++) {
					var snake = new Snake(this.canvas);
					snake.x = this.x;
					snake.y = this.y;
					snake.angle = this.angle;
					snake.speed = this.speed;
					snake.radius = this.radius * 0.9;
					snake.generation = this.generation + 1;
					snake.fillStyle = this.fillStyle;
					snake.totalDistance = this.totalDistance;
					this.collection.add(snake);
				}
				this.collection.remove(this);
			}
		},
		
		die: function() {
			if (this.radius < 0.2) {
				this.collection.remove(this);
	// 			console.log(this.distance);
			}
		}
	}

	SnakeCollection.prototype = {
		next: function() {
			n = this.snakes.length;
			for (var s in this.snakes) {
				var snake = this.snakes[s];
				if (this.snakes[s])
					this.snakes[s].next();
			}
		},
		
		add: function(snake) {
			this.snakes.push(snake);
			snake.collection = this;
		},
		
		remove: function(snake) {
			for (var s in this.snakes)
				if (this.snakes[s] === snake)
					this.snakes.splice(s, 1);
		}
	}
	
	var // Rotation degrees for each dial (sec,min,hours,days,months).
		$rs = 6,
		$rmin = 6,
		$rh = 15,
		$rd = 11.61290323,
		$rm = 30,
		$i = 0,
		$i2 = 0,
		//voyage = $("#thevoyage"),
		//shuttlefog = $("#shuttle-fog"),
		//shuttle = $("#shuttle"),
		//trajectory = $("#trajectory"),
		//wing = $("#wing-container"),
		hint = $("#hint"),
		biglogo = $("#biglogo"),
		filledlogo = $("#filledlogo"),
		hollowlogo = $("#hollowlogo"),
		logosphere = $(".logosphere");
		//tree = $("#thetree"),
		//binarytree = $("#binarytree"),
		//follow1HTML = $("#follower-1").clone();

	function activateHint(){
		$("#hint").addClass("armed");
	}

	function activateMenu(){
		$("#primary-nav").addClass("armed");
	}

	function activateCover(){
		$("#frontoverlay").addClass("armed");
	}

	function activateCoverContent(){
		$("#frontoverlay").find(".inner").addClass("armed");
	}

	function openLid(){
		$("#eye").addClass("armed");
	}

	function closeLid(){
		$("#eye").removeClass("armed");
		$("#time-container").find(".focus").addClass("armed");
	}

	function removeCover(){
		$("#frontoverlay").remove();
	}

	function deployIcons(){
		var icons = $("#socialicons").find("li").length;
		if ((icons - $i) >= 0){
			$("#socialicons").find("li").eq($i).addClass("armed");
			$i++;
			requestTimeout(deployIcons, 250);
		}
	}

	function deployMenuItems(){
		var items = $("#top-bar").find(".menu-item").length;
		if ((items - $i2) >= 0){
			$("#top-bar").find(".menu-item").eq($i2).addClass("armed");
			$i2++;
			requestTimeout(deployMenuItems, 400);
		}
	}


	function calculateDate(){
		// Set dates
		var currentdate = new Date(),
		futureDate = new Date($datestring);
		numMonths = new Date(currentdate.getFullYear(), currentdate.getMonth() + 1, 0).getDate(); 
	
		// Get the date difference in ticks 
		timeDiff = (futureDate - currentdate)/1000; 
		months = Math.floor(timeDiff / 86400 / numMonths);
		days = Math.floor(timeDiff / 86400) % numMonths; 
		hours = Math.floor(timeDiff / 3600) % 24;
		minutes = Math.floor(timeDiff / 60) % 60; 
		seconds = Math.floor(timeDiff % 60);
	}	

	function rotate(degree, ring, e) {
		
		if (e != 0){
		var r = ring.data('rotation') + degree;
		} else {
		var	r = 0 + degree; 
		}

	    ring.css({
	                '-webkit-transform': 'rotate(' + r + 'deg)',
	                '-moz-transform': 'rotate(' + r + 'deg)',
	                '-ms-transform': 'rotate(' + r + 'deg)',
	                '-o-transform': 'rotate(' + r + 'deg)',
	                'transform': 'rotate(' + r + 'deg)',
	                'zoom': 1
	    }).data('rotation', r);
	}

	function initCountdown() {

		calculateDate();

		rotate(-$rs*seconds,$("#seconds"),0);
		rotate(-$rmin*minutes,$("#minutes"),0);
		rotate(-$rh*hours,$("#hours"),0);
		rotate(-$rd*days,$("#days"),0);
		rotate(-$rm*months,$("#months"),0);

		$("#time").find("span").removeClass("active");
		$("#seconds").find("span").eq(seconds-1).addClass("active"); 
		$("#minutes").find("span").eq(minutes-1).addClass("active"); 
		$("#hours").find("span").eq(hours-1).addClass("active"); 
		$("#days").find("span").eq(days-1).addClass("active"); 
		$("#months").find("span").eq(months-1).addClass("active"); 
	}

	function startFocusCountdown() {

		if (Math.floor(seconds) >= 1){
			seconds--;

			if (seconds < 10){
				var translated = "0" + seconds;
			} else {
				var translated = seconds;
			}

			$("#small-timer").text("00:00:" + translated);
			requestTimeout(startFocusCountdown, 1000);
		} else {
			// Space for event.
		}
	}

	function startCountdown() {

		var currentdate = new Date(),
			futureDate = new Date($datestring),
			difference = (futureDate - currentdate)/1000,
			$months = $("#months"),
			$days = $("#days"),
			$hours = $("#hours"),
			$minutes = $("#minutes"),
			$seconds = $("#seconds");

		if (Math.floor(difference) <= 60){
			closeLid();
			startFocusCountdown();
		} else {	

			seconds--;

			if (seconds <= 0){

				if (minutes <= 0){

					if (hours <= 0){
						
						if(days <= 0){

							days = 31;
							months--;
							rotate($rm,$months);
							$months.find("span").removeClass("active");
							$months.find("span").eq(months-1).addClass("active");
						}

						hours = 24;
						days--;
						rotate($rd,$days);
						$days.find("span").removeClass("active");
						$days.find("span").eq(days-1).addClass("active");
					}

					minutes = 60;
					hours--;				
					rotate($rh,$hours);
					$hours.find("span").removeClass("active");
					$hours.find("span").eq(hours-1).addClass("active");
				}

				seconds = 60;
				minutes--;
				rotate($rmin,$minutes);
				$minutes.find("span").removeClass("active");
				$minutes.find("span").eq(minutes-1).addClass("active");
			}

			rotate($rs,$seconds);
			$seconds.find("span").removeClass("active");
			$seconds.find("span").eq(seconds-1).addClass("active");

			requestTimeout(startCountdown, 1000);
		}
	}

	function Snake(canvas) {
		this.setCanvas(canvas);
		
		this.x = this.canvasWidth/2;
		this.y = this.canvasHeight;
		this.radius = 10;
		this.speed = this.canvasWidth/500;
		this.angle = Math.PI/2;
		this.angleDiversion = 
		this.fillStyle = "#ffffff";
		this.generation = 0;
		this.lifespan = 0;
		this.totalDistance = 0;
		this.distance = 0;
	};	

	function SnakeCollection() {
		this.canvas = canvas;
		
		this.snakes = [];
	}		
	
	function createtree(){
		// Convenience
		$canvas = binarytree;
		canvas = $canvas[0];
		context = canvas.getContext("2d");

		var width = binarytree.width();
		var height = binarytree.height();
		
		// Set actual canvas size to match css
		$canvas.attr("width", width);
		$canvas.attr("height", height);
		
		// Snakes
		var n = 2+Math.random()*3;
		var initialRadius = width/50;
		snakes = new SnakeCollection();
		for (var i=0 ; i<n ; i++) {
			var snake = new Snake(canvas);
			snake.x = width/2 - initialRadius + i*initialRadius*2/n;
			snake.radius = initialRadius;
			snakes.add(snake);
		}
		
		// Frame drawer
		interval = requestInterval(function() {
			snakes.next();
		}, 0);
	}

	function armsequence(){

		if ($(window).scrollTop() >= (biglogo.offset().top) - $(window).height()*0.4){
    			hollowlogo.addClass("armed");
    			filledlogo.addClass("armed");
    	} else {
    		hollowlogo.removeClass("armed");
    		filledlogo.removeClass("armed");
    	}

    	if ($(window).scrollTop() >= (biglogo.offset().top) - $(window).height()*0.2){
    		logosphere.addClass("armed");
    	} else {
    		logosphere.removeClass("armed");
    	}

		/* if ($(window).scrollTop() >= (voyage.offset().top) - $(window).height()){
    			shuttlefog.addClass("armed");
    	} else {
    		shuttlefog.removeClass("armed");
    	}

    	if ($(window).scrollTop() >= (voyage.offset().top) - $(window).height()*0.5){
			shuttle.addClass("armed");
			trajectory.addClass("armed");
			wing.addClass("armed");
    	} else {
    		shuttle.removeClass("armed");
    		wing.removeClass("armed");
    		trajectory.removeClass("armed");
    	}

    	if ($(window).scrollTop() >= $(window).height()*0.5){
    		hint.removeClass("armed");
    	} else {
    		hint.addClass("armed");
    	}

    	if ($(window).scrollTop() < (tree.offset().top - $(window).height()*0.2) 
    		&& $('#follower-1').length < 1){
    		tree.prepend(follow1HTML);
    		$("#follower-1").addClass("armed");
    		follow1 = $("#follower-1");
    		binarytree.removeClass("armed");
    		context.clearRect(0, 0, canvas.width, canvas.height);
    	}

    	if ($(window).scrollTop() >= (tree.offset().top - $(window).height()*0.2)
    		&& $(window).scrollTop() < (tree.offset().top + $(window).height()*1.5)){
    		follow1.addClass("fixed");

    	} else {
    		
    		follow1.removeClass("fixed");
    	}

    	if ($(window).scrollTop() >= (tree.offset().top + $(window).height()*0.8)){
    			follow1.addClass("end");
    	} else {
    		follow1.removeClass("end");
    	}

    	if ($(window).scrollTop() > (tree.offset().top + $(window).height()*1.1)){
    		follow1.remove();
    		if(!binarytree.hasClass("armed")){
	    		binarytree.addClass("armed");
	    		createtree();
	    		clearInterval(interval);
    		}
    	}

    	*/
	}			

	function machineinit(date) {
		$datestring = date; //Destination date.
		requestTimeout(activateCoverContent, 100);
    	requestTimeout(activateCover, 1400);
    	requestTimeout(removeCover, 3000);
    	requestTimeout(openLid, 1500);
    	requestTimeout(initCountdown, 2500);
    	requestTimeout(startCountdown, 2500);
    	requestTimeout(activateMenu, 3500);
    	requestTimeout(deployIcons, 4700);
    	requestTimeout(deployMenuItems, 6200);
    	requestTimeout(activateHint, 7200);

    	/* follow1 = $("#follower-1");
    	$("#follower-1").addClass("armed"); */

    	$(window).bind("scroll", function(){  
    		armsequence();
		});
	}	

    $(window).load(function(){
    	machineinit("01/30/2014 10:00:00");
    });

}(jQuery));


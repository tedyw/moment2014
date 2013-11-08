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
	
	var // Rotation degrees for each dial (sec,min,hours,days,months).
		$rs = 6,
		$rmin = 6,
		$rh = 15,
		$rd = 11.61290323,
		$rm = 30,
		$i = 0,
		$i2 = 0,
		hint = $("#hint-student"),
		biglogo = $("#biglogo"),
		filledlogo = $("#filledlogo"),
		hollowlogo = $("#hollowlogo"),
		logosphere = $(".logosphere");

	function activateHint(){
		$(".hint").addClass("armed");
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
		$("#focus").addClass("armed");
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

	function armsequence(){

		if ($(window).scrollTop() >= (biglogo.offset().top) + $(window).height()*0.1){
    			hollowlogo.addClass("armed");
    			filledlogo.addClass("armed");
    	} else {
    		hollowlogo.removeClass("armed");
    		filledlogo.removeClass("armed");
    	}

    	if ($(window).scrollTop() >= (biglogo.offset().top) + $(window).height()*0.1){
    		logosphere.addClass("armed");
    	} else {
    		logosphere.removeClass("armed");
    	}

    	if ($(window).scrollTop() >= (biglogo.offset().top) + $(window).height()*0.1){
    		hint.addClass("end");
    	} else {
    		hint.removeClass("end");
    	}
	}			

	function machineinit(date) {
		$datestring = date; //Destination date.
		requestTimeout(activateCoverContent, 0);
    	requestTimeout(activateCover, 0);
    	requestTimeout(removeCover, 200);
    	requestTimeout(openLid, 1500);
    	requestTimeout(initCountdown, 2500);
    	requestTimeout(startCountdown, 2500);
    	requestTimeout(activateMenu, 0);
    	//requestTimeout(deployIcons, 4700);
    	//requestTimeout(deployMenuItems, 6200);
    	requestTimeout(activateHint, 0);

    	$(window).bind("scroll", function(){  
    		armsequence();
		});
	}	

    $(window).load(function(){
    	machineinit("01/30/2014 10:00:00");
    });

}(jQuery));


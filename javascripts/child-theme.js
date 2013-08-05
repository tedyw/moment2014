/**
 * Here goes all the JS Code you need in your child theme buddy!
 */
(function($) {

	var // Rotation degrees for each dial (sec,min,hours,days,months).
		$rs = 6,
		$rmin = 6,
		$rh = 15,
		$rd = 11.61290323,
		$rm = 30;
		$i = 0;

	function activateMenu(){
		$(".primary-nav").addClass("armed");
	}

	function activateCover(){
		$(".frontoverlay").addClass("armed");
	}

	function openLid(){
		$(".ring-0.eye").addClass("armed");
	}

	function closeLid(){
		$(".ring-0.eye").removeClass("armed");
	}

	function removeCover(){
		$(".frontoverlay").remove();
	}

	function deployIcons(){
		icons = $(".primary-nav li").length;
		if ((icons - $i) >= 0){
			$(".primary-nav li").eq($i).addClass("armed");
			$i++;
			setTimeout(deployIcons, 200);
		}
	}


	function calculateDate(){
		// Set dates
		var currentdate = new Date(),
		futureDate = new Date("02/03/2014 10:00:00");
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

		rotate(-$rs*seconds,$(".seconds"),0);
		rotate(-$rmin*minutes,$(".minutes"),0);
		rotate(-$rh*hours,$(".hours"),0);
		rotate(-$rd*days,$(".days"),0);
		rotate(-$rm*months,$(".months"),0);

		$(".time span").removeClass("active");
		$(".seconds span").eq(seconds-1).addClass("active"); 
		$(".minutes span").eq(minutes-1).addClass("active"); 
		$(".hours span").eq(hours-1).addClass("active"); 
		$(".days span").eq(days-1).addClass("active"); 
		$(".months span").eq(months-1).addClass("active"); 
	}

	function startCountdown() {

		seconds--;

		if (seconds <= 0){

			if (minutes <= 0){

				if (hours <= 0){
					
					if(days <= 0){

						days = 31;
						months--;
						rotate($rm,$(".months"));
						$(".months span").removeClass("active");
						$(".months span").eq(months-1).addClass("active");
					}

					hours = 24;
					days--;
					rotate($rd,$(".days"));
					$(".days span").removeClass("active");
					$(".days span").eq(days-1).addClass("active");
				}

				minutes = 60;
				hours--;				
				rotate($rh,$(".hours"));
				$(".hours span").removeClass("active");
				$(".hours span").eq(hours-1).addClass("active");
			}

			seconds = 60;
			minutes--;
			rotate($rmin,$(".minutes"));
			$(".minutes span").removeClass("active");
			$(".minutes span").eq(minutes-1).addClass("active");
		}

		rotate($rs,$(".seconds"));
		$(".seconds span").removeClass("active");
		$(".seconds span").eq(seconds-1).addClass("active");

		setTimeout(startCountdown, 1000);
	}

    $(window).load(function(){
    	$(".primary-nav").removeClass("armed");
    	setTimeout(activateCover, 1400);
    	setTimeout(removeCover, 3000);
    	setTimeout(openLid, 1500);
    	setTimeout(closeLid, 5000);
    	setTimeout(initCountdown, 2500);
    	setTimeout(startCountdown, 2500);
    	setTimeout(activateMenu, 3500);
    	setTimeout(deployIcons, 3700);
    });

    $(window).resize(function(){
    });

    $(window).scroll(function(){
    });

}(jQuery));


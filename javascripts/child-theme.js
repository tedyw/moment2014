/**
 * Here goes all the JS Code you need in your child theme buddy!
 */
(function($) {

	var $time = 360,	//this is the count down time in seconds.
		$seconds = $time,
		$sTick = $seconds % 60,  //60
		$mTick = 0, // 60
		$hTick = 0, // 24
		$dTick = 0, // 31
		$year = 2014; //this is the current year.

	function daysInMonth(month, year) {
	    return new Date(year, month, 0).getDate();
	}

	function rotate(degree, ring) {
		
		var r = ring.data('rotation') + degree;

	    ring.css({
	                '-webkit-transform': 'rotate(' + r + 'deg)',
	                '-moz-transform': 'rotate(' + r + 'deg)',
	                '-ms-transform': 'rotate(' + r + 'deg)',
	                '-o-transform': 'rotate(' + r + 'deg)',
	                'transform': 'rotate(' + r + 'deg)',
	                'zoom': 1
	    }).data('rotation', r);
	}

	function startCountdown() {

		if(($seconds - 1) >= 0){

			if($sTick > 0 && $seconds % 60 > 0){
				$sTick--;
			} else {
				$sTick = 60;
			}

			$(".seconds span").removeClass("active");
			$(".seconds span").eq($sTick-2).addClass("active"); 
			$seconds = $seconds - 1;
			rotate(6,$(".seconds"));
			$minutes = Math.ceil($seconds/60);

			if($minutes >= 0 && $sTick == 60){

				if($mTick > 0){
						$mTick--;
					} else {
						$mTick = 60;
				}

				$(".minutes span").removeClass("active");
				$(".minutes span").eq($mTick-2).addClass("active");
				rotate(6,$(".minutes"));
				$hours = Math.ceil($minutes/60);
					
					if($hours >= 0 && $mTick == 60){
						
						if($hTick > 0){
								$hTick--;
							} else {
								$hTick = 24;
						}

						$(".hours span").removeClass("active");
						$(".hours span").eq($hTick-2).addClass("active");
						rotate(15,$(".hours"));
						$days = Math.ceil($hours/24);
					}
			}

			setTimeout(startCountdown, 1000);   
		}
   }

	init = function(){
		startCountdown();
		
	}

    $(window).load(function(){
    	init();
    });

    $(window).resize(function(){
    });

    $(window).scroll(function(){
    });

}(jQuery));


/**
 * Here goes all the JS Code you need in your child theme buddy!
 */
(function($) {

	function startUpdate(){

		if ($(window).scrollTop() <= 0) {
			$(".circle.counter").each(function(){
					$(this).css({
							"margin-left": "",
							"positon": "",
							"width":""
						}),
					$(this).removeClass("rotate");
			}),
			$(".screen.second .inner").css({
				"left": ""
			});
		}

		if ($(window).scrollTop() > 0){
			$(".circle.counter").each(function(i){
				$(this).css({
						"margin-left": -100*i+"%",
						"positon": "fixed",
					}),
				$(this).addClass("rotate");
			}),
			$(".screen.second .inner").css({
				"left": 0
			});
		}

		if ($(window).scrollTop() >= $(window).height()/2){
			$(".circle.counter").each(function(i){
				$(this).css({
					"opacity": 0
				});
			});
		} else {
			$(".circle.counter").each(function(i){
				$(this).css({
					"opacity": 1
				});
			});
		}	
	}

	init = function(){

		$(".circle.start").each(function(i){
			$(this).css({
				"opacity": 1,
				"top": 0
			});
		}),

		$(".screen.second").css({
			"margin-top": $(window).height()
		});

		var ts = new Date(2014, 01, 30),
		newYear = true;
	
		if((new Date()) > ts){
			// The new year is here! Count towards something else.
			// Notice the *1000 at the end - time must be in milliseconds
			ts = (new Date()).getTime();
			newYear = false;
		}
			
		$('#countdown').countdown({
			timestamp	: ts,
			callback	: function(days, hours, minutes, seconds){
				
				var message = "";
				
				message += days + " day" + ( days==1 ? '':'s' ) + ", ";
				message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
				message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
				message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
				
			}
		});
	}

	reset = function(){
		$(".circle.start").each(function(i){ 
			$(this).css({
				"top": 0
			});
		})
	}

    $(window).load(function(){
    	reset();
    	init();

    });

    $(window).resize(function(){
    	reset();
    });

    $(window).scroll(function(){
    	startUpdate();
    });

}(jQuery));


jQuery(function($) {

	//TESTING PLATFORM
	function isMobile() {
		try{ document.createEvent("TouchEvent"); return true; }
		catch(e){ return false; }
	}

	$(".activate a").on("click", function(e) {
		e.preventDefault;

		//	VARIABLES DEFINED
		var grabID = $(this).attr("href");
		var grabIDnew = $(this).attr("href").replace('#', 'active-');
		var div = '.toggle';
		var target = div + grabID;
		console.log(target);

		//	RESET DIVS
		$(div).not(target).addClass('hide');
		$("body").removeClass("active-course-progress-bar");
		$("li.menu-item").removeClass("current-menu-item");

		// 	CHECK ELEMENT
		if($(target).is('.hide')) {
			$(target).toggleClass("hide");
			$(this).parent().addClass("current-menu-item");

			if(grabID == '#course-progress-bar') {
				$("body").toggleClass(grabIDnew);
			} else if(grabID != '#course-progress-bar') {
				$("body").removeClass(grabIDnew);
			}
		}
		else {
			$(target).toggleClass("hide");
			$(this).parent().removeClass("current-menu-item");
			$("body").removeClass("active-course-progress-bar");
		}
	});

	// RENDER TABLE OF CONTENT BASED ON H1 HEADLINES IN ARTICLE
	$(".article-content h1").each(function( ) {
		var _this = $(this);
		var value = $(this).text();
		_this.attr("id", value);

		$(".course-progress-bar ul").append('<li><a href="#'+ value +'">'+value+'</li>');

	});

	// WHEN TABLE OF CONTENT IS OPEN AND YOU CLICK A ELEMENT
	$("ul li a").on("click", function() {
		$("body").removeClass("active-course-progress-bar");
		$(".course-progress-bar").addClass("hide");
		var goTo = $(this).text();
		$(document).scrollTop( $("#"+goTo+"").offset().top );
	});


	//	IN MOBILE VIEW [NAVIGATE WITH SWIPE LEFT & RIGHT]
		if(isMobile()) {
		if($("body").hasClass("single-prakmed_article")) {
			$(function() {
				$(".handbook-article").swipe({
					allowPageScroll: "vertical",
					preventDefaultEvents: false,
					swipe: function(event, direction) {
						if (direction=='left') {

							var nextTrigger = '.pagination a[rel="next"]';
							var nextURL = $(nextTrigger).attr("href");

								if( $(nextTrigger).length ) {
									// $("body").addClass("loading");
									window.location.href = nextURL;
								}
								else {
									window.location.href = '#';
									alert("Der er ikke flere artikler");
								}
			//                alert("swiped left");

						}
						if (direction=='right') {

							var prevTrigger = '.pagination a[rel="prev"]';
							var prevURL = $(prevTrigger).attr("href");

								if( $(prevTrigger).length ) {
								//	$("body").addClass("loading");
									window.location.href = prevURL;
								}
								else {
									window.location.href = '#';
									alert("Der er ikke flere artikler");
								}
			//                alert("swiped left");

						}
					}
			});
			});
		}
	} // isMobile


	//	IN DESKTOP VIEW [NAVIGATE WITH ARROWS]
		if(! isMobile()) {
			$("body").keydown(function(simulate) {

			var nextTrigger = '.pagination a[rel="next"]';
			var nextURL = $(nextTrigger).attr("href");
			var prevTrigger = '.pagination a[rel="prev"]';
			var prevURL = $(prevTrigger).attr("href");

	//	Previous [left trigger]
			  if(simulate.which == 37) { // left

				if( $(prevTrigger).length ) {
					window.location.href = prevURL;
				}
				else {
					window.location.href = '#';
					alert("Der er ikke flere artikler");
				}
			  }
	//	Next [right trigger]
			  else if(simulate.which == 39) { // right

				if( $(nextTrigger).length ) {
					window.location.href = nextURL;
				}
				else {
					window.location.href = '#';
					alert("Der er ikke flere artikler");
				}
			  }
			});
		} // if diffirent from function isMobile (desktop versions)

});
